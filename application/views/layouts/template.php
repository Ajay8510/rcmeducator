<!DOCTYPE html>
<html class="no-js">
<head>
<!-- Basic Page Needs -->
    <meta charset="utf-8">
    <title><?php echo $title ?></title>
    <meta name="description" content="RCM Educator, is a revenue cycle management company focused on aiding health care providers with Payments; health solutions and education."/>
    <meta name="author" content="RCM Educator"/>

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo site_url('assets/content/clinic/images/rcmeducatorlogo.png')?>">

    <!-- FONTS -->
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:100,300,400,400italic,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Exo:100,300,400,400italic,500,700'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Patua+One:100,300,400,400italic,700'>

    <!-- CSS -->
    <link rel='stylesheet' href="<?php echo site_url('assets/css/global.css')?>">
    <link rel='stylesheet' href="<?php echo site_url('assets/content/clinic/css/structure.css')?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='stylesheet' href="<?php echo site_url('assets/content/clinic/css/clinic.css')?>">
    <link rel='stylesheet' href="<?php echo site_url('assets/content/clinic/css/custom.css')?>">
     <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/card.css')?>">
   <style>
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  top:70px;
  position: absolute;
  padding-left: 20px;
  padding-top: 10px;
  background-color: #f1f1f1;
  min-width: 120px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

/*.dropdown:hover .dropdown-content {display: block;}*/

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-134689648-1"></script>
<script type="text/javascript" src="<?php echo site_url('assets/js/jquery-2.1.4.min.js')?>"></script>
   <script type="text/javascript" src="<?php echo site_url('assets/js/bootstrap.js')?>"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-134689648-1');
</script>

<script type="text/javascript"> //<![CDATA[ 
/*var tlJsHost = ((window.location.protocol == "index.html") ? "https://secure.trust-provider.com/" : "http://www.trustlogo.com/");
document.write(unescape("%3Cscript src='" + tlJsHost + "trustlogo/javascript/trustlogo.js' type='text/javascript'%3E%3C/script%3E"));*/
//]]>
</script>
</head>

<body class="home page layout-full-width header-classic minimalist-header header-menu-right sticky-header sticky-white hide-title-area subheader-title-left button-stroke no-content-padding">
<!-- Main Theme Wrapper -->
    <div id="Wrapper">
        <!-- Header Wrapper -->
        <div id="Header_wrapper">
        <!-- Header -->
            <?php include_once('header.php') ?>
        </div>
        <!-- Main Content -->
        <div id="Content">
            <div class="content_wrapper clearfix">
                <div class="sections_group">
                    <div class="entry-content">
                        
                    <div id="contents"><?php echo $contents ?></div>

                    </div>
       <!-- Footer-->
         <?php include_once('footer.php'); ?>
    </div>

    <!-- JS -->

   <script type="text/javascript" src="<?php echo site_url('assets/js/mfn.menu.js')?>"></script>
		<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.plugins.js')?>"></script>
		<script type="text/javascript" src="<?php echo site_url('assets/js/jquery.jplayer.min.js')?>"></script>
		<script type="text/javascript" src="<?php echo site_url('assets/js/animations/animations.js')?>"></script>
		<script type="text/javascript" src="<?php echo site_url('assets/js/scripts.js')?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/email.js')?>"></script>
         <script type="text/javascript" src="<?php echo site_url('assets/js/translate3d.js')?>"></script>

    <script>
        jQuery(window).load(function() {
            var retina = window.devicePixelRatio > 1 ? true : false;
            if (retina) {
                var retinaEl = jQuery("#logo img");
                var retinaLogoW = retinaEl.width();
                var retinaLogoH = retinaEl.height();
                retinaEl.attr("src", "assets/images/logo12.png").width(retinaLogoW).height(retinaLogoH)
            }
        });
        
        jQuery(document).ready(function(){
            jQuery('.dropdown').click(function(event){
                event.preventDefault();
                 jQuery(".dropdown-content").toggle();
            });
        });
    </script>
    
    
    
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c27c2a982491369ba9fe458/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>


 
<!--End of Tawk.to Script-->



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