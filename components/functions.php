<?php 
$OBJ = new base_class;
function time_ago($db_msg_time){
    $db_time = strtotime($db_msg_time);
    date_default_timezone_set("Europe/Vilnius");
    $current_time = time();
    $seconds = $current_time - $db_time;
    $minutes = floor($seconds/60);
    $hours = floor($seconds/3600);
    $days = floor($seconds/86400);
    $weeks = floor($seconds/604800);
    $months = floor($seconds/2592000);
    $years = floor($seconds/31536000);
    if($seconds <= 60){
        return "Just Now";
    }
    else if($minutes <= 60){
        if($minutes == 1){
            return "1 minute ago";
        } else {
            return $minutes . " minutes ago";
        }
    }
    else if($hours <= 24){
        if($hours == 1){
            return "1 hour ago";
        } else {
            return $hours . " hours ago";
        }
    }
    else if($days <= 7){
        if($days == 1){
            return "1 day ago";
        } else {
            return $days . " hours ago";
        }
    }
    else if($weeks <= 4.3){
        if($weeks == 1){
            return "1 week ago";
        } else {
            return $weeks . " weeks ago";
        }
    }
    else if($months <= 12){
        if($months == 1){
            return "1 month ago";
        } else {
            return $months . " months ago";
        }
    } else {
        if($years == 1){
            return "1 year ago";
        } else {
            return $years . " years ago";
        }
    }
}
function error_flash_message($message){
    echo 
    "<div class='flash-message error-flash'>
        <span class='remove-flash'>&times;</span>
        <div class='flash-heading'>
            <h3><span class='cross'>&#x2715;</span> Error: </h3>
        </div>
        <div class='flash-body'>
        <p>$message</p>
        </div>
    </div>";
}
function success_flash_message($message){
    echo
    "<div class='flash-message success-flash'>
        <span class='remove-flash'>&times;</span>
        <div class='flash-heading'>
            <h3><span class='checked'>&#10004;</span> Update: </h3>
        </div> <!-- flash heading -->
        <div class='flash-body'>
            <p>$message</p>
        </div>
    </div><!-- flash message -->";
}
function set_login_time($user_id, $login_time){
    GLOBAL $OBJ;
    if($OBJ->normal_Query("SELECT * FROM user_activities WHERE user_id = ?", [$user_id])){
        $row = $OBJ->single_Result();
        if($row == 0){
            $OBJ->normal_Query("INSERT INTO user_activities(user_id, login_time) VALUES (?,?)", [$user_id, $login_time]);
        } else {
            $OBJ->normal_Query("UPDATE user_activities SET login_time = ? WHERE user_id = ?",[$login_time, $user_id]);
        }
    }
}
function create_login_sessions($user_name, $user_id, $user_image, $email){
    global $OBJ;
    $OBJ->create_Session("user_name", $user_name);
    $OBJ->create_Session("user_id", $user_id);
    $OBJ->create_Session("user_image", $user_image);
    $OBJ->create_Session("user_email", $email);
    $OBJ->create_Session("loader", 1);
}
function update_user_login_status($user_id, $user_status){
    global $OBJ;
    $OBJ->normal_Query("UPDATE users SET status = ? WHERE user_id = ?", [$user_status, $user_id]);
    return true;
}
function clean_messages($user_id){
    global $OBJ;
    $OBJ->normal_Query("SELECT msg_id FROM messages ORDER BY msg_id DESC LIMIT 1");
    $last_row = $OBJ->single_Result();
    $last_msg_id = $last_row->msg_id + 1;
    $OBJ->normal_Query("SELECT * FROM clean WHERE clean_user_id = ?", [$user_id]);
    if($OBJ->count_Rows() == 0){
        if($OBJ->normal_Query("INSERT INTO clean (clean_message_id, clean_user_id) VALUES (?,?)",[$last_msg_id, $user_id])){
            $update_clean_status = 1;
            $OBJ->normal_Query("UPDATE users SET clean_status = ? WHERE user_id = ?", [$update_clean_status, $user_id]);
        }
    } else {
        $OBJ->normal_Query("UPDATE clean SET clean_message_id = ? WHERE clean_user_id = ?", [$last_msg_id, $user_id]);
    }

}
?>
