<!DOCTYPE html>
<?php
// Start the session
session_start();
?>
<?php
include_once 'constant.php';
//include_once 'regval.php';
?>
<html lang="en">

<head>
  
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    
    
    <script src="js/script.js"></script>
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
    
	<header class="header_sticky">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div id="logo_home">
						<h1><a href="index.php" title="Findoctor">Findoctor</a></h1>
					</div>
				</div>
				<nav class="col-lg-9 col-6">
					<a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
					<ul id="top_access">
						<li><a href="login.html"><i class="icon_cart"></i></a></li>
					</ul>
					<div class="main-menu">
						<ul>
							<li class="submenu">
								<a href="index.php" class="show-submenu">Home</a>
								
							</li>
							<li class="submenu">
								<a href="#0" class="show-submenu">Download Report</a>
								
							</li>
							<li class="submenu">
								<a href="#0" class="show-submenu">Quick Pay</a>
								
							</li>
							<li><a href="login.html">Login/Sign Up</a></li>
						</ul>
					</div>
					<!-- /main-menu -->
				</nav>
			</div>
		</div>
		<!-- /container -->
	</header>
	<!-- /header -->
	
	<main>
		<div id="hero_register">
			<div class="container margin_120_95">			
				<div class="row">
					<div class="col-lg-6">
						<h1>It's time for you to explore!</h1>
						<p class="lead">Te pri adhuc simul. No eros errem mea. Diam mandamus has ad. Invenire senserit ad has, has ei quis iudico, ad mei nonumes periculis.</p>
						<div class="box_feat_2">
							<i class="pe-7s-map-2"></i>
							<h3>Let patients to Find you!</h3>
							<p>Ut nam graece accumsan cotidieque. Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet.</p>
						</div>
						<div class="box_feat_2">
							<i class="pe-7s-date"></i>
							<h3>Easly manage Bookings</h3>
							<p>Has voluptua vivendum accusamus cu. Ut per assueverit temporibus dissentiet. Eum no atqui putant democritum, velit nusquam sententiae vis no.</p>
						</div>
						<div class="box_feat_2">
							<i class="pe-7s-phone"></i>
							<h3>Instantly via Mobile</h3>
							<p>Eos eu epicuri eleifend suavitate, te primis placerat suavitate his. Nam ut dico intellegat reprehendunt, everti audiam diceret in pri, id has clita consequat suscipiantur.</p>
						</div>
					</div>
					<!-- /col -->
					<div class="col-lg-5 ml-auto">
						<div class="box_form">
                            
                            
                            
                            
                            
                                                 
                            
                            
                             <?php

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
        $mobile_n_err = "Invalid Mobile Number.";
        $count1++;
    } else{
        $mobile_n = trim($_POST['mobile_n']);
    }
    if(empty(trim($_POST['mobile_n']))){
        $mobile_n_err = "Please enter a mobile number.";  
        $count1++;
    } elseif(strlen(trim($_POST['mobile_n'])) > 10){
        $mobile_n_err = "Invalid Mobile Number.";
        $count1++;
    } elseif(!preg_match('/^\+?([0-9]{1,4})\)?[-. ]?([0-9]{10})$/', $mobile_n) ) {
        $mobile_n_err = "Invalid Mobile Number.";
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
      ?>  <p style="color: #23d600">OTP has been sent to your mobile!</p>  <?php

      $_SESSION["otp"] = $otp_catch;

      //echo "<br>".$count1;
      
  }
    }
    
  //to be run when submit otp button is clicked
       
if(isset($_POST['submit_otp_btn'])){ 
    
$mobile_n=trim($_POST['mobile_n']);
    
    $count1=1;
    $otpp=$_SESSION["otp"];
 if($count1=1)
    {
    
    if(empty(trim($_POST['otp']))){
        $otp_err = "Please enter OTP sent to your mobile.";     
    } elseif(strlen(trim($_POST['otp'])) < 6){
        $otp_err = "Invalid OTP.";
    } else{
        $otp = trim($_POST['otp']);
    }
    if(empty(trim($_POST['otp']))){
        $otp_err = "Please enter OTP sent to your mobile."; 
    } elseif(strlen(trim($_POST['otp'])) > 6){
        $otp_err = "Invalid OTP.";
    } else{
        $otp = trim($_POST['otp']);
        $count1++;
       
    }
    }
if($count1 == 2){
if($otpp == $otp)
{
                            ?>
<script type="text/javascript">
window.location.href = 'index.php';
</script>
<?php
}
else {
    echo "Enter valid otp!";
} 
}
    
       }
     

}
            
