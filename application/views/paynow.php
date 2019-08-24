<!DOCTYPE html>
<html>
<head>
    <title>RCMeducator Payment</title>
    <meta name="viewport" content="initial-scale=1">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/card.css')?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script type="text/javascript" src="<?php echo site_url('assets/js/jquery-2.1.4.min.js')?>"></script>
    <script type="text/javascript" src="<?php echo site_url('assets/js/bootstrap.js')?>"></script>
</head>
<body>
    <style>
        .demo-container {

    box-shadow: 0px 0px 1px 1px #1a1a1a24;
    /*padding-top: 8px;*/
    padding-bottom: 10px;

        }
.jp-card-container {
    -webkit-perspective: 1000px;
    -moz-perspective: 1000px;
    perspective: 1000px;
    width: 350px;
    max-width: 100%;
    height: 200px;
    margin: auto;
    z-index: 1;
    position: relative;
    top: 54px;
}
        form {
            margin: 30px;
        }
        input {
            width: 200px;
            margin: 10px auto;
            display: block;
        }
.example6 .navbar-brand{ 
  background: url(<?php echo site_url('assets/images/logo.png')?>) center / contain no-repeat;
  width: 200px;
      display: block;
    height: 60px;
    line-height: 60px;
    padding: 15px 0px;
}
.bccolor
{
    background-color: #071041;
}
.odr-summ{
    text-align: left;
    font-size: 22px;
    line-height: 40px;
}
    </style>
<div class="wrapper">
  <nav class="navbar bccolor navbar-static-top example6">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar6">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand text-hide" href="http://disputebills.com">Brand Text
        </a>
      </div>
      <div id="navbar6" class="navbar-collapse collapse">
        <!--<ul class="nav navbar-nav navbar-right">-->
        <!--  <li class="active"><a href="#">Home</a></li>-->
        <!--  <li><a href="#">About</a></li>-->
        <!--  <li><a href="#">Contact</a></li>-->
        <!--  <li class="dropdown">-->
        <!--    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>-->
        <!--    <ul class="dropdown-menu" role="menu">-->
        <!--      <li><a href="#">Action</a></li>-->
        <!--      <li><a href="#">Another action</a></li>-->
        <!--      <li><a href="#">Something else here</a></li>-->
        <!--      <li class="divider"></li>-->
        <!--      <li class="dropdown-header">Nav header</li>-->
        <!--      <li><a href="#">Separated link</a></li>-->
        <!--      <li><a href="#">One more separated link</a></li>-->
        <!--    </ul>-->
        <!--  </li>-->
        <!--</ul>-->
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.container-fluid -->
  </nav>

    

   <div class="container-fluid" >
         
         <div class="col-md-10 col-md-offset-1" style="
    margin-top: 50px;

">
               <div class="">
                    <div class="">
                        
                             
              <div class="col-sm-8">
                     <div class="demo-container">
                         
                       <div class="col-sm-12" style="
    background: #071041;
    color: #fff;
">
                    <div class="odr-summ"> 
                    
                    Payment Details
                    </div>
                   
                   
               </div>
        <div >
        <div class="card-wrapper"></div>

        <p>&#x00A0;</p>
         <p>&#x00A0;</p>
           <div class="row">
               <div class="col-md-8 col-md-offset-2">
                    <div class="msgshow"></div>
                       <div class="form-container active">
            
            
            <form id="form-data">
            
            <div class="col-md-6">    
            <div class="form-group">
              <input type="hidden" name="amount" id="amount" value="<?php echo $this->session->userdata('total') ?>"/>
              <input class="form-control" placeholder="Card number" type="tel" name="number" id="number">
            </div>
            </div>
            <div class="col-md-6">
            <div class="form-group">
              <input placeholder="Full name" type="text" name="name" id="name" class="form-control">
            </div>
            </div>
            <div class="col-md-12">
            <div class="form-group">
              <input placeholder="Billing Address" type="text" name="billing_address" id="billing_address" required class="form-control">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
              <input placeholder="MM/YY" class="form-control" type="tel" name="expiry" id="expiry">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
              <input placeholder="CVC" class="form-control" maxlength="3" type="number" id="cvc" name="cvc">
            </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
              <select class="form-control" style="margin-top:10px;" name="card_type" id="card_type">
                <option value="visa">visa</option>
                <option value="master">master</option>
              </select>
            </div>
            </div>
            
             <div class="col-md-6">
            <div class="form-group">
              
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
        
    </div>
    </div>
    
                  
              </div>
                  <div class="col-sm-4">
                                  <div class="row">
               <div class="col-sm-12" style="
    background: aliceblue;
">
                    <div class="odr-summ"> 
                    
                    Order Summary
                    </div>
                   
                   
               </div>
          </div>
                    <table class="table table-striped">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Qty</th>
        <th>Type</th>
        <th>Price</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php if($this->session->userdata('product_id') == 1) { echo 'Telemedicine 2019'; } 
        if($this->session->userdata('product_id') == 2) { echo 'E/M 2019'; }
        ?></td>
        <td><?php echo ($this->session->userdata('member')) ? $this->session->userdata('member') : 1; ?></td>
        <td>
            <?php 
            if($this->session->userdata('total') == 1) {
                 echo "Live Webinar";    
            }
            if($this->session->userdata('total') == 2) {
                 echo "Recording";    
            }
            
            if($this->session->userdata('total') == 3) {
                 echo "Live + Recording";    
            }
            
            ?>
        </td>
        <td>$ <?php echo $this->session->userdata('amount')?></td>
      </tr>
    </tbody>
  </table>
     <div class="col-md-12">
                                    <div class="pull-right m-t-30 text-right">
                                        <hr>
                                        <h3>
                                       <div class="form-group row">
    <label for="staticEmail" class="col-sm-6">Total:</label>
    <div class="col-sm-6">
      <input type="text" readonly="readonly" style="margin-top:0px !important;" class="form-control" value="$ <?php echo $this->session->userdata('amount')?>" name="amt" id="amt"/>
    </div>
  </div>
                                        </div></div>
                  
              </div>      
                        
                    </div>
                   
                   
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
