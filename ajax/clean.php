<?php 
include "../init.php";
$obj = new base_class;

if(isset($_POST["clean"])){
    $user_id = $_SESSION['user_id'];
    clean_messages($user_id);      
    echo json_encode(array("status" => "clean"));  
}

?>