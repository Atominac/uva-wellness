<?php
session_start();

require_once('settings.php');
require_once('google-login-api.php');

// Google passes a parameter 'code' in the Redirect Url
if(isset($_GET['code'])) {
	try {
		$gapi = new GoogleLoginApi();
		
		// Get the access token 
		$data = $gapi->GetAccessToken(CLIENT_ID, CLIENT_REDIRECT_URL, CLIENT_SECRET, $_GET['code']);
		
		// Get user information
		$user_info = $gapi->GetUserProfileInfo($data['access_token']);

		//echo '<pre>';print_r($user_info); echo '</pre>';

		// Now that the user is logged in you may want to start some session variables
		$_SESSION['logged_in'] = 1;
		
 
        
        $_SESSION['user_details']= array('UVA_FName'=> $user_info["name"]["givenName"],'UVA_LName'=>$user_info["name"]["familyName"],'UVA_Email'=>$user_info["emails"]["0"]["value"],'UVA_Token'=>"",'UVA_UserId'=>"");
        //$_SESSION['user']=array('name'=>$user_info);

       // echo $user_info["emails"]["0"]["value"];

		// You may now want to redirect the user to the home page of your website
            ?>
<script type="text/javascript">
window.location.href = 'index.php';
</script>

<?php
      
     	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit();
	}
}

?>