?> 
                
                            
                           
                            
                            
                            
                            
                            
                            
                          <form action="" method="post">
                                 <p> <strong>Quick Login</strong> </p>
                               <div class="row">
                            <div class="col-md-6 ">       
            <div class="form-group <?php echo (!mobile_n_err) ? 'has-error' : ''; ?>">
                
                <input type="text" name="mobile_n" placeholder="Mobile Number" class="form-control" maxlength="10" value="<?php echo $mobile_n; ?>" required>
                <span class="help-block" style="color:red;"><?php echo $mobile_n_err; ?></span>
            </div> 
                                   </div>
                    <div class="col-md-6 ">               
                <div class="form-group <?php echo (!empty($otp_err)) ? 'has-error' : ''; ?>">
                
                <input type="number" name="otp" placeholder="OTP" class="form-control" maxlength="6" value="<?php echo $otp; ?>">
                   

                    <input type="submit" class="" name="btn_otp" id="test" value="Send OTP">
                                             

                <span class="help-block" style="color:red;"><?php echo $otp_err; ?></span>
                        </div>
                                   </div>
                             </div> 
                               <div class="form-group">
                                   <p class="text-center add_top_10">
                <input type="submit" class="btn_1" name="submit_otp_btn" value="Submit">
                                   </p>
                
            </div>
                            
  
                            </form>  
                            
                           
                        
                            
                            
                            
 
                            
                            <?php

 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $lname=$mobile= $age= $email= "";

$username_err=$email_err = $password_err = $confirm_password_err =$lname_err =$mobile_err= $age_err= "";
                            
                            

 
// Processing form data when form is submitted
if(isset($_POST["custom_signup"])) {
    $count=0;
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
        $count--;
    } else{
        $username = trim($_POST['username']);
        $count++;
    }
    if(empty(trim($_POST["lname"]))){
        $lname_err = "Please enter last name.";
        $count--;
    } else{
        $lname = trim($_POST['lname']);
        $count++;
    }
    if(empty(trim($_POST['mobile']))){
        $mobile_err = "Please enter a mobile number.";     
    } elseif(strlen(trim($_POST['mobile'])) < 10){
        $mobile_err = "Invalid Mobile Number.";
    } else{
        $mobile = trim($_POST['mobile']);
        $count++;
    }
    if(empty(trim($_POST['mobile']))){
        $mobile_err = "Please enter a mobile number.";     
    } elseif(strlen(trim($_POST['mobile'])) > 10){
        $mobile_err = "Invalid Mobile Number.";
    }elseif(!preg_match('/^\+?([0-9]{1,4})\)?[-. ]?([0-9]{10})$/', $mobile) ) {
        $mobile_err = "Invalid Mobile Number.";
}
    else{
        $mobile = trim($_POST['mobile']);
        $count++;
    }
     if(empty(trim($_POST["age"]))){
        $age_err = "Please enter an age.";
    }elseif(strlen(trim($_POST['age'])) > 3){
        $age_err = "Invalid age.";
    } else{
        $age = trim($_POST['age']);
         $count++;
    }
    
     $gender = trim($_POST['gender']);

    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST['password'])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST['password']);
        $count++;
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = 'Please confirm password.';     
    } else{
        $confirm_password = trim($_POST['confirm_password']);
        if($password != $confirm_password){
            $confirm_password_err = 'Password did not match.';
            $count--;
        }
    }
    
     if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email address.";
    } else{
        $email = trim($_POST['email']);
         $count++;
    }
    // Check input errors before inserting in database
                                  if($count==7){  $send=array('uva_fname'=>$username,'uva_lname'=>$lname,'uva_gender'=>$gender,'uva_age'=>$age,'uva_email'=>$email,'uva_mobile'=>$mobile,'uva_password'=>$confirm_password);
                            $json_catch = apicall('signin.svc/reg',$send);
                            $display=$json_catch['register_psResult']['UVA_User_List'];
                            foreach($display as $key => $value)
                            {
                            $user_token=$value['UVA_Token'];
                            $_SESSION["user_details"] = array('UVA_Token' => $value['UVA_Token'],'UVA_MobileNo'=> $value['UVA_MobileNo'],'UVA_UserId'=> $value['UVA_UserId'],'UVA_FName'=> $value['UVA_FName'],'UVA_LName'=> $value['UVA_LName'],'UVA_Gender'=> $value['UVA_Gender'],'UVA_Email'=> $value['UVA_Email'],'UVA_Age'=> $value['UVA_Age']);
                                
                            }
                            //echo sizeof($display);
                                    if($json_catch['register_psResult']['ResultValue']=='UVA_USER_ALREADYEXIST')
                                    {
                                       ?> <p style="background-color:#e20000; color:WHITE; padding:10px 10px 10px 90px;"><strong>Mobile Number Already Exists!</strong></p><?php
                                       // $_SESSION["status"] = "user already exist";
                                    }
                                    else{
                                       $_SESSION["user_token"] = $user_token;
                                        

                                                                   ?>
<script type="text/javascript">
window.location.href = 'index.php';
</script>

<?php
                                    
                                    }
                                               }

                            
        }
        // Close statement
    
    

