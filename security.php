<?php if(!isset($_SESSION["user_name"])){
    $obj = new base_class;
    $obj->create_Session("security", "Unauthorized access, please login!");
    header("Location:login.php");
} ?>