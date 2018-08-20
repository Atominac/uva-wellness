<?php

$token='TMwDqEW/3zAxJWqI8zylNKR0j/mnStYvslAlaNkzPSM=';
$apiheader='https://myreportplz.com/ws_uva/';
$labid=36;
function apicall($api,$send) {
global $apiheader;
global $token;
global $labid;
    
    $ch = curl_init();
$constant = array('lab_id' => $labid,'uva_token'=> $token );
$data=array_merge($constant,$send) ;  
    
$data_string = json_encode($data);
$url=$apiheader.$api;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response  = curl_exec($ch);
curl_close($ch);
//echo $response;
$json_decoded=json_decode($response,true);
    return $json_decoded;
}
?>