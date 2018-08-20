<!DOCTYPE html>
<?php
include_once 'constant.php';
//include_once 'regval.php';
session_start();

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
                        

$mob_err="";
                        
    echo $mob_err;
$mobile_n = $otp ="";
$otp_catch=0;

$mobile_n_err = $otp_err= "";
                            
if(isset($_POST["btn_otp"]) || isset($_POST['submit_otp_btn'])) {
    if(isset($_POST["btn_otp"])){
        $count1=0;
    if($count1==0)
 {
    if(empty(trim($_POST['mobile_n']))){
        $mobile_n_err = "Please enter a mobile number.";  
        $count1++;
    } elseif(strlen(trim($_POST['mobile_n'])) < 10){
         $mobile_n_err = '<p class="alert-danger" style="padding:20px;">
                        <strong>Invalid Mobile Number</strong>
                        </p>'; 
       // $mob_err="Invalid Mobile Number";
        $count1++;
    } else{
        $mobile_n = trim($_POST['mobile_n']);
    }
    if(empty(trim($_POST['mobile_n']))){
        $mobile_n_err = "Please enter a mobile number.";  
        $count1++;
    } elseif(strlen(trim($_POST['mobile_n'])) > 10){
 $mobile_n_err = '<p class="alert-danger" style="padding:20px;">
                        <strong>Invalid Mobile Number</strong>
                        </p>';
        //$mob_err="Invalid Mobile Number";
        $count1++;
    } elseif(!preg_match('/^[0-9]*$/', $mobile_n) ) {
        $mobile_n_err = '<p class="alert-danger" style="padding:20px;">
                        <strong>Invalid Mobile Number</strong>
                        </p>';
      //  $mob_err="Invalid Mobile Number";
        ?> 
                        <?php
        $count1++;
}
        else{
        $mobile_n = trim($_POST['mobile_n']);
    }
}
  if($count1==0)  {
         $send=array('uva_mobile'=>$mobile_n);
    $json_catch=apicall("signin.svc/moblogin",$send);
$otp_catch = $json_catch['mobileotp_psResult'];
     
                        //echo $otp_catch;
    
      $_SESSION["otp"]=$otp_catch;
      
      
      ?>
                     
                    
   <script type="text/javascript">
window.location.href = 'otp_login.php';
                        </script>
                        
                        <?php


      //echo "<br>".$count1;
      
  }
    }
    
  //to be run when submit otp button is clicked
       

     

}
            
?> 
                
                            
                          
                  
                            
                            
                   
                        
                        
                        
                        
                            
                          <form action="" method="post" >
                                 <p> <strong>Enter Mobile Number</strong> </p>
                               
                            <div>       
            <div class="form-group <?php echo (!mobile_n_err) ? 'has-error' : ''; ?>">
                
                <input type="text" name="mobile_n" placeholder="Mobile Number" class="form-control" maxlength="10" value="<?php echo $mobile_n; ?>" required>
                
                <span class="help-block" style="color:red;"><?php //echo $mobile_n_err; ?></span>
                
                

            </div> 
                                <div class="form-group">
                                   <p class="text-center add_top_10">
                                       <input type="submit" class="btn_1 btn"  name="btn_otp"  value="Continue"></p></div>
                                   </div>
                                
  
                            </form> 
                         
        <?php
                       echo $mobile_n_err;
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