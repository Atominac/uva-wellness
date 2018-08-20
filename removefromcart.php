<?php
session_start();
$count=0;
 foreach($_SESSION['cart'] as $key=>$value)
 {  
   if($value['WebPackageID']==$_GET['link'])
   {
       unset($_SESSION['cart'][$key]);
        $count++;
   }
 if($count>0)
 {break;}
   
 }


$item_count=0;

foreach($_SESSION['cart'] as $key=>$value)
 {
                        $item_count++;
                        $_SESSION['cart_info']=array('no_of_items'=>$item_count,'total_price'=>0);
                        $_SESSION['cart_info']['total_price']=$_SESSION['cart_info']['total_price']+$_SESSION['cart']['PackagePrice'];
                    
}
if(empty($_SESSION['cart']))
{
     $_SESSION['cart_info']['no_of_items']=0;
}


                              
                    header("location:cart.php"); 

?>