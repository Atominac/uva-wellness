<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */

 
/* Attempt to connect to MySQL database */
$link = mysqli_connect("202.66.172.231:8443", "uvauser", "Instant@123", "uvalocal");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>