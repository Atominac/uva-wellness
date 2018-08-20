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
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


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

    //    echo $_SESSION['user_details']['detail'];
        //echo $_SESSION['user'];

        ?>

        <main>
            <div class="hero_home version_1">
                <div class="content">
                    <h3>Book a test!</h3>
                    <p>
                    </p>
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
                                <input type="text" name="keyword" id="search" autocomplete="off" class="search-query" placeholder="Ex. Name, Specialization ...." data-toggle="collapse" data-target="#demo"  required>
                                <input name="search" type="submit"  class="btn_search" value="Search">

                                <div class="result"></div>

                                </div>

                            <a type="button" class="button btn btn-primary  icon-doc-text-1 " href="prescription.php"> <strong>Book From Prescription</strong></a>
                            <a type="button" class="button btn btn-primary  icon-home-2 " href="#" >&ensp; Home Collection</a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Hero -->



            <!-- /container -->
            <div class="bg_color_1">
                <div class="container margin_120_95">
                    <div class="main_title">
                        <h2>Deals Of The Day</h2>
                        <p>Usu habeo equidem sanctus no. Suas summo id sed, erat erant oporteat cu pri.</p>
                    </div>

                    <div id="reccomended" class="owl-carousel owl-theme ">
    <?php
    $send=array('');
    $json_catch=apicall('uvalist.svc/pkglist_dotd',$send);
    $display= $json_catch['getUVAPackageDealOfTheDayListResult']['UVA_PackageList_Summary_List'];
    //echo sizeof($display);

    foreach($display as $key => $value)
    {$pass_value=$value['WebPackageID'];

    ?>
    <div class='item' > 
    <div class='deal-container container'>
        <div id="package-title-div" style="height:70px; width:100%;overflow:hidden;">
    <h4 class='package-name' id="package-title" align="center"><?php echo $value['PackageTitle']; ?></h4>
            </div>
    <p align="center" style=" height: 70px; margin-top:10px;"><?php echo $value['PackageSubTitle']; ?></p>
    <p align="center"style="margin-bottom:10px; height:20px; width:auto;"><strong>Parameters covered : </strong><?php echo $value['TestParameterCount']; ?></p>
        
<div class="row">
<div class="col-6"  style="float:left;">
    <font style="font-size:10px; opacity:0.6;"><strong>APPLICABLE FOR</strong></font>
    <br>
        <?php 
    //condition for male and female
    if($value['TestApplicableFor']=='M')
    {
    ?>
    <span class='icon-female-1' style="color:#e74e84;"></span>
    <strong ng-bind='list.actual_price' style=' font-size: 15px; color:#e74e84; '>Females</strong>
    <?php
    }
    ?>
     <?php 
    //condition for male and female
    if($value['TestApplicableFor']=='F')
    {
    ?>
    <span class='icon-female-1' style="color:#e74e84;"></span>
    <strong ng-bind='list.actual_price' style=' font-size: 15px; color:#3f4079; '>Males</strong>
    <?php
    }
    ?>
     <?php 
    //condition for male and female
    if($value['TestApplicableFor']=='B')
    {
    ?>
    <span class='icon-female-1' style="color:#e74e84;"></span>
    <span class='icon-male-1' style="color:#3f4079;"></span>

    <strong ng-bind='list.actual_price' style=' font-size: 15px; color:#e74e84; '>Both</strong>
    <?php
    }
    ?>
    <br>
    <font style="opacity:0.6; font-size:10px; margin-left:10px;"><strong>TOTAL PRICE</strong><br></font>
    <span class='icon-rupee'></span>
    <strong ng-bind='list.actual_price' style=' font-size: 20px; '><strike><?php echo $value['TotalCost']; ?></strike></strong>
        </div>     
        
        
      <div class="col-6" style="float:right;">  
    <font style="font-size:10px; opacity:0.6;"><strong>REPORTING TIME</strong></font>
        <br>
    <span class='icon-clock-1'></span>
    <strong ng-bind='list.actual_price' style='margin-right:10px; font-size: 15px; color: #448cff;'>24 Hrs</strong>
      
     <br>
        
    <font style="opacity:0.6; font-size:10px; margin-left:8px;"><strong>UVA PRICE</strong></font>
    <br>
    <span class='icon-rupee' style="padding:0px; font-size:17px;"></span>
    <strong ng-bind='list.actual_price' style='margin-right:10px; font-size: 20px; color: #448cff;'><?php echo $value['PackagePrice']; ?></strong>
        </div>
        </div>
        
    <?php
    echo  "<a type='button' class='deal-button btn btn-primary' href='detailpage.php?link=$pass_value'> <strong>Details</strong></a>";    
    ?>
    </div>
    </div>
    <?php 
    }
    ?>

                    </div>
                    <!-- /carousel -->
                </div>
                <!-- /container -->
            </div>
            <!-- /white_bg -->


            <!--/package browse-->




                 <div class="bg_color_1">
                <div class="container margin_120_95">
                    <div class="main_title">
                        <h2>Our Popular Packages</h2>
                        <p>Exclusive content writing required.</p>
                    </div>
                    <div class="row">


    <?php
                        $send=array('');
    $json_catch=apicall('uvalist.svc/pkglist_pop',$send);
    $display= $json_catch['getUVAPackagePopularListResult']['UVA_PackageList_Summary_List'];
    //echo sizeof($display);

    $count=1;
    foreach($display as $key => $value)
    {
        ?>
    <div class='col-lg-4 col-md-6' >
    <div class='box_list home'>
     <div id="package-title-div" style="height:60px; width:100%;overflow:hidden; border-radius:5px 5px 0px 0px;">
    <h4 class='package-name' id="package-title" align="center"><?php echo $value['PackageTitle']; ?></h4>
            </div>                 

        <?php  $out=$value['PackageSubTitle']."   ".$value['SearchTags']; ?>
        <p style="height:50px; margin:15px;">
        <?php 
            if(strlen($out)>82)
            {
                echo substr($out, 0, 82) ."...";
            }else{

                echo $out;
            }
        ?>
        </p>




    <p align="center"style="margin-bottom:10px; height:20px; width:auto;"><strong>Parameters covered : </strong><?php echo $value['TestParameterCount']; ?></p>
    <?php 
    $pass_value=$value['WebPackageID'];
    //condition for male and female
    ?>

     <div class='talef' style='margin:10px;'>
    <div style='float: left; margin-right: 0px;'>
    <font style="font-size:10px; opacity:0.6;"><strong>APPLICABLE FOR</strong></font>
    <br>
        <?php 
    //condition for male and female
    if($value['TestApplicableFor']=='M')
    {
    ?>
    <span class='icon-female-1' style="color:#e74e84;"></span>
    <strong ng-bind='list.actual_price' style=' font-size: 15px; color:#e74e84; '>Females</strong>
    <?php
    }
    ?>
     <?php 
    //condition for male and female
    if($value['TestApplicableFor']=='F')
    {
    ?>
    <span class='icon-female-1' style="color:#e74e84;"></span>
    <strong ng-bind='list.actual_price' style=' font-size: 15px; color:#3f4079; '>Males</strong>
    <?php
    }
    ?>
     <?php 
    //condition for male and female
    if($value['TestApplicableFor']=='B')
    {
    ?>
    <span class='icon-female-1' style="color:#e74e84;"></span>
    <span class='icon-male-1' style="color:#3f4079;"></span>

    <strong ng-bind='list.actual_price' style=' font-size: 15px; color:#e74e84; '>Both</strong>
    <?php
    }
    ?>
    </div>
    <div style="float:right;">
    <font style="font-size:10px; opacity:0.6;"><strong>REPORTING TIME</strong></font>
        <br>
    <span class='icon-clock-1'></span>
    <strong ng-bind='list.actual_price' style='margin-right:10px; font-size: 15px; color: #448cff;'>24 Hrs</strong>
    </div>
    </div>     

        <br>
        <br>
    <div class='talef' style='margin:10px;'>
    <div  style='float: left; '>
    <font style="font-size:10px; opacity:0.6;margin-left:8px; "><strong>TOTAL PRICE<br></strong></font>
    <span class='icon-rupee' style="font-size:17px;"></span>
    <strong ng-bind='list.actual_price' style=' font-size: 20px; '><strike><?php echo $value['TotalCost']; ?></strike></strong>
    </div>
    <?php
     $discount=(($value['TotalCost']-$value['PackagePrice'])/$value['TotalCost'])*100;
    ?>
        <span style="margin-left:50px; background-color:black; opacity:0.5;color:white;border-radius:20px; padding:7px;"><?php echo round($discount)."% off"; ?></span>
    <div  style="float:right;">
    <font style="font-size:10px; opacity:0.6; margin-left:15px; "><strong>UVA PRICE</strong></font>
    <br>
    <span class='icon-rupee' style="font-size:17px;"></span>
    <strong ng-bind='list.actual_price' style='margin-right:10px; font-size: 20px; color: #448cff;'><?php echo $value['PackagePrice']; ?></strong>
    </div>
    </div>
    <?php
    echo  "<a type='button' class='deal-button btn btn-primary' style='border-radius:0px 0px 5px 5px;' href='detailpage.php?link=$pass_value'> <strong>Details</strong></a>";    
    ?>							
                            </div>
                        </div>
     <?php
        if($count==9)
        {break;}
        $count++;
    }
    ?>







                    </div>
                    <!-- /row -->
                    <p class="text-center add_top_30"><a href="list.php?link=0&search=''" class="btn_1 medium">View all Packages</a></p>
                </div>
                <!-- /container -->
            </div>
             <!--/package browse-->

            <!--/categories-->
                    <!---slider 1-->


           <?php
            $send=array('');
    $json_catch=apicall('uvalist.svc/typencatlist',$send);
    $display= $json_catch['getUVATypeAndCategoryListResult']['UVA_TypeAndCategoryData_List'];

            //@itypecount = 0
            $itypecount = 0;
            $oldtype="";
            $control=0;
            //<!-- for each element in lst of elements-->
             foreach($display as $key => $value)
             {
                 if($oldtype!=$value['WPTypeName'])
                 {
                    if($itypecount>0)
                    {
                    ?>
                    </div>
                      </div>
                        </div>


                          <a class="carousel-control-prev" style="left: -50px; width: 30px; " href="#carouselExampleControls<?php echo $control ?>" role="button" data-slide="prev">
                            <span class=" icon-left-open-5" aria-hidden="true" style="color: black;">prev</span>
                            <span class="sr-only">Previous</span>
                          </a>

                          <a class="carousel-control-next" style="right: -50px; width: 30px; " href="#carouselExampleControls<?php echo $control ?>" role="button" data-slide="next">
                            <span class=" icon-right-open-5" aria-hidden="true" style="color: black;">Next</span>
                            <span class="sr-only">Next</span>
                          </a>
    <?php
                            $control++;
                        ?>
                </div>
                </div>
                </div>
                    <?php
                    }
                    $oldtype = $value['WPTypeName'];
    ?>
            <div class="container margin_120_95">
                <div class="main_title">

                    <h2><?php echo $value['WPTypeName'] ?></h2>
                    <?php
                    $count=0;
                     ?>
                </div>
                   <div class="container margin_120_95">
                   <div id="carouselExampleControls<?php echo $control ?>" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner" >
                            <div class="carousel-item active">
                                 <div class="row">
                 <?php                        
                $itypecount =$itypecount + 1;
                //itypecount = itypecount + 1
                     }

                 ?>
                <!--end if-->

                    <div class="col-lg-3 col-md-6">
                        <a href="list.php?link=4&search=<?php echo $value['WPCategoryID']; ?>&cat=<?php echo $value['WPCategoryName'] ?>" class="box_cat_home">
                            <i class="icon-info-4"></i>
                            <img src="img/<?php echo $value['WPCategoryID'] ?>.png" s  width="90" height="90" alt="">
                            <h3><?php echo $value['WPCategoryName'] ?></h3>
                            <ul class="clearfix">
                                <li><strong><?php echo $value['PackageCount']; ?></strong>Packages</li>
                            </ul>
                        </a>
                    </div>

                <?php
                     $count++;
                     if($count==4){
                         ?>
                                </div>
                                <?php
                         ?>
                            </div>
                         <div class="carousel-item ">
                                 <div class="row">
                                     <?php
                             $count=0;
                     }
                 }

                if ($itypecount >0)
                { 
                    ?>
                    </div>
                    </div>
                                </div>
                  <a class="carousel-control-prev" style="left: -50px; width: 30px; " href="#carouselExampleControls<?php echo $control ?>" role="button" data-slide="prev">
                    <span class=" icon-left-open-5" aria-hidden="true" style="color: black;">prev</span>
                    <span class="sr-only">Previous</span>
                  </a>

                  <a class="carousel-control-next" style="right: -50px; width: 30px; " href="#carouselExampleControls<?php echo $control ?>" role="button" data-slide="next">
                    <span class=" icon-right-open-5" aria-hidden="true" style="color: black;">Next</span>
                    <span class="sr-only">Next</span>
                      <?php
                      $control++;
                    ?>
                  </a>
                </div>
                                </div>
                </div>      
                <?php
                }
                ?>

          <!--  <div class="container margin_120_95">
                <div class="main_title">
                    <h2>Browse By Habits</h2>
                </div>
            <div class="container margin_120_95">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner" >
        <div class="carousel-item active">
                        <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <a href="list.html" class="box_cat_home">
                            <i class="icon-info-4"></i>
                            <img src="img/icon_cat_1.svg" width="60" height="60" alt="">
                            <h3>STD</h3>
                            <ul class="clearfix">
                                <li><strong>124</strong>Doctors</li>
                                <li><strong>60</strong>Clinics</li>
                            </ul>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="list.html" class="box_cat_home">
                            <i class="icon-info-4"></i>
                            <img src="img/icon_cat_2.svg" width="60" height="60" alt="">
                            <h3>Heart</h3>
                            <ul class="clearfix">
                                <li><strong>124</strong>Doctors</li>
                                <li><strong>60</strong>Clinics</li>
                            </ul>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="list.html" class="box_cat_home">
                            <i class="icon-info-4"></i>
                            <img src="img/icon_cat_3.svg" width="60" height="60" alt="">
                            <h3>Kidney</h3>
                            <ul class="clearfix">
                                <li><strong>124</strong>Doctors</li>
                                <li><strong>60</strong>Clinics</li>
                            </ul>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="list.html" class="box_cat_home">
                            <i class="icon-info-4"></i>
                            <img src="img/icon_cat_4.svg" width="60" height="60" alt="">
                            <h3>Joins</h3>
                            <ul class="clearfix">
                                <li><strong>124</strong>Doctors</li>
                                <li><strong>60</strong>Clinics</li>
                            </ul>
                        </a>
                    </div>
                                </div>
        </div>
        <div class="carousel-item">


            <div class="row">

                <div class="col-lg-3 col-md-6">
                        <a href="list.html" class="box_cat_home">
                            <i class="icon-info-4"></i>
                            <img src="img/icon_cat_7.svg" width="60" height="60" alt="">
                            <h3>Bones</h3>
                            <ul class="clearfix">
                                <li><strong>124</strong>Doctors</li>
                                <li><strong>60</strong>Clinics</li>
                            </ul>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="list.html" class="box_cat_home">
                            <i class="icon-info-4"></i>
                            <img src="img/icon_cat_5.svg" width="60" height="60" alt="">
                            <h3>Fever</h3>
                            <ul class="clearfix">
                                <li><strong>124</strong>Doctors</li>
                                <li><strong>60</strong>Clinics</li>
                            </ul>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="list.html" class="box_cat_home">
                            <i class="icon-info-4"></i>
                            <img src="img/icon_cat_6.svg" width="60" height="60" alt="">
                            <h3>Thyroid</h3>
                            <ul class="clearfix">
                                <li><strong>124</strong>Doctors</li>
                                <li><strong>60</strong>Clinics</li>
                            </ul>
                        </a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a href="list.html" class="box_cat_home">
                            <i class="icon-info-4"></i>
                            <img src="img/icon_cat_8.svg" width="60" height="60" alt="">
                            <h3>Diabetes</h3>
                            <ul class="clearfix">
                                <li><strong>124</strong>Doctors</li>
                                <li><strong>60</strong>Clinics</li>
                            </ul>
                        </a>
                    </div>


            </div>


          </div>

      </div>

      <a class="carousel-control-prev" style="left: -50px; width: 30px; " href="#carouselExampleControls" role="button" data-slide="prev">
        <span class=" icon-left-open-5" aria-hidden="true" style="color: black;">prev</span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" style="right: -50px; width: 30px; " href="#carouselExampleControls" role="button" data-slide="next">
        <span class=" icon-right-open-5" aria-hidden="true" style="color: black;">Next</span>
        <span class="sr-only">Next</span>
      </a>
    </div>
       </div> 

            </div> -->
            <!---slider 1-->




            <!--/categories-->

            <!-- /container -->

            <div id="app_section">
                <div class="container">
                    <div class="row justify-content-around">
                        <div class="col-md-5">
                            <p><img src="img/app.svg" alt="" class="img-fluid" width="500" height="433"></p>
                        </div>
                        <div class="col-md-6">
                            <small>Application</small>
                            <h3>Download <strong>MyReportPlz App</strong> Now!</h3>
                            <p class="lead">Tota omittantur necessitatibus mei ei. Quo paulo perfecto eu, errem percipit ponderum no eos. Has eu mazim sensibus. Ad nonumes dissentiunt qui, ei menandri electram eos. Nam iisque consequuntur cu.</p>
                            <div class="app_buttons wow" data-wow-offset="100">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 43.1 85.9" style="enable-background:new 0 0 43.1 85.9;" xml:space="preserve">
                                <path stroke-linecap="round" stroke-linejoin="round" class="st0 draw-arrow" d="M11.3,2.5c-5.8,5-8.7,12.7-9,20.3s2,15.1,5.3,22c6.7,14,18,25.8,31.7,33.1" />
                                <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-1" d="M40.6,78.1C39,71.3,37.2,64.6,35.2,58" />
                                <path stroke-linecap="round" stroke-linejoin="round" class="draw-arrow tail-2" d="M39.8,78.5c-7.2,1.7-14.3,3.3-21.5,4.9" />
                            </svg>
                                <a href="#0" class="fadeIn"><img src="img/apple_app.png" alt="" width="150" height="50" data-retina="true"></a>
                                <a href="#0" class="fadeIn"><img src="img/google_play_app.png" alt="" width="150" height="50" data-retina="true"></a>
                            </div>
                        </div>
                    </div>
                    <!-- /row -->
                </div>
                <!-- /container -->
            </div>
            <!-- /app_section -->
        </main>
        <!-- /main content -->

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
                            <li><a href="login.php">Login</a></li>
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
