<?php 
include "../init.php";
$obj = new base_class;
$session_user_id = $_SESSION['user_id'];
if($obj->normal_Query("SELECT * FROM user_activities")){
    $rows = $obj->fetch_all();
    foreach($rows as $result):
        $user_id = $result->user_id;
        $login_time = $result->login_time;
        $current_time = time();
        $time_diff = $current_time - $login_time;
        $user_status = 0;
        if($session_user_id == $user_id){
            if($time_diff > 3600){
                update_user_login_status($user_id, $user_status);
                unset($_SESSION["user_id"]);
                echo json_encode(array("status" => "href"));
            }
        } else {
            if($time_diff > 3600){
                $logged_in_status = 1;
                $obj->normal_Query("UPDATE users SET status = ? WHERE id = ? AND status = ?", [$user_status, $user_id, $logged_in_status]);
            }
        }
    endforeach;
}
?>