<?php
include_once 'constant.php';
session_start();

//error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="Ansonika">

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
    <link href="css/date_picker.css" rel="stylesheet">
    
	<!-- YOUR CUSTOM CSS -->
	<link href="css/custom.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>


</head>
     
    <script type="text/javascript">

        
$(document).ready(function(){
    $('.input-group input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){

            $.get("backend-search.php", {term: inputVal}).done(function(data){
          
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".input-group").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
   
  //auto complete
        
         $('#search').tagsinput({
  typeahead: {
    source: function(query) {
      return colors
    }
  }
});
</script>

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
        <?php $keyword="";
                
                
                   if(isset($_POST["search"])) {
                
                 if(empty($_POST["keyword"])){
                               
                 } else {
                     $keyword = $_POST['keyword'];
                     ?>
                     <script type="text/javascript">
                         window.location.href = 'list.php?link=5&search=<?php echo $keyword; ?>';
                    </script><?php
                 }
                    
                }
                
                
                ?> 
		<div id="results">
			<div class="container">
				<div class="row">
					 <div class="col-md-6">
                         <?php
                         if( $_GET['link']==0){
                             ?>
                        <h4><strong>All Packages</strong> </h4>
                            <?php
                         }
                         if( $_GET['link']==1){
                              ?>
                        <h4><strong>Deals of the day</strong> </h4>
                            <?php
                         }
                         if( $_GET['link']==3){
                              ?>
                        <h4><strong>Popular Packages</strong> </h4>
                            <?php
                         }
                         if( $_GET['link']==4){
                              ?>
                        <h4><strong><?php echo "Category : ". $_GET['cat']; ?></strong> </h4>
                            <?php
                         }
                         if( $_GET['link']==5){
                              ?>
                        <h4>Showing result of : <strong><?php echo $_GET['search']; ?></strong> </h4>
                            <?php
                         }
                         
                         ?>
					</div>
					<div class="col-md-6">
                        <?php $keyword="";
                
                
                   if(isset($_POST["search"])) {
                
                 if(empty($_POST["keyword"])){
                     echo "Keyword Empty";
                               
                 } else {
                     $keyword = $_POST['keyword'];
                     ?>
                     <script type="text/javascript">
                         window.location.href = 'list.php?link=5&search=<?php echo $keyword; ?>';
                    </script><?php
                 }
                    
                }
                
                
                ?>
                       				<form method="post" action="">
                   
					<div id="custom-search-input">
						<div class="input-group">
							<input type="text" name="keyword" id="search" autocomplete="off" class="search-query" placeholder="Ex Package name ,Test name" data-toggle="collapse" data-target="#demo" required >
							<input name="search" type="submit"  class="btn_search" value="Search">
                    
                            <p><i></i></p>
                            <div class="result" style="z-index:9999; border:1px solid  #3f4079; padding-left:10px;"></div>
                            
                            </div>
						
                       
					</div>
				</form>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /results -->

		<div class="filters_listing">
			<div class="container">
				<ul class="clearfix">
					<li>
						
                        
                            <div class="switch-field">
                                <?php
                         if( $_GET['link']==3){
                             
                             ?>
							<input type="radio" id="all" name="type_patient" value="all" >
                                <label for="all"><a  href="list.php?link=0&search=''">All</a></label>
							<input type="radio" id="doctors" name="type_patient" value="doctors">
                                <label for="doctors"><a href="list.php?link=1&search=''">Deals of the day</a></label>
							<input type="radio" id="clinics" name="type_patient" value="clinics" checked>
                                <label for="clinics"><a style="color:white;" href="list.php?link=3&search=''">Popular Packages</a></label>
                                <?php
                         }
                                ?>
                                <?php
                         if( $_GET['link']==1){
                             
                             ?>
							<input type="radio" id="all" name="type_patient" value="all" >
                                <label for="all"><a  href="list.php?link=0&search=''">All</a></label>
							<input type="radio" id="doctors" name="type_patient" value="doctors" checked>
                                <label for="doctors"><a style="color:white;"  href="list.php?link=1&search=''">Deals of the day</a></label>
							<input type="radio" id="clinics" name="type_patient" value="clinics">
                                <label for="clinics"><a  href="list.php?link=3&search=''">Popular Packages</a></label>
                                <?php
                         }
                                ?>
                                <?php
                         if( $_GET['link']==0){
                             
                             ?>
							<input type="radio" id="all" name="type_patient" value="all" checked>
                                <label for="all"><a style="color:white;"  href="list.php?link=0&search=''">All</a></label>
							<input type="radio" id="doctors" name="type_patient" value="doctors">
                                <label for="doctors"><a  href="list.php?link=1&search=''">Deals of the day</a></label>
							<input type="radio" id="clinics" name="type_patient" value="clinics" >
                                <label for="clinics"><a  href="list.php?link=3&search=''">Popular Packages</a></label>
                                <?php
                         }else if($_GET['link']>3){
                                ?>
                         
                             
							<input type="radio" id="all" name="type_patient" value="all" >
                                <label for="all"><a  href="list.php?link=0&search=''">All</a></label>
							<input type="radio" id="doctors" name="type_patient" value="doctors">
                                <label for="doctors"><a  href="list.php?link=1&search=''">Deals of the day</a></label>
							<input type="radio" id="clinics" name="type_patient" value="clinics" >
                                <label for="clinics"><a href="list.php?link=3&search=''">Popular Packages</a></label>
                                <?php
                         }
                                ?>
						</div>
                        
					</li>
					
				</ul>
			</div>
			<!-- /container -->
		</div>
		<!-- /filters -->
		
		<div class="container margin_60_35">
			<div class="row">
                
                
				<div class="col-lg-8">
                    <?php
                    $select=0;
                         $send=array('');

                    if( $_GET['link']==0)
                    {
$json_catch=apicall('uvalist.svc/pkglist_pop',$send);
$display= $json_catch['getUVAPackagePopularListResult']['UVA_PackageList_Summary_List'];
//echo sizeof($display);
                    }
                    if( $_GET['link']==1)
                    {
                        

                     $json_catch=apicall('uvalist.svc/pkglist_dotd',$send);
$display= $json_catch['getUVAPackageDealOfTheDayListResult']['UVA_PackageList_Summary_List'];   
                    }
                    
                    
                         if( $_GET['link']==3)
                    {
$json_catch=apicall('uvalist.svc/pkglist_pop',$send);
$display= $json_catch['getUVAPackagePopularListResult']['UVA_PackageList_Summary_List'];
//echo sizeof($display);
                        $select=1;
                    }
                    if( $_GET['link']==4)
                    {
                        
                                       $send=array("wpcategory_id" => $_GET['search']);
                     $json_catch=apicall('uvalist.svc/pkglist_catwise',$send);
$display= $json_catch['getUVAPackageListCategoryWiseResult']['UVA_PackageList_Summary_List'];   
                    }
                    
                     if( $_GET['link']==5)
                    {$link = mysqli_connect("202.66.172.231:3306", "uvauser", "Instant@123", "uvalocal");
                    if($link === false){
                             die("ERROR: Could not connect. " . mysqli_connect_error());
                                                }
                    
                           $search=$_GET['search'];
                              $sql = "SELECT * FROM packagetags WHERE searchtags LIKE '%" . $search . "%' OR packagetitle LIKE '%" . $search . "%'";
                                if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                ?>
                    
                    <div class="strip_list wow fadeIn">
						
						<small><?php echo $row['packagecode']; ?></small>
						<h3><?php echo $row['packagetitle']; ?></h3>
						<p><?php //echo $value['PackageSubTitle']; ?></p>
						
						<ul>
							<li><a><strong>Parameters Included : </strong><?php //echo $value['TestParameterCount']; ?></a></li>
							<li><font style="font-size:17px; opacity:0.6;"><strong>UVA PRICE</strong></font><a style=" font-size: 20px; color: #448cff;"><i class="icon-rupee"></i><?php echo $row['packageprice']; ?> </a></li>
							<li><a href="detailpage.php?link=<?php echo $row['webpackageid']; ?>">Book now</a></li>
						</ul>
					</div>
                   <?php
            }
            // Close result set
            mysqli_free_result($result);
        } else{
            echo "<p>No matches found</p>";
        }
    }
                                                                     
                                                             
                                                             }


                    
                    
                    
                
                    
                   

$count=1;
foreach($display as $key => $value)
{
?>
					<div class="strip_list wow fadeIn">
						
						<small><?php echo $value['PackageCode']; ?></small>
						<h3><?php echo $value['PackageTitle']; ?></h3>
						<p><?php echo $value['PackageSubTitle']; ?></p>
						
						<ul>
							<li><a><strong>Parameters Included : </strong><?php echo $value['TestParameterCount']; ?></a></li>
							<li><font style="font-size:17px; opacity:0.6;"><strong>UVA PRICE</strong></font><a style=" font-size: 20px; color: #448cff;"><i class="icon-rupee"></i><?php echo $value['PackagePrice']; ?> </a></li>
							<li><a href="detailpage.php?link=<?php echo $value['WebPackageID']; ?>">Details</a></li>
						</ul>
					</div>
                    
                    
                    <?php
 
                    if($select==1)
                    {
                         if($count==9)
                            {break;}
                            $count++;
                    }
}
                    
                    ?>
					<!-- /strip_list -->

					
				</div>
                
                
				<!-- /col -->
				
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                <aside class="col-xl-4 col-lg-4" id="sidebar">
					<div class="box_general_3 booking">
						<form>
							<div class="title">
							<h3>Categories</h3>
							<small></small>
							</div>
							
							<!-- /row -->
							<ul class="treatments clearfix">
                                
								 <?php
                    $send=array('');
$json_catch=apicall('uvalist.svc/typencatlist',$send);
$display= $json_catch['getUVATypeAndCategoryListResult']['UVA_TypeAndCategoryData_List'];
        
                    

        
        //@itypecount = 0
        $itypecount = 0;
        $oldtype="";
        
        //<!-- for each element in lst of elements-->
         foreach($display as $key => $value)
         {
             if($oldtype!=$value['WPTypeName'])
             {
                if($itypecount>0)
                {
                ?>
               
 </table>
                    </div>
								</li>
            
                <?php
                }
                $oldtype = $value['WPTypeName'];
                 $itypecount =$itypecount + 1;
?>
                                    <li>
								    <div class="checkbox">
                                    <a href="#toggle<?php echo $itypecount ?>" class="css-checkbox" style="font-size:20px;     color: #3f4079;
"  ><?php echo $value['WPTypeName'] ?><i class="icon-down-open-1" style="float:right;"></i></a>
             <?php                        
            
            //itypecount = itypecount + 1
                 }
             ?>
            <!--end if-->
        
				<div  >
                    <table>
                        
                        <tr><a href="list.php?link=4&search=<?php echo $value['WPCategoryID']; ?>&cat=<?php echo $value['WPCategoryName'] ?>" ><p style="font-size:13px; margin-bottom:7px; class"><?php echo $value['WPCategoryName'] ?></p></a></tr>
                           
                                       
   
  
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
							
						</form>
					</div>
					<!-- /box_general -->
				</aside>
                
				<!-- /aside -->
				
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
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>
    <script src="js/map_listing.js"></script>
    <script src="js/infobox.js"></script>


</body>
</html>