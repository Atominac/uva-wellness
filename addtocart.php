<?php
include_once 'constant.php';
session_start();

                           // error_reporting(E_ERROR | E_PARSE);
                            $send = array('package_id' => $_GET['link'] );
                            $json_catch=apicall('uvalist.svc/pkg_data',$send);
                            $display= $json_catch['getUVAPackageDataResult']['PackagePrice'];
                           // $add=$_GET['link'];
        
                    $item_count= $_SESSION['cart_info']['no_of_items'];
                    $total_price= $_SESSION['cart_info']['total_price'];

               
 $_SESSION['cart'][]=array('WebPackageID'=>$json_catch['getUVAPackageDataResult']['WebPackageID'],'PackageTitle'=>$json_catch['getUVAPackageDataResult']['PackageTitle'],'PackagePrice'=>$json_catch['getUVAPackageDataResult']['PackagePrice'],'NoOfPatientCovered'=>$json_catch['getUVAPackageDataResult']['NoOfPatientCovered'],'NoOfPatientCovered'=>$json_catch['getUVAPackageDataResult']['NoOfPatientCovered']);  
                     $item_count;
                     $total_price;
                        $item_count++;
                        $_SESSION['cart_info']=array('no_of_items'=>$item_count,'total_price'=>$total_price);
                        $_SESSION['cart_info']['total_price']=$_SESSION['cart_info']['total_price']+$json_catch['getUVAPackageDataResult']['PackagePrice'];
                    
                          header("location:cart.php"); 
                                
//error_reporting(E_ERROR | E_PARSE);
?>