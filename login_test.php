<?php

$obj='{"id":"1743481679069232","first_name":"Sandhini","last_name":"Ghodeshwar","email":"sandhini9@yahoo.co.in","picture":{"data":{"height":50,"is_silhouette":false,"url":"https://platform-lookaside.fbsbx.com/platform/profilepic/?asid=1743481679069232&height=50&width=50&ext=1531055254&hash=AeSE327JUtYKLtAb","width":50}}}';
$conv=json_decode($obj);
echo $conv->first_name;


?>