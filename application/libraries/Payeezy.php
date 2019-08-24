<?php
class Payeezy {


	private $serviceURL = 'https://api-cert.payeezy.com/v1/transactions';
    private $apiKey = "y6pWAJNyJyjGv66IsVuWnklkKUPFbb0a";
	private $apiSecret = "86fbae7030253af3cd15faef2a1f4b67353e41fb6799f576b5093ae52901e6f7";
	private $token = "fdoa-a480ce8951daa73262734cf102641994c1e55e7cdf4c02b6";
	private $nonce ;
	private $timestamp; //time stamp in milli seconds
	private $payload ;

 public function __construct($params)
  {

     $this->nonce  = strval(hexdec(bin2hex(openssl_random_pseudo_bytes(4, $cstrong))));
     $this->timestamp   = strval(time()*1000);
     $this->payload =  $this->getPayload($this->setPrimaryTxPayload($params));
  }

	function processInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return strval($data);
  }

  function setPrimaryTxPayload($params){

        $card_holder_name = $card_number = $card_type = $card_cvv = $card_expiry = $currency_code = $merchant_ref="";

        // $card_holder_name = $this->processInput("John Smith");
        // $card_number = $this->processInput("4788250000028291");
        // $card_type = $this->processInput("visa");
        // $card_cvv = $this->processInput("123");
        // $card_expiry = $this->processInput("1020");
        // $amount = $this->processInput("1200");
        $currency_code = $this->processInput("USD");
        $merchant_ref = $this->processInput("Astonishing-Sale");

        $primaryTxPayload = array(
            "amount"=> $params['amount'],
            "card_number" => $params['card_number'],
            "card_type" => $params['card_type'],
            "card_holder_name" => $params['card_holder_name'],
            "card_cvv" => $params['card_cvv'],
            "card_expiry" => $params['card_expiry'],
            "merchant_ref" => $merchant_ref,
            "currency_code" => $currency_code,
        );

        return $primaryTxPayload;

}




   function getPayload($args = array())
  {
    $args = array_merge(array(
        "amount"=> "",
        "card_number" => "",
        "card_type" => "",
        "card_holder_name" => "",
        "card_cvv" => "",
        "card_expiry" => "",
        "merchant_ref" => "",
        "currency_code" => "",
        "transaction_tag" => "",
        "split_shipment" => "",
        "transaction_id" => "",

    ), $args);

    $data = "";
    
    $data = array(
              'merchant_ref'=> $args['merchant_ref'],
              'transaction_type'=> "authorize",
              'method'=> 'credit_card',
              'amount'=> $args['amount'],
              'currency_code'=> strtoupper($args['currency_code']),
              'credit_card'=> array(
                      'type'=> $args['card_type'],
                      'cardholder_name'=> $args['card_holder_name'],
                      'card_number'=> $args['card_number'],
                      'exp_date'=> $args['card_expiry'],
                      'cvv'=> $args['card_cvv'],
                    )
    );
   
    return json_encode($data, JSON_FORCE_OBJECT);
  }


  function payment()
  {
  	// echo "<br><br> Request JSON Payload :" ;

// echo $this->payload ;

// echo "<br><br> Authorization :" ;

$data = $this->apiKey . $this->nonce . $this->timestamp . $this->token . $this->payload;

$hashAlgorithm = "sha256";

### Make sure the HMAC hash is in hex -->
$hmac = hash_hmac ( $hashAlgorithm , $data , $this->apiSecret, false );

### Authorization : base64 of hmac hash -->
$hmac_enc = base64_encode($hmac);

// echo "<br><br> " ;

// echo $hmac_enc;

// echo "<br><br>" ;

$curl = curl_init('https://api-cert.payeezy.com/v1/transactions');

$headers = array(
      'Content-Type: application/json',
      'apiKey:'.strval($this->apiKey),
      'token:'.strval($this->token),
      'Authorization:'.$hmac_enc,
      'nonce:'.$this->nonce,
      'timestamp:'.$this->timestamp,
    );



curl_setopt($curl, CURLOPT_HEADER, false);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $this->payload);

curl_setopt($curl, CURLOPT_VERBOSE, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$json_response = curl_exec($curl);



$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

$response = json_decode($json_response, true);

curl_close($curl);

if ( $status != 201 ) {

  return $response;
  die("Error: call to URL $this->serviceURL failed with status $this->status, response $json_response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
}
else
{

  return $response;
}



  }

}