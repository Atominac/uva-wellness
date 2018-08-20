  <?php
include_once 'constant.php';
                                   

                                     $name = trim($_POST["name"]);
                                     $last_name = trim($_POST["lname"]);
                                     $gender = trim($_POST["gender"]);
                                     $age = trim($_POST["age"]);
                                     $email = trim($_POST["email"]);
                                     $mobile = trim($_POST["mobile_number"]);
                                     $c_pass = trim($_POST["confirm_pass"]);
$pass_value=1;
                               $send=array('uva_fname'=>$name,'uva_lname'=>$last_name,'uva_gender'=>$gender,'uva_age'=>$age,'uva_email'=>$email,'uva_mobile'=>$mobile,'uva_password'=>$c_pass,);
                            $json_catch = apicall('signin.svc/reg',$send);
                            $display=$json_catch['register_psResult']['UVA_User_List'];
                            //echo $display;
                            //echo sizeof($display);
                                    if($json_catch['register_psResult']['ResultValue']=='UVA_USER_ALREADYEXIST')
                                    {
                                       // echo "User already exists!";
                                        $_SESSION["status"] = "user already exist";
                                        header("Location: register.php?link=$pass_value");
                                    }
                                    else{
                                        
                                         header("Location: index.php"); 
    
                                       
                                    
                                    }

                            
                            ?>