?>
                            
                            
                            
                            
                           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                 <p> <strong>Login With Complete Details</strong> </p>
                               <div class="row">
                            <div class="col-md-6 ">       
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                
                <input type="text" name="username" placeholder="First Name" class="form-control" maxlength="25" value="<?php echo $username; ?>" required >
                <span class="help-block" style="color:red;"><?php echo $username_err; ?></span>
            </div> 
                                   </div>
                    <div class="col-md-6 ">               
                <div class="form-group <?php echo (!empty($lname_err)) ? 'has-error' : ''; ?>">
                
                <input type="text" name="lname" placeholder="Last Name" class="form-control"  maxlength="25" value="<?php echo $lname; ?>" required>
                <span class="help-block" style="color:red;"><?php echo $lname_err; ?></span>
                        </div>
                                   </div>
                             </div>
                <div class="row">
                 <div class="col-lg-12">               
                <div class="form-group <?php echo (!empty($mobile_err)) ? 'has-error' : ''; ?>">
                
                <input type="text" name="mobile" placeholder="Mobile Number" class="form-control" maxlength="10" value="<?php echo $mobile; ?>" required>
                <span class="help-block" style="color:red;"><?php echo $mobile_err; ?></span>
                        </div>
                  </div>                 </div> 
                               
                    <div class="row">
									<div class="col-md-6">
										<div class="form-group <?php echo (!empty($age_err)) ? 'has-error' : ''; ?>">
											<input type="number" class="form-control" placeholder="Age" name="age" maxlength="3" value="<?php echo $age; ?>" maxlength="3" required>
                                            <span class="help-block" style="color:red;"><?php echo $age_err; ?></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<select class="form-control" value="gender" name="gender" required>
												
                                                
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">TransGender</option>
											</select>
										</div>
									</div>
								</div>           
                               
         <div class="row"> 
            <div class="col-md-6 "> 
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                
                <input type="password" name="password" placeholder="Password" class="form-control" maxlength="10" value="<?php echo $password; ?>">
                <span class="help-block" style="color:red;"><?php echo $password_err; ?></span>
            </div>
             </div>
            <div class="col-md-6 ">    
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                
                <input type="password" name="confirm_password" placeholder="Confirm Password" class="form-control" maxlength="10" value="<?php echo $confirm_password; ?>">
                <span class="help-block" style="color:red;"><?php echo $confirm_password_err; ?></span>
            </div>
            </div>
                               </div>   
        <div class="row">
                 <div class="col-lg-12">               
                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                
                <input type="email" name="email" placeholder="Email Address" class="form-control" maxlength="50" value="<?php echo $email; ?>" required>
                <span class="help-block" style="color:red;"><?php echo $email_err; ?></span>
                </div>
                 </div>  
        </div> 
             
        
            <div class="form-group">'
                <p class="text-center add_top_10">
                <input type="submit" class="btn_1" name="custom_signup" value="Submit">
                    </p>
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
                            
                    
                      <!--
                            
							<form name="mForm" method="post" action=" ">
                                <p> <strong>Login With Complete Details</strong> </p>
								<div class="row">
									<div class="col-md-6 ">
										<div class="form-group">
											<input id="fname" type="text" class="form-control" placeholder="Name" name="fname" maxlength="25" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input id="lname" type="text" class="form-control" placeholder="Last Name" name="lname" maxlength="25" required >
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<input type="number" class="form-control" placeholder="Mobile Number" name="mobile_number" maxlength="10" required >
										</div>
									</div>
								</div>
							
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="number" class="form-control" placeholder="Age" name="age" maxlength="3" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<select class="form-control" name="gender" required>
												
                                                <option value="">Gender</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Others</option>
											</select>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input type="password" class="form-control" placeholder="Password" name="pass" maxlength="10" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input type="password" class="form-control" placeholder="Confirm Password" name="cpass" maxlength="10" required>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-lg-12">
										<div class="form-group">
											<input type="email" class="form-control" placeholder="Email Address" name="email" maxlength="50" required>
										</div>
									</div>
								</div>
								
								<p class="text-center add_top_30"><input type="submit" class="btn_1" value="Submit"></p>
                                
				
							</form>
						</div>
					</div>
				</div>
			</div>
 /hero_register -->
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