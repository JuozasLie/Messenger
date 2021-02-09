<?php include "init.php"; ?>
<?php

$obj = new base_class;
if(isset($_POST["login"])){
    $email = strtolower($obj->security($_POST["email"]));
    $password = $obj->security($_POST["password"]);
    $email_status = $password_status = 1;
    if(empty($email)){
        $email_error = "Email is required";
        $email_status = "";
    }
    if(empty($password)){
        $password_error = "Password is required";
        $password_status = "";
    }
    if(!empty($email_status) && !empty($password_status)){
        if($obj->normal_Query("SELECT * FROM users WHERE user_email=?", array($email))){
            if($obj->count_Rows() == 0){
                $email_error = "Email does not exist";
            } else{
                $row = $obj->Single_Result();
                $db_email = $row->user_email;
                $db_password = $row->user_password;
                $user_id = $row->user_id;
                $user_name = $row->user_name;
                $user_image = $row->image;
                $clean_status = $row->clean_status;
                $login_time = time();

                if(password_verify($password, $db_password)){
                    $user_status = 1;
                    update_user_login_status($user_id, $user_status);
                    if($clean_status == 0){
                        clean_messages($user_id);
                        set_login_time($user_id, $login_time);
                        create_login_sessions($user_name, $user_id, $user_image, $email);
                        header("Location:index.php");  
                    } else {
                        set_login_time($user_id, $login_time);
                        create_login_sessions($user_name, $user_id, $user_image, $email);
                        header("Location:index.php"); 
                        }   
                } else {
                    $password_error = "Incorrect password";
                    }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0", shrink-to-fit=no>
    <title>Login</title>
    <?php include "components/css.php"; ?> 
</head>
<body>
    <?php if(isset($_SESSION["security"])){
        error_flash_message($_SESSION["security"]);
    } ?>
    <?php unset($_SESSION["security"]); ?>
    <?php if(isset($_SESSION["flash_success"])){
        success_flash_message($_SESSION["flash_success"]);
    }?>
    <?php unset($_SESSION["flash_success"]); ?>
    <div class="sign-up-container">
        <div class="sign-up-left">
            <div class="left-side-text">
                <h1>Chat app</h1>
                <p>Chat application made with html, css, jquery, php and mysql</p>
            </div><!--account text-->
        </div> <!--sign up left-->
        <div class="sign-up-right">
            <?php include "components/login_form.php"; ?>
        </div> <!--sign up right-->
    </div><!--sign up container-->

    <?php include "components/js.php"; ?>
</body>
</html>