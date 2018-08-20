<!DOCTYPE html>
<?php
// Start the session
session_start();

                              error_reporting(E_ERROR | E_PARSE);

$user = $_SESSION['user'];
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
     <?php
    include_once 'header.php';
    ?>
  
  
    
	<!-- /header -->

 
    
    
	<main>
       
        
		<div id="hero_register">
			<div class="container margin_120_95">			
				<div class="row">
                 
					<!-- /col -->
                    
                        <div style="margin:auto;" >
                            <h1 style="margin:auto; font-size:30px;" class="d-flex justify-content-center">User Profile</h1>
						<div class="box_form clearfix" style="width:auto; margin:auto; ">
                            
                 
                            
                            <?php
                           
                             $user_token="";
                                      $user_id="";
                                        
// Define variables and initialize with empty values
$username = $password = $confirm_password = $lname=$mobile= $age= $email= "";
                            
                             $address_1="";
                                     $address_2="";
                                     $city="";
                                     $landmark="";
                                     $state="" ;

$username_err=$email_err = $password_err = $confirm_password_err =$lname_err =$mobile_err= $age_err= "";
                            
                                    if($_SESSION['user_details']['UVA_UserId']=="")
                                    {                           
                                   $username= $_SESSION['user_details']['UVA_FName'] ;                                      
                                    $lname=$_SESSION['user_details']['UVA_LName'];
                                     $email=$_SESSION['user_details']['UVA_Email'];
                                        $state="Select your state";
                                        
                                    }
                            
                                    if($_SESSION['user_details']['UVA_UserId']!=="")
                                    { 
                                        $user_token=$_SESSION['user_details']['UVA_Token'];
                                        
                                      $user_id=$_SESSION['user_details']['UVA_UserId'];
                                        $send=array('uva_usertoken'=>$user_token,'uva_userid'=>$user_id);             
                                        $json_catch = apicall('signin.svc/getuserdata',$send);
                                        
                                        $display=$json_catch['getuserdata_psResult']['UVA_User_List'];
                                        
                                        foreach($display as $key => $value)
                                        {

                                   $username= $value['UVA_FName'];                                      
                                    $lname=$value['UVA_LName'];
                                     $email=$value['UVA_Email'];
                                     $gender=$value['UVA_Gender'];
                                     $mobile=$value['UVA_MobileNo'];
                                     $address_1=$value['AddressLine1'];
                                     $address_2=$value['AddressLine2'];
                                     $city=$value['CityName'];
                                     $landmark=$value['NearLandmark'];
                                     $state=$value['StateName'];
                                     $age=$value['UVA_Age'];
                                    $zipcode=$value['ZipCode'];

                                            
                                    }
                                        
                                      
                                    }
 

 
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
    }elseif(!preg_match('/^[0-9]*$/', $mobile) ) {
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
    
    
    $address_1 = trim($_POST['address_1']);
    $address_2 = trim($_POST['address_2']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $landmark = trim($_POST['landmark']);
    $zipcode = trim($_POST['zipcode']);
    
    
    // Check input errors before inserting in database
                                  if($count==7){ 
                                     
                                        $user_token=$_SESSION['user_details']['UVA_Token'];
                                      $user_id=$_SESSION['user_details']['UVA_UserId'];
                                     
                                      if($_SESSION['user_details']['UVA_UserId']=="")
                                      {
                                           $send=array('uva_fname'=>$username,'uva_lname'=>$lname,'uva_gender'=>$gender,'uva_age'=>$age,'uva_email'=>$email,'uva_mobile'=>$mobile,'uva_password'=>$confirm_password,'address_line1'=>$address_1,'address_line2'=>$address_2,'state_name'=>$state,'city_name'=>$city,'zip_code'=>$zipcode,'near_landmark'=>$landmark);

                            $json_catch = apicall('signin.svc/reg',$send);
                            $display=$json_catch['register_psResult']['UVA_User_List'];
                                         
                                        
                                      }
                                    if($_SESSION['user_details']['UVA_UserId']!=="")
                                    { 
                                         $send=array('uva_fname'=>$username,'uva_lname'=>$lname,'uva_gender'=>$gender,'uva_age'=>$age,'uva_email'=>$email,'uva_mobile'=>$mobile,'uva_password'=>$confirm_password,'address_line1'=>$address_1,'address_line2'=>$address_2,'state_name'=>$state,'city_name'=>$city,'zip_code'=>$zipcode,'near_landmark'=>$landmark,'uva_usertoken'=>$user_token,'uva_userid'=>$user_id);
                                         

                                         $json_catch = apicall('signin.svc/userupdate',$send);
                            $display=$json_catch['register_psResult']['UVA_User_List'];
                                      }
                                    
                                    if($json_catch['register_psResult']['ResultValue']=='UVA_USER_ALREADYEXIST'||$json_catch['updateuser_psResult']['Result']=='UVA_USERDATA_UPDATE_MOBILENOALREADY_EXIST')
                                    {
                                       ?> <p style="background-color:#e20000; color:WHITE; padding:10px 10px 10px 90px;"><?php echo $json_catch['register_psResult']['ResultValue'];echo $json_catch['updateuser_psResult']['Result']  ?><strong>Mobile Number Already Exists!</strong></p>
                            
                            
                            
                            <?php
                                    }
    
                                    else{ 
                                        
                                        ?>
 <div class="alert alert-success">
  <strong>Success!</strong> Details have been updated.
</div>                            <?php
                                            foreach($display as $key => $value)
                                            {
                                                $user_token=$value['UVA_Token'];
                                                $_SESSION["user_details"] = array('UVA_Token' => $value['UVA_Token'],'UVA_MobileNo'=> $value['UVA_MobileNo'],'UVA_UserId'=> $value['UVA_UserId'],'UVA_FName'=> $value['UVA_FName'],'UVA_LName'=> $value['UVA_LName'],'UVA_Gender'=> $value['UVA_Gender'],'UVA_Email'=> $value['UVA_Email'],'UVA_Age'=> $value['UVA_Age']);
                                
                                            }
                                        
                                        

                                                  
                                    
                                    }
                                               }
    
    if($_GET["link"]==1)
    {
        ?>
        <script>
                window.location.href='bookingpage.php';            
                            </script>
            <?php
    }

                            
        }
        // Close statement
    
    

?>
                            
                         
    
                            
                            
                            
                           <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                               <div class="form_title">
						<h3><strong>1</strong>Personal Details</h3>
						<p>
							Must Fill All The Details
						</p>
					</div>
                               <div class="row">
                                   
                            <div class="col-md-6 ">       
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                
                <input type="text" name="username" placeholder="First Name" id="fname" class="form-control" maxlength="25" value="<?php echo $username; ?><?php //echo $user->firstName ?>" required >
                <span class="help-block" style="color:red;"><?php echo $username_err; ?></span>
            </div> 
                                   </div>
                    <div class="col-md-6 ">               
                <div class="form-group <?php echo (!empty($lname_err)) ? 'has-error' : ''; ?>">
                
                <input type="text" name="lname" placeholder="Last Name" class="form-control"  maxlength="25" value="<?php echo $lname; ?><?php //echo $user->lastName ?>" required>
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
											<input type="number" class="form-control" placeholder="Age" name="age" maxlength="3" value="<?php echo $age; ?><?php echo $user->Age ?>" maxlength="3" required>
                                            <span class="help-block" style="color:red;"><?php echo $age_err; ?></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<select class="form-control" value="gender" name="gender" required>
												             <?php
                                            if($value['Patient_Gender']=="M")
                                            {
                                                $gender="Male";
                                            }if($value['Patient_Gender']=="F")
                                            {
                                                $gender="Female";
                                            }if($value['Patient_Gender']=="T")
                                            {
                                                $gender="TransGender";
                                            }
                                            if($value['Patient_Gender']=="")
                                            {
                                                $gender="Gender";
                                            }
                                            
                                            ?>
                                             <option value="<?php echo $value['Patient_Gender']; ?>"><?php echo $gender ?></option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                                <option value="T">TransGender</option>
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
                
                <input type="email" name="email" placeholder="Email Address" class="form-control" maxlength="50" value="<?php echo $email; ?><?php //echo $user->emailAddress ?>" required>
                <span class="help-block" style="color:red;"><?php echo $email_err; ?></span>
                </div>
                 </div>  
        </div> 
                               <hr>
            <div class="form_title">
						<h3><strong>2</strong>Delivery Address</h3>
						<p>
							Exclusive content writing required
						</p>
					</div>
                               
                               <div class="step" style="padding:0;">
                        <div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<input value="<?php echo $address_1; ?>" type="text" id="street_1" name="address_1" class="form-control" placeholder="Address line 1" required>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<input value="<?php echo $address_2; ?>" type="text" id="street_2" name="address_2" class="form-control" placeholder="Address line 2" >
								</div>
							</div>
						</div>
						<div class="row">
                            <div class="col-md-6 col-sm-6">
								<div class="form-group">
									<input value="<?php echo $city; ?>" type="text" id="street_2" name="city" class="form-control" placeholder="City">
								</div>
							</div>
                            
                            <div class="col-md-6 col-sm-6">
								<div class="form-group">
									<select class="form-control" name="state" id="state">
										<option value="<?php echo $state; ?>"><?php echo $state; ?></option>
                                        <?php
$send=array('');
$json_catch=apicall('general.svc/statecity',$send);
$display= $json_catch['statecity_psResult']['UVA_StateCity_List'];
//echo sizeof($display);
$count=0;
$oldtype="";
foreach($display as $key => $value)
{
             if($oldtype!=$value['StateName'])
             {
?>
										<option value="<?php echo $value['StateName']; ?>"><?php echo $value['StateName']; ?></option>
										
                                        <?php
              $oldtype=$value['StateName'];
             }
}
                                        ?>
                                        
									</select>
								</div>
                                
							</div>
                            </div>
                                   <div class="row">
                                       <div class="col-md-6 col-sm-6">
								<div class="form-group">
									<input type="text" value="<?php echo $landmark; ?>" id="landmark" name="landmark" class="form-control" placeholder="Near Landmark" required>
								</div>
                                       </div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<input type="text" value="<?php echo $zipcode; ?>" id="postal_code" name="zipcode" class="form-control" placeholder="Zip Code" maxlength="6" required>
								</div>
							</div>
                                  
						
					
						<!--End row -->
					</div>
        
            <div class="form-group">
                <p class="text-center add_top_10">
                <input type="submit" class="btn_1" name="custom_signup" value="Update">
                    </p>
            </div>
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