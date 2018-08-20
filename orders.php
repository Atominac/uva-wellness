            <?php
            session_start();
            include_once 'constant.php';
                                          error_reporting(E_ERROR | E_PARSE);

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
                                <li><a href="cart.php?link=0&search="><i class="icon-left-2"></i>View Cart</a></li>

                            </ul>
                        </div>
                    </div>
                    <!-- /breadcrumb -->

                    <div class="container margin_60">
                        <div class="row">

                            <aside class=" col-lg-4" id="sidebar">
                                <div class="box_general_3 booking">
                                    <form>
                                        <div class="title">
                                            <h3>My Orders</h3>
                                        </div>
                                        <div class="summary">
                                            <ul>
                                                <li>Order No. <strong class="float-right">Date </strong></li>


                                     <?php
                                    $send=array('uva_usertoken'=>$_SESSION['user_details']['UVA_Token'],'uva_userid'=>$_SESSION['user_details']['UVA_UserId']);
                $json_catch=apicall('order.svc/orderlist',$send);
                $display= $json_catch['order_requestResult']['UVA_Order_List'];
                                                
                                                    foreach($display as $key => $value)
                                                    {
                                             
                                                        //date decode
                                                        $date=preg_replace( '/[^0-9]/', ' ', $value['OrderDate'] );
                                                        $dateparse = date( 'd/m/Y', ( $date / 1000 ) );
                        if($_GET["link"]==$value['OrderNumber'])
                        {
                            $selected="black";
                            
                        }else
                        {
                            
                           $selected=""; 
                        }

                                                ?>


                                                <a style="color:<?php echo $selected; ?>; " href="orders.php?link=<?php echo $value['OrderNumber']; ?>"><li><?php echo $value['OrderNumber']; ?><strong class="float-right"><?php echo  $dateparse; ?> </strong></li></a>

                                                <?php
                                                    }
                                        ?>
                                            </ul>
                                        </div>
                                        <script>

                                        </script>
                                        <ul class="treatments checkout clearfix">
                                            <li>


                                            </li>

                                        </ul>
                                        <hr>
                                       <!-- <a href="bookingpage.php"  class="btn_1 full-width">Confirm and pay</a> -->


                                    </form>
                                </div>
                                <!-- /box_general -->
                            </aside>
            <!--/aside -->

                            <div class="col-lg-8" id="faq">
                                <div role="tablist" class="add_bottom_45 accordion" id="payment">
                                    <?php
                                    if(isset($_GET["link"]))
                                    {
                                        $count=0;
                                        foreach($display as $key=>$value)
                                        {
                                    if($_GET["link"]==$value['OrderNumber'])
                                    {

                                            ?>
                                        <div class="container">
                                                    <div class="row">

                                                        <div class="col-sm">
                                                            <p><strong>Order No. : </strong><?php echo $value['OrderNumber']; $orderid=$value['UVAOrderID']; ?></p>
                                                         
                                                            </div>
                                                        <?php
                                                        $date=preg_replace( '/[^0-9]/', ' ', $value['OrderDate'] );
                                                        $dateparse = date( 'd/m/Y', ( $date / 1000 ) );
                                        ?>
                                                        <div class="col-sm">
                                                            <p><strong>Order Date : </strong><?php echo $dateparse; ?></p>
                                                         
                                                            </div>
                                                        <div class="col-sm">
                                                              <?php
                                       $order_status=$value['OrderStatus'];
                                            if($value['OrderStatus']==10)
                                            {$status="new";}
                                            if($value['OrderStatus']==20)
                                            {$status="Phlebotomist Assigned";}
                                            if($value['OrderStatus']==30)
                                            {$status="Order Picked";}
                                            if($value['OrderStatus']==40)
                                            {$status="Sample Submitted at Lab";}
                                            if($value['OrderStatus']==50)
                                            {$status="Report Ready";}
                                            if($value['OrderStatus']==60)
                                            {$status=" Report Dispatched on MRP";}
                                            if($value['OrderStatus']==70)
                                            {$status=" Report Delivered via Courier";}
                                            if($value['OrderStatus']==99)
                                            {$status="Cancelled";}
                                            
                                            
                                            ?>
                                                        <p><strong>Order Status : </strong><?php echo $status; ?> </p>
                                                            </div>
                                            </div>
                                            <div class="row">
                                                        
                                                        <div class="col-sm">
                                                        <p><strong>Order Amount(₹) :</strong> <?php echo $value['OrderAmount'] ?> </p>
                                                        </div>
                                                <div class="col-sm">
                                                  
                                                        <p><strong>Payment Status : </strong><?php echo $value['PaymentStatus']; ?> </p>
                                                        </div>
                                                <div class="col-sm">
                                                        <p style="margin:0;"><strong>Payment Mode :</strong></p><?php echo $value['PaymentMode'] ?> 
                                                        </div>

                                                        </div>
                                    </div> 
                                <form name="mForm" onsubmit="return validateForm()" method="post">

                                    <?php
                                            $count=0;
                                        $packagecount=1;  
                                        $webpackageid=1;

                                        $display= $value['UVA_Order_LineItem_list'];
                                        
                                        foreach($display as $key=>$value)
                                        {                                     

                                            ?>

              <div class="card">
                                        <div class="card-header" role="tab">
                                            <h5 class="mb-0">
                                                <a class="collapsed" data-toggle="collapse" href="#collapseTwo_payment<?php echo $count; ?>" aria-expanded="false">
                                                    
                                                    <i class="indicator icon_plus_alt2"></i></a>
                                                     <a class="collapsed" data-toggle="collapse" href="#collapseTwo_payment<?php echo $count; ?>" aria-expanded="false"><?php echo $value['PackageTitle']; ?>
                                                </a>
                                                <input type="hidden" name="uva_order_lineitemid<?php echo $webpackageid; ?>" value="<?php echo $value['UvaOrderLineItemID'] ?>">
                                                <input type="hidden" placeholder="webpackageid<?php echo $webpackageid; ?>" value="<?php echo $value['WebPackageID']; ?>" name="webpackageid<?php echo $webpackageid; ?>">
                                    <input type="hidden" value="<?php echo $value['PackagePrice']; ?>" name="PackagePrice<?php echo $webpackageid; ?>">

                                                                                                    

                                            </h5>
                                        </div>
                                        <div id="collapseTwo_payment<?php echo $count; ?>" class="collapse" role="tabpanel" data-parent="#payment">
                                            <?php  $webpackageid++; ?>
                                            <div class="card-body">


                                          


                                                </div>
                                             <?php
                                                    $display= $value['UVA_Order_LineItem_PatientData_List'];                                        $patientcount=1;            

                                            $i=1;

                                        foreach($display as $key=>$value)
                                        {
                                           
                                            ?>

                                            <div class="container">
                                            <p><strong>Patient</strong> <?php echo "#".$patientcount; ?>  </p>

                                <div class="row">
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input value="<?php echo $value['Patient_FName']; ?>" type="text" class="form-control" id="firstname_booking" name="fname<?php echo $packagecount.$patientcount; ?>" placeholder="Patient First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input value="<?php echo $value['Patient_LName']; ?>" type="text" class="form-control" id="lastname_booking" name="lname<?php echo $packagecount.$patientcount; ?>" placeholder="Patient Last Name" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-sm">
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <input value="<?php echo $value['Patient_MobileNo']; ?>" type="text" class="form-control" id="lastname_booking" name="mobile<?php echo $packagecount.$patientcount; ?>" placeholder="Patient Mobile Number" maxlength="10" required>
                                        </div>
                                    </div>


                                    <div class="col-sm">
                                        <div class="form-group">
                                            <label>Age</label>
                                            <input value="<?php echo $value['Patient_Age']; ?>" type="text" id="email_booking" name="age<?php echo $packagecount.$patientcount; ?>" class="form-control" placeholder="Patient Age" required>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <select class="form-control" name="gender<?php echo $packagecount.$patientcount; ?>">
                                                        <?php
                                            if($value['Patient_Gender']=='M')
                                            {
                                                $gender="Male";
                                            }if($value['Patient_Gender']=='F')
                                            {
                                                $gender="Female";
                                            }if($value['Patient_Gender']=='T')
                                            {
                                                $gender="TransGender";
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



                                                </div>


                                        <?php
                                            $i++;
                                            $count++;$patientcount++;
                                        }
                                            ?>
                                            </div>
                  

</div>
  
                                    <?php
                                      $packagecount++;  }
                            

                                                ?>
                                                                                 
                                     <div class="row">
                                <div class="col-sm">
                                <?php
                                        if($order_status==10)
                                        {echo $value['OrderStatus'];
                                            ?>
                                    
                                    <button style="margin:0;" type="button" class="btn_1" data-toggle="modal" data-target="#exampleModal">
  Cancel Order
</button>
                                    <?php
                                        }
                                            ?>
                                    
                                    
                                    
</div><?php
                                         if($order_status<30)
                                        {
                                            ?>
                                <div class="col-sm"><input style="float:right;" class="btn_1 icon-cancel" type="submit" name="update"  value="Update Details"/>
</div>
                                         <?php
                                         }
                                             ?>
                                </div>
                                    
                                    

<!-- Modal -->

                                    
                                    </form>
                                    
                                    
                                        
                    
                    
                    <?php 
                   // echo "Count is Equal to ".$count;
                    //echo " I is Equal to ".$i;
                    
                       if(isset($_POST["update"]))
            {   
             
                for($a=1;$a<$packagecount;$a++)
                {
                    
                    for($j=1;$j<10;$j++)
                        {
                
                                if(isset($_POST["fname$a$j"]))
                                    {
                                            $detail_patient[]=array(
                                            'uva_order_lineitemid'=>$_POST["uva_order_lineitemid$a"],    
                                            'patient_fname'=>$_POST["fname$a$j"],
                                           'patient_lname'=>$_POST["lname$a$j"],
                                           'patient_gender'=>$_POST["gender$a$j"],
                                           'patient_age'=>$_POST["age$a$j"],
                                           'patient_mobileno'=>$_POST["mobile$a$j"]);
                                    }
                    
                        }
                    
                    
                                                               
                   // unset($detail_patient);

                }
                                               $detail_package=array('lineitem_patientdata'=>$detail_patient); 

                           
                           
                $new=array('orderid'=>$orderid,'uva_usertoken'=>$_SESSION['user_details']['UVA_Token'],
                       'uva_userid'=>$_SESSION['user_details']['UVA_UserId']);
                           $send=array_merge($new,$detail_package);
                           

$json_catch=apicall('order.svc/updatepatient',$send);
//echo sizeof($display);
    
            }
                    
                    
                    
                    ?>
                    
                                    
                                     <script>
                        function validateForm(){
                           var control_form="true";
                            var patient_count = 1;
                            var package_count;
                            var hidden_value = <?php echo $patientcount; ?>;
                            for(package_count=1;package_count<=hidden_value;package_count++)
                                {
                                    patient_count=1;
                                    do
                                        {
                                            if(document.getElementById("fname"+package_count+patient_count))
                                                {
                                                    
                                                    
                                                    if(document.getElementById("fname"+package_count+patient_count).value=="")
                                                        { var err="hgfbgfbgfb";
                                                            document.getElementById("fname"+package_count+patient_count).innerHTML=err;
                                                         document.getElementById("fname"+package_count+patient_count).innerHTML = "New text!";
                                                         alert(err);
                                                            return false;
                                                        }
                                                    if(document.getElementById("lname"+package_count+patient_count).value=="")
                                                        {
                                                            alert("Last Name Must Be Filled");
                                                            return false;
                                                        }
                                                     if(document.getElementById("age"+package_count+patient_count).value=="")
                                                        {
                                                            alert("Age Must Be Filled");
                                                            return false;
                                                        }
                                                     if(document.getElementById("gender"+package_count+patient_count).value=="")
                                                        {
                                                            alert("Gender Must Be Selected");
                                                            return false;
                                                        }
                                                        patient_count++;

                                                }else {control_form=="false"; break;}
                                            
                                            
                                        } while(control_form=="true");
                                }
                            
                            
                            }
                                                   
                    
                    </script>


                                       <?php
                                         $count++;   


                                        }
                                        }
                                    }else
                                            {
                                       echo "select your order"; 
                                        }
                                        ?>

                                    </div>
                               

                            <?php
                                                   if(isset($_POST["cancel"]))
                                                   {
                                                       
                                                   }
?>

                            </div>


                            <!-- /col -->


                        </div>
                        <!-- /row -->
                    </div>
                    <!-- /container -->
                </main>
                <!-- /main -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order No : <?php echo $_GET["link"]; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="post">
      <div class="modal-body">
        <input  class="form-control" type="text" name="cancel_remarks" placeholder="Cancel Remarks"/>
      </div>
      <div class="modal-footer">
        <input  type="submit" name="cancel" value="Cancel Order" class="btn_1">
      </div>
            
        </form>
        <?php
        if(isset($_POST['cancel']))
        {
             $send=array('uva_usertoken'=>$_SESSION['user_details']['UVA_Token'],
                       'uva_userid'=>$_SESSION['user_details']['UVA_UserId'],'orderid'=>$orderid,'cancelremarks'=> $_POST["cancel_remarks"]);
              $json_catch=apicall('order.svc/ordercancel',$send);
            
           
           
        }
        
        ?>
    
    </div>
  </div>
</div>

            <?php 
                
                $myjson=json_encode($send);
                echo $myjson; ?>
                
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