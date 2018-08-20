<?php
include_once 'constant.php';
session_start();

?>
<!DOCTYPE html>
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
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
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
					<li><a href="index.php">Home</a></li>
					<li>Details</li>
				</ul>
			</div>
		</div>
		<!-- /breadcrumb -->
<?php
                           // error_reporting(E_ERROR | E_PARSE);
                            $send = array('package_id' => $_GET['link'] );
                            $json_catch=apicall('uvalist.svc/pkg_data',$send);
                            $display= $json_catch['getUVAPackageDataResult']['PackagePrice'];
                            $add=$_GET['link'];
        
                    $item_count= $_SESSION['cart_info']['no_of_items'];
                    $total_price= $_SESSION['cart_info']['total_price'];

                        if(isset($_POST['add_to_cart']))
                        {
 $_SESSION['cart'][]=array('WebPackageID'=>$json_catch['getUVAPackageDataResult']['WebPackageID'],'PackageTitle'=>$json_catch['getUVAPackageDataResult']['PackageTitle'],'PackagePrice'=>$json_catch['getUVAPackageDataResult']['PackagePrice'],'NoOfPatientCovered'=>$json_catch['getUVAPackageDataResult']['NoOfPatientCovered']);  
                    global $item_count;
                    global $total_price;
                        $item_count++;
                        $_SESSION['cart_info']=array('no_of_items'=>$item_count,'total_price'=>$total_price);
                        $_SESSION['cart_info']['total_price']=$_SESSION['cart_info']['total_price']+$json_catch['getUVAPackageDataResult']['PackagePrice'];
                        }
                    
                           
                                ?>
		<div class="container margin_60">
			<div class="row">

				<div class="col-xl-8 col-lg-8">
					<nav id="secondary_nav">
						<div class="container">
							<ul class="clearfix">
								<li><a href="#section_1" class="active"><?php echo $json_catch['getUVAPackageDataResult']['PackageTitle'] ?></a></li>
								<li><a href="#sidebar">Booking</a></li>
							</ul>
						</div>
					</nav>
                    
                      
					<div id="section_1">
						<div class="box_general_3">

							<div class="profile">
								<div class="row">
									
									<div class="col-lg-7 col-md-8">
                                        
                                                     
										<small><?php echo $json_catch['getUVAPackageDataResult']['PackageTitleDescription'] ?></small>
										<h1><?php echo $json_catch['getUVAPackageDataResult']['PackageSubTitle'] ?></h1>
										<span class="rating">
											<i class="icon_star voted"></i>
											<i class="icon_star voted"></i>
											<i class="icon_star voted"></i>
											<i class="icon_star voted"></i>
											<i class="icon_star"></i>
											<small>(145)</small>
											<a href="badges.html" data-toggle="tooltip" data-placement="top" data-original-title="Badge Level" class="badge_list_1"><img src="img/badges/badge_1.svg" width="15" height="15" alt=""></a>
										</span>
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
								</div>
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
							</div>
							<!-- /profile -->
							<div class="indent_title_in">
								<i class="pe-7s-user"></i>
								<h3>Description</h3>
							</div>
							<div class="wrapper_indent">
								<?php echo $json_catch['getUVAPackageDataResult']['PackageSubTitleDescription'] ?>
								
								
							</div>
							<hr>
						</div>
						<!-- /section_1 -->
					</div>
					<!-- /box_general -->
                    
                    <div id="section_1">
                        	<nav id="secondary_nav">
						<div class="container">
							<ul class="clearfix">
								<li><a href="#section_1" class="active">RECCOMENDED PACKAGES</a></li>
								<li><a href="#sidebar">Booking</a></li>
							</ul>
						</div>
					</nav>
						<div class="box_general_3">
                            
                            
                            
							<ul class="clearfix">
                                
							
						
					
                    <?php

                     $json_catch=apicall('uvalist.svc/pkglist_dotd',$send);
$display= $json_catch['getUVAPackageDealOfTheDayListResult']['UVA_PackageList_Summary_List'];   
                    

$count=1;
foreach($display as $key => $value)
{
?>
					<div class="strip_list wow fadeIn" style="box-shadow:3px 3px 3px 3px #e1e8ed; border:0.5px solid #b7bcbf">
						
						<small><?php echo $value['PackageCode']; ?></small>
						<h3><?php echo $value['PackageTitle']; ?></h3>
						<p><?php echo $value['PackageSubTitle']; ?></p>
						
						<ul>
							<li><a><strong>Parameters Included : </strong><?php echo $value['TestParameterCount']; ?></a></li>
							<li><font style="font-size:17px; opacity:0.6;"><strong>UVA PRICE</strong></font><a style=" font-size: 20px; color: #448cff;"><i class="icon-rupee"></i><?php echo $value['PackagePrice']; ?> </a></li>
							<li><a href="detailpage.php?link=<?php echo $value['WebPackageID']; ?> ">Details</a></li>
						</ul>
					</div>
                    
                    
                    <?php
}
                    
                    ?>
                    
                    
                        </div>
                    </div>
                    
 
                    
                   
                    

				</div>
				<!-- /col -->
                     <?php
                           // error_reporting(E_ERROR | E_PARSE);
                            $send = array('package_id' => $_GET['link'] );
                            $json_catch=apicall('uvalist.svc/pkg_data',$send);
                            $display= $json_catch['getUVAPackageDataResult']['PackagePrice'];
                           
                                ?>
				<aside class="col-xl-4 col-lg-4" id="sidebar">
					<div class="box_general_3 booking">
						<form>
							<div class="title">
							<h3>Test Parameter</h3>
							<small>Details</small>
							</div>
							
							<!-- /row -->
							<ul class="treatments clearfix">
								<?php
                                $display= $json_catch['getUVAPackageDataResult']['UVA_Package_Detail_List'];
        
        //@itypecount = 0
        $itypecount = 0;
        $oldtype="";
        
        //<!-- for each element in lst of elements-->
         foreach($display as $key => $value)
         {
             if($oldtype!=$value['TestSubGroupName'])
             {
                if($itypecount>0)
                {
                ?>
               
 </table>
                    </div>
								</li>
            
                <?php
                }
                $oldtype = $value['TestSubGroupName'];
                 $itypecount =$itypecount + 1;
?>                 
                    
                                    <li>
								    <div class="checkbox" id="checkbox">
                                    <a href="#toggle<?php echo $itypecount ?>" id="toggle" class="css-checkbox"  data-toggle="collapse" data-parent="#toggle<?php echo $itypecount ?> "><?php echo $value['TestSubGroupName'] ?>
                                        
                                      
                                        
                                        <i id="change" class=" icon-down-open-1" style="float:right;"></i>
                                        

                                        </a>
             <?php                        
            
            //itypecount = itypecount + 1
                 }
             ?>
            <!--end if-->
        
				<div id="toggle<?php echo $itypecount ?>" class="collapse">
                    <table>
                        
                        <tr><p style="font-size:11px; margin-bottom:4px;padding-left:4px;"><?php echo $value['TestName'] ?></p></tr>
                           
                                       
   
  
            <?php                        
             }
    
            if ($itypecount >0)
            { 
                ?>
                    </table>
              </div>
								</li>
            <?php
            }
            ?>

								
                                
							</ul>
                   
                    
							<hr>
                    
<a href="addtocart.php?link=<?php echo $add; ?>" class="btn_1 full-width">Add to Cart</a>				
                    </form>
					</div>
					<!-- /box_general -->
				</aside>
				<!-- /asdide -->
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