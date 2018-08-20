
<!DOCTYPE html>
<html lang="en">

    
    
	<header class="header_sticky">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div id="logo_home">
						<h1><a href="index.php" title="Findoctor">Findoctor</a></h1>
					</div>
				</div>
				<nav class="col-lg-9 col-6">
					<a class="cmn-toggle-switch cmn-toggle-switch__htx open_close" href="#0"><span>Menu mobile</span></a>
					<ul id="top_access">
                        
                        <li><a href="cart.php"><i class="icon-medkit" style="font-size:27px;"></i></a></li>
                        <?php 
                        
                        if(!empty($_SESSION['cart']))
                        {
                        if(isset($_SESSION['cart_info']))
    {
    ?>
                        <a href="cart.php"><span style="font-size:15px; background-color:#e74e84; color:white; border-radius:20px; padding-left: 12px;padding-right: 12px;"><?php echo $_SESSION['cart_info']['no_of_items']; ?></span></a>
    <?php    
    }
                        }
    ?>
                        
					</ul>
					<div class="main-menu">
						<ul>
							<li class="submenu">
								<a href="index.php" class="show-submenu">Home</a>
								
							</li>
							<li class="submenu">
								<a href="#0" class="show-submenu">Download Report</a>
								
							</li>
							<li class="submenu">
								<a href="quickpay.php" class="show-submenu">Quick Pay</a>
								
							</li>
                            <li>
                                
                                
                                
                          
                                
                               
                                <?php
                                
                            if(!isset($_SESSION['user_details']))
                            {
                                ?>
                            <a href="login.php" >Login/Sign Up</a>

                            <?php
                            }
                                    else if( empty($_SESSION['user_details']))
                            {  
                                ?>
                                <a>Hi, Guest</a>
                                <ul>
                                    <li><a href="profile.php">Profile</a></li>

									<li><a href="logout.php">Logout</a></li>
									
								</ul>
                                <?php
                            }
                                
                                
                                else{
                            ?>
                            
                            <a  ><?php echo "Hi, ".$_SESSION['user_details']['UVA_FName']; ?><i class="icon-down-open-mini"></i></a>
                            <ul>
									<li><a href="profile.php?link=0">Profile</a></li>
                                                                    <li><a href="orders.php">My Orders</a></li>

									<li><a href="logout.php">Logout</a></li>
									
								</ul>
                            <?php
                            }
                                
                                ?>
                                
                            </li>
						</ul>
					</div>
					<!-- /main-menu -->
				</nav>
			</div>
		</div>
		<!-- /container -->
	</header>
    
	<!-- /header -->
</html>