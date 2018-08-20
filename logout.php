<?php

require "init.php";

session_destroy();
//unset($_COOKIE["fb_details"]);
header("location: index.php");

?>