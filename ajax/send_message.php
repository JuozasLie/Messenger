<?php 
include "../init.php";
$obj = new base_class;
if(isset($_POST["message"])){
    $message = $obj->security($_POST["message"]);
    $user_id = $_SESSION["user_id"];
    $msg_type = "text";
    if($obj->normal_Query("INSERT INTO messages (msg_content, msg_type, user_id) VALUES (?, ?, ?)", [$message, $msg_type, $user_id])){
        echo json_encode(["status" => "success"]);
    }

}

?>