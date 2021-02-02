<?php
include "init.php";
include "security.php";
?>
<?php 
$obj = new base_class;
if(isset($_POST["change_password"])){
    $current_password = $obj->security($_POST["current_password"]);
    $new_password     = $obj->security($_POST["new_password"]);
    $retype_password  = $obj->security($_POST["retype_new_password"]);
    $current_password_status = $new_password_status = $retype_password_status = 1;
    if(empty($current_password)){
        $current_password_status = "";
        $current_password_error = "Current password is required";
    }
    if(empty($new_password)){
        $new_password_status = "";
        $new_password_error = "New password is required";
    } else if(strlen($new_password) < 5){
        $new_password_status = "";
        $new_password_error = "Password must be more than 5 characters";
    }
    if(empty($retype_password)){
        $retype_password_status = "";
        $retype_password_error = "Retype your new password";
    } else if($new_password != $retype_password){
        $retype_password_status = "";
        $retype_password_error  = "Passwords do not match";
    }
    if(!empty($current_password_status) && !empty($new_password_status) && !empty($retype_password_status)){
        $user_id = $_SESSION["user_id"];
        $obj->normal_Query("SELECT user_password FROM users WHERE user_id = ?", [$user_id]);
        $row = $obj->single_Result();
        $db_password = $row->user_password;
        if(password_verify($current_password, $db_password)){
            $obj->normal_Query("UPDATE users SET user_password = ? WHERE user_id = ?", [password_hash($new_password, PASSWORD_DEFAULT), $user_id]);
            $obj->create_Session("flash_success", "Your password is successfully updated");
            header("Location: index.php");
        } else {
            $current_password_status = "";
            $current_password_error = "Incorrect password";
        }

    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0", shrink-to-fit=no>
<title>Home</title>
<?php include "components/css.php"; ?>
</head>
<body>
<?php include "components/nav.php"; ?>

<div class="chat-main-container">
<?php include "components/sidebar.php"; ?>
    <section id="right-area">
        <?php include "components/change_password_form.php"; ?>    
    </section> <!--Right area -->
</div> <!-- chat main container -->
<?php include "components/js.php"; ?>
</body>
</html>