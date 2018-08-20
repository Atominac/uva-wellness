<!DOCTYPE html>
<?php
include_once 'constant.php';
//include_once 'regval.php';
//require_once 'otplogin.php';
session_start();


if(!isset($_SESSION['otp']))
{

?>
<script type="text/javascript">
window.location.href = 'otplogin.php';
</script>
<?php
}
?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="Ansonika">
	<title>FINDOCTOR - Find easily a doctor and book online an appointment</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/tittleicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- BASE CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<link href="css/style.css" rel="stylesheet">
	<link href="css/menu.css" rel="stylesheet">
	<link href="css/vendors.css" rel="stylesheet">
	<link href="css/icon_fonts/css/all_icons_min.css" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="css/custom.css" rel="stylesheet">

</head>

<body>

	<div class="layer"></div>
	<!-- Mobile menu overlay mask -->

	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
    
	 <?php
    include_once 'header.php';
    ?>
	<!-- /header -->
	
	<main>
		<div class="bg_color_2">
			<div class="container margin_60_35">
				<div id="login">
					                            <h1 style=" font-size:26px;">Login using Mobile No. and OTP</h1>
					<div class="box_form">
                        
                        
                        
                     
                            
                     
                   


        
                        
                        
                                      
                            
                             <?php
                        

$otp_catch= $_SESSION["otp"];
                        
//$mobile_n="";
                        //echo $mobile_n;

$otp_err= "";
$otp="";
                        
      //  echo $otp_catch;                
    
                        
                     

                            

    
  //to be run when submit otp button is clicked
       $error="OTP has been sent to your mobile!";
if(isset($_POST['submit_otp_btn'])){ 
    
    
    $count1=1;
 if($count1=1)
    {
    
    if(empty(trim($_POST['otp']))){
        $otp_err = '<p class="alert-danger" style="padding:20px;">
                        <strong>Please enter OTP1</strong>
                        </p>'; 
        $error="";
    } elseif(strlen(trim($_POST['otp'])) < 6){
         $otp_err = '<p class="alert-danger" style="padding:20px;">
                        <strong>Invalid OTP</strong>
                        </p>';
        $error="";
    } else{
        $otp = trim($_POST['otp']); 
        $error=""; $count1++;
    }
    if(empty(trim($_POST['otp']))){
        $otp_err = '<p class="alert-danger" style="padding:20px;">
                        <strong>Please enter OTP2</strong>
                        </p>'; $error="";
    } elseif(strlen(trim($_POST['otp'])) > 6){
 $otp_err = '<p class="alert-danger" style="padding:20px;">
                        <strong>Invalid OTP</strong>
                        </p>';        $error="";
    } else{
        $otp = trim($_POST['otp']);
        $error="";
        $count1++;
       
    }
    }
if($count1 == 3){
if($otp==$otp_catch)
{unset($_SESSION["otp"]);
 $_SESSION['user_details']="";
                            ?>
<script type="text/javascript">
window.location.href = 'index.php';
</script>
<?php


}
else {
     $otp_err = '<p class="alert-danger" style="padding:20px;">
                        <strong>Invalid OTP</strong>
                        </p>';
} 
}
    
       }
     


            
?> 
                
                            
                          
                            
                        <script src="https://code.jquery.com/jquery-1.10.2.js">
                            
                            
$( "#button" ).click(function() {
    $( "div.first" ).replaceWith( $( ".second" ) );
};
                        </script>
                            
                            
                   
                        
                        
                        
                        
                            
                          <form action="" method="post">
                                 <p> <strong>Enter OTP</strong> </p>
                              <p style="color: #23d600"><?php echo $error; ?></p> 
                            
                    <div >               
                <div class="form-group <?php echo (!empty($otp_err)) ? 'has-error' : ''; ?>" id="submitbtn">
                
                <input type="text" name="otp" placeholder="OTP" class="form-control" maxlength="6" value="<?php echo $otp; ?>" required>
                   

                                             

                <span class="help-block" style="color:red;"><?php //echo $otp_err; ?></span>
                   
                        </div>
                         <div class="form-group" id="submitbtn">
                                   <p class="text-center add_top_10">
                <input type="submit" class="btn_1 btn" name="submit_otp_btn" value="Submit">
                                   </p>
                
            </div>
                                   </div>
                               
                            
  
                            </form> 
                      <?php   
        echo $otp_err;
                        ?>
                        
                        
                        
                        
                        
				
					</div>
					
				</div>
				<!-- /login -->
			</div>
		</div>
	</main>
	<!-- /main -->
	
	<footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-3 col-md-12">
					<p>
						<a href="index.php" title="Findoctor">
							<img src="img/logo.png" data-retina="true" alt="" width="163" height="36" class="img-fluid">
						</a>
					</p>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>About</h5>
					<ul class="links">
						<li><a href="#0">About us</a></li>
						<li><a href="blog.html">Blog</a></li>
						<li><a href="#0">FAQ</a></li>
						<li><a href="login.html">Login</a></li>
						<li><a href="register.html">Register</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Useful links</h5>
					<ul class="links">
						<li><a href="#0">Doctors</a></li>
						<li><a href="#0">Clinics</a></li>
						<li><a href="#0">Specialization</a></li>
						<li><a href="#0">Join as a Doctor</a></li>
						<li><a href="#0">Download App</a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-4">
					<h5>Contact with Us</h5>
					<ul class="contacts">
						<li><a href="tel://61280932400"><i class="icon_mobile"></i> + 61 23 8093 3400</a></li>
						<li><a href="mailto:info@findoctor.com"><i class="icon_mail_alt"></i> help@findoctor.com</a></li>
					</ul>
					<div class="follow_us">
						<h5>Follow us</h5>
						<ul>
							<li><a href="#0"><i class="social_facebook"></i></a></li>
							<li><a href="#0"><i class="social_twitter"></i></a></li>
							<li><a href="#0"><i class="social_linkedin"></i></a></li>
							<li><a href="#0"><i class="social_instagram"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<!--/row-->
			<hr>
			<div class="row">
				<div class="col-md-8">
					<ul id="additional_links">
						<li><a href="#0">Terms and conditions</a></li>
						<li><a href="#0">Privacy</a></li>
					</ul>
				</div>
				<div class="col-md-4">
					<div id="copy">© 2017 Findoctor</div>
				</div>
			</div>
		</div>
	</footer>
	<!--/footer-->

	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="js/jquery-2.2.4.min.js"></script>
	<script src="js/common_scripts.min.js"></script>
	<script src="js/functions.js"></script>
     


</body>
</html>