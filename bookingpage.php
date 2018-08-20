<!DOCTYPE html>
<?php
include_once 'constant.php';
session_start();

 if(!isset($_SESSION['user_details']))
{
     ?>
<script>
      window.location.href='login.php?link=1';
    </script>
<?php
 }




if($_SESSION['user_details']['UVA_UserId']=="")
{
    ?>
    <script>
        window.location.href='profile.php?link=1';
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
    
	<!-- /Header -->	
	
	<main>
		<div id="breadcrumb">
			<div class="container">
				<ul>
<li><a href="cart.php"><i class="icon-left-2"></i>View Cart</a></li>

                    <!--
					<li><a href="#">Home</a></li>
					<li><a href="#">Ca</a></li>
					<li>Page active</li>
                    -->
				</ul>
			</div>
		</div>
		<!-- /breadcrumb -->

		<div class="container margin_60">
            <?php
             $user_token_=$_SESSION['user_details']['UVA_Token'];
                                        
                                      $user_id_=$_SESSION['user_details']['UVA_UserId'];
                                        $send_=array('uva_usertoken'=>$user_token_,'uva_userid'=>$user_id_);             
                                        $json_catch_ = apicall('signin.svc/getuserdata',$send_);
                                        
                                        $user_details_=$json_catch_['getuserdata_psResult']['UVA_User_List'];
                                        
                       
                                        foreach($user_details_ as $key => $value)
                                        {

                                   $fname= $value['UVA_FName'];                                      
                                    $lname=$value['UVA_LName'];
                                     $gender=$value['UVA_Gender'];
                                     $mobile=$value['UVA_MobileNo'];
                                     $age=$value['UVA_Age'];

                                     $address_2=$value['AddressLine2'];
                                     $address_1=$value['AddressLine1'];
                                     $city=$value['CityName'];
                                     $state=$value['StateName'];
                                    $zipcode=$value['ZipCode'];
                                        }
                                     ?>
            
            
                                                <form name="mForm" onsubmit="return validateForm()" method="post">

			<div class="row">
				<div class="col-xl-8 col-lg-8">
				<div class="box_general_3 cart">
					
					<div class="form_title">
						<h3><strong>1</strong>Patient Details</h3>
						<p>
							Must Fill All The Details
						</p>
					</div>
                    
                
                    
                    
                    		<div role="tablist" class="add_bottom_45 accordion" id="payment">
                        <?php
                       $count=1;
                              
            
         
                            $webpackageid=1;
                            foreach($_SESSION['cart'] as $key=>$value)
                            {
                                
                                 $send = array('package_id' =>$value['WebPackageID']);
                            $json_catch=apicall('uvalist.svc/pkg_data',$send);
                            $display= $json_catch['getUVAPackageDataResult']['PackagePrice'];
                                
                                ?>
                        
                        <div class="card">
							<div class="card-header strip_list wow fadeIn" style="box-shadow:3px 3px 3px 3px #ele8ed; border: 1px solid #e1e8ed; margin-bottom:5px;" role="tab">
								<h5 class="mb-0">
                                    <input type="hidden" placeholder="webpackageid<?php echo $webpackageid; ?>" value="<?php echo $value['WebPackageID']; ?>" name="webpackageid<?php echo $webpackageid; ?>">
                                    <input type="hidden" value="<?php echo $value['PackagePrice']; ?>" name="PackagePrice<?php echo $webpackageid; ?>">
									<a class="collapsed" data-toggle="collapse" href="#collapseTwo_payment<?php echo $count; ?>" aria-expanded="false">
										<i class="indicator icon_plus_alt2"></i><?php echo $value['PackageTitle']; ?>
                                        
									</a>
								</h5>
							</div>
							<div id="collapseTwo_payment<?php echo $count; ?>" class="collapse" role="tabpanel" data-parent="#payment">
								<div class="card-body">
                                   <?php  $webpackageid++; ?>
                                    <?php
                                    for($i=1;$i<=$value['NoOfPatientCovered'];$i++)
                                    { 
                                        if($i<=1&&$count<=1)
                                        {
                                             
                                        }else
                                        {
                                            $fname="";
                                            $lname="";
                                            $gender="";
                                            $mobile="";
                                            $age="";
                                            
                                        }
                                        
                                    ?><p style="margin-bottom:5px;"><strong>Patient</strong> <?php echo "#".$i; ?>  </p>
					<div class="step">
                                                
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>First Name</label>
									<input type="text" class="form-control" id="fname<?php echo $count.$i; ?>" name="fname<?php echo $count.$i; ?>" placeholder="Eg. Davist" value="<?php echo $fname; ?>" required>
                                    <p id="fname<?php echo $count.$i; ?>"></p>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" class="form-control" id="lname<?php echo $count.$i; ?>" name="lname<?php echo $count.$i; ?>" value="<?php echo $lname; ?>" placeholder="Eg. Gera" required>
                                    <span id="lname<?php echo $count.$i; ?>"></span>
								</div>
							</div>
						</div>
                        <div class="row">
                        
                                  
							<div class="col-sm">
								<div class="form-group">
									<label>Age</label>
									<input type="number" id="age<?php echo $count.$i; ?>" value="<?php echo $age; ?>" name="age<?php echo $count.$i; ?>" class="form-control" placeholder="Eg. 32" maxlength="3" required>
                                    <span id="age<?php echo $count.$i; ?>"></span>
								</div>
							</div>
							<div class="col-sm">
										<div class="form-group">
                                            <?php
                                                if($gender=="M")
                                                {
                                                $gendervalue="Male";
                                                }
                                                if($gender=="F")
                                                {
                                                $gendervalue="Female";
                                                }
                                                if($gender=="T")
                                                {
                                                $gendervalue="TransGender";
                                                }
                                        if($gender==""){$gendervalue="Gender";}
												?>
                                            <label>Gender</label>
											<select class="form-control" id="gender<?php echo $count.$i; ?>" name="gender<?php echo $count.$i; ?>" required>
                                                
                                                <option value="<?php echo $gender; ?>"><?php echo $gendervalue; ?></option>
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                                <option value="T">TransGender</option>
											</select>
										</div>
                                        <span id="gender<?php echo $count.$i; ?>"></span>

									</div>
                            <div class="col-sm">
								<div class="form-group">
									<label>Mobile Number</label>
									<input type="text" class="form-control" id="mobile<?php echo $count.$i; ?>" name="mobile<?php echo $count.$i; ?>" value="<?php echo $age; ?>" placeholder="Optional" maxlength="10" >
								</div>
							</div>
						</div>
                            
                        
					</div>
                    
                                    <?php } ?>
                                   
						                                    </div>
								</div>
							</div>
                           <?php
                             $count++;   
                            }
                                                    
                            ?>
						</div>
                    
                    
                    
                    
                    
                    
                    <?php 
                    
                    
                       if(isset($_POST["pay"]))
            {   
             
                for($a=1;$a<$count;$a++)
                {
                    
                    for($j=1;$j<10;$j++)
                        {
                
                                if(isset($_POST["fname$a$j"]))
                                    {
                                            $detail_patient[]=array('patient_fname'=>$_POST["fname$a$j"],
                                           'patient_lname'=>$_POST["lname$a$j"],
                                           'patient_gender'=>$_POST["gender$a$j"],
                                           'patient_age'=>$_POST["age$a$j"],
                                           'patient_mobileno'=>$_POST["mobile$a$j"]);
                                    }
                    
                        }
                    
                    
                    $detail_package[]=array('webpackageid'=>$_POST["webpackageid$a"],
                                            'webpackagequantity'=>1,
                                            'packageprice'=>$_POST["PackagePrice$a"],
                                            'uva_order_lineitem_patientdata'=>$detail_patient); 
                                                               
                    unset($detail_patient);

                }
                           
                           
                $send=array('uva_usertoken'=>$_SESSION['user_details']['UVA_Token'],
                       'uva_userid'=>$_SESSION['user_details']['UVA_UserId'],
                       'orderamount'=>$_SESSION['cart_info']['total_price'],
                       'orderremarks'=>$_POST["remarks"],
                       'paymentmode'=>$_POST['payment'],
                       'paymentstatus'=>"u",
                       'hardcopyrequired'=>$_SESSION['cart_info']['courier'],
                       'couriercharges'=>50,
                       'address_line1'=>$_POST["address_1"],
                       'address_line2'=>$_POST["address_2"],
                       'state_name'=>$_POST["state"],
                       'city_name'=>$_POST["city"],
                       'zip_code'=>$_POST["postal_code"],
                       'uva_order_lineitem'=>$detail_package
                        
                      );

             $myJSON = json_encode($send);

//echo $myJSON;
$json_catch=apicall('order.svc/ordersubmit',$send);
//echo sizeof($display);
                           
                           
                           ?> 
                        <script> window.location.href="orders.php" </script>
                    <?php
                           
    
            }
                    
                    
                    
                    ?>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
					 
    
    
              
					<hr>
					<!--End step -->

					

					<div class="form_title">
						<h3><strong>2</strong>Delivery Address</h3>
						<p>
							Exclusive content writing required
						</p>
					</div>
					<div class="step">
                        <div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Address line 1</label>
									<input type="text" id="street_1" value="<?php echo $address_1; ?>" name="address_1" class="form-control" placeholder="Address line 1" required>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="form-group">
									<label>Address line 2</label>
									<input type="text" value="<?php echo $address_2; ?>" id="street_2" name="address_2" class="form-control" placeholder="Address line 2" required>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<label>State</label>
								<div class="form-group">
									<select class="form-control" name="state" id="country" required>
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
                            <div class="col-md-3">
								<div class="form-group">
									<label>City</label>
									<input type="text" id="state_booking" value="<?php echo $city; ?>" name="city" class="form-control" placeholder="Eg. Delhi" required>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label>Postal code</label>
									<input type="number" id="postal_code" value="<?php echo $zipcode; ?>" name="postal_code" class="form-control" placeholder="Eg. 110032" maxlength="6" required>
								</div>
							</div>
						</div>
						
					
						<!--End row -->
					</div>
					<hr>
                    <!--End step -->
                    <div class="form_title">
						<h3><strong>3</strong>Payment Method</h3>
						<p>
							Exclusive content writing required
						</p>
					</div>
					<div class="step">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<label>Various Methods for payment</label>
								<div class="form-group">
									
										  <input type="radio" name="payment" value="payumoney" checked> PayU Money<br>
                                            <input type="radio" name="payment" value="paytm"> Paytm<br>
                                            <input type="radio" name="payment" value="cod"> COD 
									   
								</div>
                                
							</div>
                            
							
						</div>
						
					
						<!--End row -->
					</div>
					<!--End step -->
                <hr>
                    <div class="form_title">
						<h3><strong>4</strong>Remarks</h3>
						<p>
							Any special message for us?
						</p>
					</div>
                    					<div class="step">
                                            <div class="col-md-9">
								<div class="form-group">
									<label>Remarks</label>
                                    <textarea rows="4" type="text" id="state_booking" name="remarks" class="form-control" placeholder="Optional" maxlength="250"></textarea>
								</div>
							</div>
                                            
                    </div>

					
				</div>
				</div>
				<!-- /col -->
				<aside class=" col-lg-4" id="sidebar">
					<div class="box_general_3 booking">
						
							<div class="title">
								<h3>Your booking</h3>
							</div>
							<div class="summary">
								<ul>
                                    
                                    
                                     <?php
                        if(!empty($_SESSION['cart']))
                        {
                            $count=0;
                            $total_price=0;
                            foreach($_SESSION['cart'] as $key=>$value)
                            {
                                ?>
                                      <?php  $out=$value['PackageTitle'];
   
        if(strlen($out)>25)
        {
            $title= substr($out, 0, 22) ."...";
        }else{
            
            $title=$out;
        }
                                $total_price=$total_price+$value['PackagePrice'];
                                   
                                        
    ?>
									<li><?php echo $title; ?><strong class="float-right"><?php echo "₹ ".$value['PackagePrice']; ?> </strong></li>
									
                                    <?php
                            }
                        }
                                    if($_SESSION['cart_info']['courier']=="Y")
                                    {
                                    ?>
                                    <li>Courier Charges <strong class="float-right">₹ 50</strong></li>
                                    <?php } ?>
								</ul>
							</div>
                          
							<ul class="treatments checkout clearfix">
								
								
								<li class="total">
									Total(₹) <strong class="float-right"><p id="addedprice"><?php echo $_SESSION['cart_info']['total_price'];  ?></p></strong>
                                   
								</li>
							</ul>
							<hr>
                            <input style="margin:auto;" type="submit" class="btn_1 full-width" value="Proceed to  Payment" name="pay">
                        <br>
                        
                        <p id="message" style="color:red;"><strong>NOTE:</strong> Please expand the package and fill all details.</p>
						
					</div>
					<!-- /box_general -->
				</aside>
				<!-- /asdide -->
			</div>
			<!-- /row -->
            </form>
            
                    
                    <script>
                        function validateForm(){
                           var control_form="true";
                            var patient_count = 1;
                            var package_count;
                            var hidden_value = <?php echo $i; ?>;
                            for(package_count=1;package_count<=hidden_value;package_count++)
                                {
                                    patient_count=1;
                                    do
                                        {
                                            if(document.getElementById("fname"+package_count+patient_count))
                                                {
                                                    
                                                    
                                                    if(document.getElementById("fname"+package_count+patient_count).value=="")
                                                        { 
                                                            return false;
                                                        }
                                                    if(document.getElementById("lname"+package_count+patient_count).value=="")
                                                        {
                                                            return false;
                                                        }
                                                     if(document.getElementById("age"+package_count+patient_count).value=="")
                                                        {
                                                            return false;
                                                        }
                                                     if(document.getElementById("gender"+package_count+patient_count).value=="")
                                                        {
                                                            return false;
                                                        }
                                                        patient_count++;

                                                }else {control_form=="false"; break;}
                                            
                                            
                                        } while(control_form=="true");
                                }
                            
                            
                            }
                                                   
                    
                    </script>
            
            
		</div>
		<!-- /container -->
	</main>
	<!-- /main -->
	
	<footer>
		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-3 col-md-12">
					<p>
						<a href="index.html" title="Findoctor">
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