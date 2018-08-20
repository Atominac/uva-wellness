<!DOCTYPE html>
<?php
include_once 'constant.php';
//include_once 'regval.php';
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
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
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
					<h1>Forgot Password?</h1>
					<div class="box_form">
                        
                        
                        
                        
                        
                        
                        
                       <?php 
                        
                        if(isset($_POST["submit"])) {
                        
                                $email = trim($_POST['email']);
                        
                         $send=array('uva_email'=>$email);
                            $json_catch = apicall('signin.svc/forgotpwd',$send);
                            $display=$json_catch['forgpwd_psResult']['Result'];
                       // echo $display;   
                        
                        //echo sizeof($display);
                                    if($json_catch['forgpwd_psResult']['Result']=='UVA_FORGOTPASSWORD_FAILED_INVALIDEMAIL')
                                    {
                                       ?> <p style="background-color:#e20000; color:WHITE; padding:10px 10px 10px 10px;"><strong>You Have Entered An Invalid Email Address!</strong></p><?php
                                       // $_SESSION["status"] = "user already exist";
                                    }
                                    else{
                                       ?> <p style="background-color:#23d600; color:WHITE; padding:10px 10px 10px 10px;"><strong>Password has been sent to your email!</strong></p><?php
?><script>
window.setTimeout(function() {
    window.location = 'login.php';
  }, 3000);
</script>
                        <?php
                                                                   
                                    
                                    }
                                   
                        
                        
                        }
                        ?>
                        
                        
                        
                        
                        
                        
						
                       
                        <form action=""  method="post" >
                            <p style="font-size: 20px;"><strong>Please Enter The Email Address!</strong></p>
							
                            
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Email Address" name="email" required>
							</div>
							
							<div class="form-group text-center add_top_20">
								<input class="btn_1 medium" name="submit" type="submit"/><br>
                               
							</div>
						</form>
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