<!DOCTYPE html>
<?php
session_start();

?>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="Ansonika">
    <title>UVAWELLNESS-Live more..</title>

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
					<h1>Please upload your prescription here!</h1>
					<div class="box_form">
						<?php
                            if(isset($_FILES['image'])){
                                $errors= array();
                                $file_name = $_FILES['image']['name'];
                                $file_size =$_FILES['image']['size'];
                                $file_tmp =$_FILES['image']['tmp_name'];
                                $file_type=$_FILES['image']['type'];
                                $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
                                $expensions= array("jpeg","jpg","png");
      
                                if(in_array($file_ext,$expensions)=== false){
                                $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                                }
      
                                if($file_size > 2097152){
                                    $errors[]='File size must be excately 2 MB';
                                }
      
                                if(empty($errors)==true){
                                    move_uploaded_file($file_tmp,"images/".$file_name);
                                    echo "Success";
                                }else{
                                    print_r($errors);
                                }
                            }
                            ?>
                        <script>
                            
                            function validateprescription(){
                                var mobile = document.forms["prescription"]["mobile"].value;
                                var length_mobile = mobile.length;
                                var name = document.forms["prescription"]["name"].value;
                               
                                 if(mobile == "")
                                    {
                                     alert("Mobile Number Cannot Be Empty");
                                        return false;
                                    }
                                if(length_mobile<10)
                                    {
                                        alert("Invalid Mobile Number");
                                        return false;
                                    }
                                if(length_mobile>10)
                                    {
                                        alert("Invalid Mobile Number");
                                        return false;
                                    }
                                 if(name == "")
                                    {
                                        alert("Name Cannot Be Empty");
                                        return false;
                                    }
                                
                            }
                            
                        </script>
                        <form name="prescription" onsubmit="return validateprescription()" method="post">
							
                            <input type="file" id="myFile" name="image" required/>
                            
							<div class="divider"><span></span></div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Your Mobile Number" name="mobile">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Name Of The Patient" name="name">
							</div>
							<div class="form-group text-center add_top_20">
								<input class="btn_1 medium" type="submit" value="Submit" >
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