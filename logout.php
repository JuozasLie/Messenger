<?php 
include "init.php";
$obj = new base_class;
$user_status = 0;
if($obj->normal_Query("UPDATE users SET status = ? WHERE user_id = ?", [$user_status, $_SESSION["user_id"]])){
    session_destroy();
    header("Location: login.php");
}

?>