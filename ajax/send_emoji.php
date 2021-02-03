<?php 
include "../init.php";
$obj = new base_class;

if(isset($_POST['send_emoji'])){
    $emoji = $_POST['send_emoji'];
    $msg_type = 'emoji';
    $user_id = $_SESSION["user_id"];
    if($obj->normal_Query("INSERT INTO messages (msg_content, msg_type, user_id) VALUES (?, ?, ?)",[$emoji, $msg_type, $user_id])){
        echo json_encode(["status" => 'success']);
    }
}
?>