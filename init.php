<?php

session_start();

$client_id = "817yp5t5hkyu7p";
$client_secret = "aJZmgShjawO80gEe";

//$redirect_uri = "http://localhost/uvawellness1/callback.php";

$redirect_uri = "https://uvawellness.com/dev/callback.php";
$scopes = "r_basicprofile%20r_emailaddress";

$csrf_token =rand(1111111, 9999999);
function curl($url, $parameters)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
    curl_setopt($ch, CURLOPT_POST, 1);
    $headers = [];
    $headers[] = "Content-Type: application/x-www-form-urlencoded";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $result = curl_exec($ch);
    return $result;
}


?>