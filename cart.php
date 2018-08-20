<?php
session_start();
include_once 'constant.php';

?>
<!DOCTYPE html>
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
   
    <!-- SPECIFIC CSS -->
    <link href="css/blog.css" rel="stylesheet">
    
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
	<!-- /Header -->
	
	<main>
		<div id="breadcrumb">
			<div class="container">
				<ul>
					<li><a href="list.php?link=0&search="><i class="icon-left-2"></i>Add more Packages</a></li>
					
				</ul>
			</div>
		</div>
		<!-- /breadcrumb -->

		<div class="container margin_60">
			<div class="row">
						
				
				
				<div class="col-lg-8" id="faq">
					<h4 class="nomargin_top">My Cart</h4>
					<div role="tablist" class="add_bottom_45 accordion" id="payment">
                        <?php
                        if(!empty($_SESSION['cart']))
                        {
                            $count=0;
                            foreach($_SESSION['cart'] as $key=>$value)
                            {
                                
                                 $send = array('package_id' =>$value['WebPackageID']);
                            $json_catch=apicall('uvalist.svc/pkg_data',$send);
                            $display= $json_catch['getUVAPackageDataResult']['PackagePrice'];
                                
                                ?>
                        
                        <div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="#collapseTwo_payment<?php echo $count; ?>" aria-expanded="false">
										<i class="indicator icon_plus_alt2"></i><?php echo $value['PackageTitle']; ?>
									</a>
								</h5>
							</div>
							<div id="collapseTwo_payment<?php echo $count; ?>" class="collapse" role="tabpanel" data-parent="#payment">
								<div class="card-body">
                                   
						<div class="box_general_3" >

							<div class="profile">
								<div class="row">
									
									<div class="col-lg-7 col-md-8">
                                        
                                        <div class="col-xs-6  ">
										<ul class="statistic">
											<li><?php echo $json_catch['getUVAPackageDataResult']['TestParameterCount'] ?> Parameters</li>
                                            <?php
                                                
                                                if($json_catch['getUVAPackageDataResult']['TestApplicableFor']=='M')
                                                $gender='Male';
                                                else if($json_catch['getUVAPackageDataResult']['TestApplicableFor']=='F')
                                                $gender='Female';
                                                else
                                                $gender='Male/Female';
                                            ?>
											<li><?php echo $gender ?></li>
                                                                                        <li>Patient Covered : <?php echo $json_catch['getUVAPackageDataResult']['NoOfPatientCovered'] ?> </li>

										</ul>
										
                                        </div>
                                            <div class="col-xs-6">
                                                <ul class="contacts">
											<li>
												<h6>Remarks</h6>
                                                <?php
                                                if($json_catch['getUVAPackageDataResult']['SampleCollectionCharges']==0)
                                                {
                                                    ?>
                                                 <p style="margin-bottom:5px; margin-top:5px;"><?php echo $json_catch['getUVAPackageDataResult']['Remarks'] ?></p>  
                                                <?php
                                                }
                                                else
                                                {
                                                ?>
                                                <p style="margin-bottom:5px; margin-top:5px;"><?php echo $json_catch['getUVAPackageDataResult']['SampleCollectionCharges'] ?></p>  

                                                <?php }   ?>
                                                <p style="margin-bottom:5px; margin-top:5px;">Reporting Time:  <strong><?php echo $json_catch['getUVAPackageDataResult']['ReportingTime'] ?></strong></p>

											</li>
											
										</ul>
                                            
                                        </div>
                                        <hr>
                                        <div class="indent_title_in">
								<i class="pe-7s-cash"></i>
								<h3>Prices &amp; Payments</h3>
                                <div class='talef' style='margin-top: 20px;'>
<div style='float: left; margin-right: 60px;'>
<span class='icon-rupee'></span>
<font>Total Price<br></font>
<strong ng-bind='list.actual_price' style='margin-left:25px; font-size: 20px; '><strike><?php echo $json_catch['getUVAPackageDataResult']['TotalCost'] ?></strike></strong>
</div>
<div>
<font>UVA Price</font>
<br>
<span class='icon-rupee'></span>
<strong ng-bind='list.actual_price' style='margin-right:10px; font-size: 20px; color: #448cff;'><?php echo $json_catch['getUVAPackageDataResult']['PackagePrice'] ?></strong>
</div>
</div>
                                <div class="col-md-6 col-sm-6">
								<img src="img/payments.png" alt="Cards" class="cards">
							</div>
                                            <hr>
                                            <a href="removefromcart.php?link=<?php echo $value['WebPackageID']; ?>" class="btn_1 ">Remove</a>				

							</div>
									</div>
								</div>
							</div>
							
						</div>
							
                                    </div>
								</div>
							</div>
                           <?php
                             $count++;   
                            }
                            
                        }else
                        {echo "empty cart!!";
                        }
                            
                            ?>
						</div>
                     
                        
						
				</div>
				<!-- /col -->
                <?php
                if($_SESSION['cart_info']['no_of_items']>0)
                {
                    ?>
                <aside class=" col-lg-4" id="sidebar">
					<div class="box_general_3 booking">
						<form>
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
                            ?>
								</ul>
							</div>
                            <script>
                       
                            </script>
							<ul class="treatments checkout clearfix">
								<li>
                                    <script>
                                        
                                    function myFunction() {
    var checkBox = document.getElementById("myCheck");
       
    var text = document.getElementById("text");
                                              var x = parseInt(document.getElementById("addedprice").textContent);

    if (checkBox.checked == true){
        var y=50;
        
    var z =x+y;
        document.getElementById('addedprice').innerHTML=z;
    } else {
 var y=50;
        
    var z =x-y;
        document.getElementById('addedprice').innerHTML=z;    }
}
                                    </script>
                                    <?php
                    $couriercharges=50;
                        ?>
                                    
<input type="checkbox" id="myCheck" name="courier"  onclick="myFunction()">								
                                    Courier service <strong class="float-right"><?php echo $couriercharges; ?></strong>
								</li>
								
								<li class="total">
									Total(₹) <strong class="float-right"><p id="addedprice"><?php echo $total_price  ?></p></strong>
                                   
								</li>
							</ul>
							<hr>
                           <!-- <a href="bookingpage.php"  class="btn_1 full-width">Confirm and pay</a> -->
                            <?php
                                if(isset($_GET['proceed']))
                                {
                                    if(isset($_GET['courier']))
                                    {
                                        $_SESSION['cart_info']['total_price']=$total_price+$couriercharges;
                                        $_SESSION['cart_info']['courier']="Y";
                                    }else{
                                         $_SESSION['cart_info']['total_price']=$total_price;
                                        $_SESSION['cart_info']['courier']="N";
                                    }
                                    ?>
                            <script>
                            window.location.href='bookingpage.php';
                            </script>
                            <?php
                                    
                                }
                                ?>
                            <form  method="get">
                            <input class="btn_1 full-width" value="Proceed" type="submit" name="proceed">
                                </form>
						</form>
					</div>
					<!-- /box_general -->
				</aside>
	<?php 
                }
                ?>
				<!--/aside -->
			</div>
			<!-- /row -->
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