<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta name="viewport" content="initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/card.css')?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

   <script type="text/javascript" src="<?php echo site_url('assets/js/jquery-2.1.4.min.js')?>"></script>
   <script type="text/javascript" src="<?php echo site_url('assets/js/bootstrap.js')?>"></script>
</head>
<body>
    <style>
        .demo-container {
            width: 100%;
            max-width: 350px;
            margin: 50px auto;
        }

        form {
            margin: 30px;
        }
        input {
            width: 200px;
            margin: 10px auto;
            display: block;
        }

    </style>
    <div class="demo-container">
        <div class="container" style="width:400px;">
        <div class="card-wrapper"></div>

        <p>&#x00A0;</p>
        <div class="msgshow"></div>
        <div class="form-container active">
            
            
            <form id="form-data">
            
            <div class="col-md-12">    
            <div class="form-group">
              <input type="hidden" name="amount" id="amount" value="<?php echo $this->session->userdata('total') ?>"/>
              <input class="form-control" placeholder="Card number" type="tel" name="number" id="number">
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
              <input placeholder="Full name" type="text" name="name" id="name" class="form-control">
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
              <input placeholder="MM/YY" class="form-control" type="tel" name="expiry" id="expiry">
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
              <input placeholder="CVC" class="form-control" maxlength="3" minlength="3" type="number" id="cvc" name="cvc">
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
              <select class="form-control" name="card_type" id="card_type">
                <option value="visa">visa</option>
                <option value="master">master</option>
              </select>
            </div>
            </div>
            
             <div class="col-md-6">
            <div class="form-group">
              <input type="text" readonly="readonly" style="margin-top:0px !important;" class="form-control" value="$ <?php echo $this->session->userdata('amount')?>" name="amt" id="amt"/>
            </div>
            </div>

            <div class="form-row text-center">
            <div class="col-md-12">
            <button  type="submit" class="btn btn-success">Submit</button>
            </div>
            </div>
          </form>
        </div>
    </div>
    </div>
    <script type="text/javascript" src="<?php echo site_url('assets/js/card.js')?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.card.js')?>"></script>
    <script>
        new Card({
            form: document.querySelector('form'),
            container: '.card-wrapper'
        });

        jQuery(document).ready(function(){
            jQuery('#form-data').submit(function(event){
                event.preventDefault();
                jQuery.ajax({
                  type: "POST",
                  url: "<?php echo base_url('users/create_payment')?>",
                  data: jQuery("#form-data").serialize(),
                  success:function(data){
                    var vdata = JSON.parse(data);
                    if(vdata.status == false)
                    {
                      var dis = '<div class="alert alert-danger">'+vdata.message_msg+'</div>';
                    }
                    else{
                      var base_url = "<?php echo base_url('users/payment_success') ?>";
                       window.location = base_url;
                      //var dis = '<div class="alert alert-success">'+vdata.message_msg+'</div>'; 
                      
                    }
                    
                    jQuery('.msgshow').html(dis);
                  },
                  error:function(){
                      //console.log(data);
                  }
                });

            });

        });

    </script>
</body>
</html>
