<!DOCTYPE html>

<html>
    
    
<?php
include_once "constant.php";
  //require_once "init.php";
    require_once('settings.php');
    //include_once "facebook_login.php";
    require ("vendor/autoload.php");
session_start();


   



?>    

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    
    <script type='text/javascript' src='jquery-1.9.1.js'></script>
<script type="text/javascript" src="jquery.session.js"></script>

<script src="js/script.js"></script>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="Ansonika">
	<title>UVA Wellness</title>

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
				<div id="login-2">
					<h1>Please login to UVA Wellness!</h1>

                    
                  
                    
                    
                    
                                        
 <?php
           
                    $mobile=$password ="";
                    $mobile_err=$password_err ="";
                    $count="";
                    
if(isset($_POST["submit"])) {
        $mobile = trim($_POST['mobile']);
$count="2";
                    
    if(empty(trim($_POST['mobile']))){
        $mobile_err = "Please enter a mobile number.";
        $count--;
    } elseif(strlen(trim($_POST['mobile'])) < 10){
        $mobile_err = '<div style="background-color:#e20000; color:WHITE; padding:10px 10px 10px 10px;margin:5px;"> <p style="margin:0px;"align="center"><strong>Mobile Number entered is invalid!</strong></p></div>';
        $count--;
    } elseif(strlen(trim($_POST['mobile'])) > 10){
        $mobile_err = '<div style="background-color:#e20000; color:WHITE; padding:10px 10px 10px 10px;margin:5px;"> <p style="margin:0px;"align="center"><strong>Mobile Number entered is invalid!</strong></p></div>';
        $$count--;
    }elseif(!preg_match('/^[0-9]*$/', $mobile) ) {
        $mobile_err = '<div style="background-color:#e20000; color:WHITE; padding:10px 10px 10px 10px;margin:5px;"> <p style="margin:0px;"align="center"><strong>Mobile Number entered is invalid!</strong></p></div>';
        $count--;
}

        $password = trim($_POST['pass']);
                    
                    
                    if($count==2){
                   $send=array('uva_mobile'=>$mobile,'uva_password'=>$password);
                            $json_catch = apicall('signin.svc/login',$send);
                            $display=$json_catch['login_psResult']['UVA_User_List'];
                            foreach($display as $key => $value)
                            {
                            $user_token=$value['UVA_Token'];
                           $user_details = array('UVA_Token' => $value['UVA_Token'],'UVA_MobileNo'=> $value['UVA_MobileNo'],'UVA_UserId'=> $value['UVA_UserId'],'UVA_FName'=> $value['UVA_FName'],'UVA_LName'=> $value['UVA_LName'],'UVA_Gender'=> $value['UVA_Gender'],'UVA_Email'=> $value['UVA_Email'],'UVA_Age'=> $value['UVA_Age']);
                                
                            }
                            //echo sizeof($display);
                                    if($json_catch['login_psResult']['ResultValue']=='UVA_USER_NOTFOUND')
                                    {
                                       ?><div style="background-color:#e20000; color:WHITE; padding:10px 10px 10px 10px;margin:5px;"> <p style="margin:0px;"align="center"><strong>Mobile No. or Password is invalid!</strong></p></div><?php
                                       // $_SESSION["status"] = "user already exist";
                                    }
                                    else{
                                        session_start();
                                       $_SESSION["user_details"]=$user_details;
                                        
                            if(!isset($_SESSION['user_details']))
                            {
                               echo "nooooo"; 
                            }
                                                                   ?>
                    <script>
                    window.location.href="index.php";
                    </script>


<?php
                                    
                                    }
                    }
}
                                               
                    
                    
                    
                    
                    
                    
         ?>
                 
                 
                    
                    
                    
                    
                    <?php

if(isset($_GET['state'])) {
    $_SESSION['FBRLH_state'] = $_GET['state'];
}

/*Step 1: Enter Credentials*/
$fb = new \Facebook\Facebook([
    'app_id' => '1084005661774495',
    'app_secret' => 'ba0e51156242f05f5d0393abd6b95794',
    'default_graph_version' => 'v2.4',
    //'default_access_token' => '{access-token}', // optional
]);


/*Step 2 Create the url*/
if(empty($access_token)) {
    

   // echo "<a href='{$fb->getRedirectLoginHelper()->getLoginUrl("https://uvawellness.com/dev/login.php")}'>Login with Facebook </a>";
}

/*Step 3 : Get Access Token*/
$access_token = $fb->getRedirectLoginHelper()->getAccessToken();


/*Step 4: Get the graph user*/
if(isset($access_token)) {


    try {
        $response = $fb->get('/me',$access_token);

        $fb_user = $response->getGraphUser();
        $fname=$fb_user->getName();
        $_SESSION['user_details']=array('UVA_FName'=>$fname,'UVA_Token'=>"",'UVA_UserId'=>"");
       // header("Location : index.php");
                    ?> <script>window.location.href = 'index.php';
 </script> <?php

        //echo  $fb_user->getName();
       // echo $$fb_user;




        //  var_dump($fb_user);
    } catch (\Facebook\Exceptions\FacebookResponseException $e) {
        echo  'Graph returned an error: ' . $e->getMessage();
    } catch (\Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
    }

}
?>
                    
                    
                    
                    
                    
        <?php
                       echo $mobile_err;
                        ?>
                       
                    
                    
                    <form name="myForm" action="" method="post">
						<div class="box_form clearfix">
							<div class="box_login">
                                <a href="otplogin.php" class="social_bt" style="background-color:#dfb612; position:-20px;" align="center"><i class=" icon-lock-1" style="float:left;"></i>Login using Mobile and OTP</a>
                                
                                
								<a href="<?php echo "{$fb->getRedirectLoginHelper()->getLoginUrl("https://uvawellness.com/dev/login.php")}"; ?>" class="social_bt facebook">Login with Facebook</a>
								<a href="<?= 'https://accounts.google.com/o/oauth2/auth?scope=' . urlencode('https://www.googleapis.com/auth/userinfo.profile https://www.googleapis.com/auth/userinfo.email https://www.googleapis.com/auth/plus.me') . '&redirect_uri=' . urlencode(CLIENT_REDIRECT_URL) . '&response_type=code&client_id=' . CLIENT_ID . '&access_type=online' ?>" class="social_bt google">Login with Google</a>
								
								<a href="<?php  echo "https://www.linkedin.com/oauth/v2/authorization?response_type=code&client_id={$client_id}&redirect_uri={$redirect_uri}&state={$csrf_token}&scope={$scopes}"; ?>" class="social_bt linkedin">Login with Linkedin</a>
							</div>
							<div class="box_login last">
								<div class="form-group">
									<input type="text" class="form-control" placeholder="Your Mobile Number" value="<?php echo $mobile; ?>" maxlength="10" name="mobile" required>
                                    <span class="help-block" style="color:red;"></span>
                                </div>
								<div class="form-group">
									<input type="password" class="form-control" maxlength="10" placeholder="Your password" name="pass" required>
                                <span class="help-block" style="color:red;"><?php echo $password_err; ?></span>

									<a href="forgetpass.php" class="forgot"><small>Forgot password?</small></a>
								</div>
								<div class="form-group">
									<input class="btn_1" type="submit" name="submit" value="Login">
								</div>
							</div>
						</div>
					</form>
                                          
       
                        
					<p class="text-center link_bright">Do not have an account yet? <a href="register.php"><strong>Register now!</strong></a></p>
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