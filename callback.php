<?php


  require_once "init.php";


function getCallback()
{
  $client_id = "817yp5t5hkyu7p";
    $client_secret = "aJZmgShjawO80gEe";
    $redirect_uri = "https://uvawellness.com/dev/callback.php";
    //$csrf_token = random_int(1111111, 9999999);
    //global $csrf_token;
   $scopes = "r_basicprofile%20r_emailaddress";

    if (isset($_REQUEST['code'])) {
        $code = $_REQUEST['code'];
        $csrf_token = $_REQUEST['state'];

        $url = "https://www.linkedin.com/oauth/v2/accessToken";
        $params = [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'redirect_uri' => $redirect_uri,
            'code' => $code,
            'grant_type' => 'authorization_code',
        ];
        $accessToken = curl($url,http_build_query($params));
        $accessToken = json_decode($accessToken)->access_token;

        $url = "https://api.linkedin.com/v1/people/~:(id,firstName,lastName,pictureUrls::(original),headline,publicProfileUrl,location,industry,positions,email-address)?format=json&oauth2_access_token=" . $accessToken;
        $user = file_get_contents($url, false);

        return (json_decode($user));



    }
}


$user = getCallback();
$_SESSION['user'] = $user;
$_SESSION['user_details'] =array('UVA_FName'=>$user->firstName,'UVA_LName'=>$user->lastName,'UVA_Email'=>$user->emailAddress,'UVA_Token'=>"",'UVA_UserId'=>"");
//echo $code;
//echo $csrf_token;

header("location: index.php");
?>