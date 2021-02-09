<?php 
include "init.php";
$obj = new base_class;
$user_status = 0;
if(update_user_login_status($_SESSION["user_id"], $user_status)){
    session_destroy();
    header("Location: login.php");
}

?>