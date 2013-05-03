<?php

include '../models/User.php';
if(isset($_GET["email"]))
{
$user = new user("","",$_GET["email"],"","");
$user->validation();
}
else
 if(isset($_GET["userId"])){
$user = new user($_GET["userId"],"","","",""); 
$user->getaUserByhisID();
}
?>
