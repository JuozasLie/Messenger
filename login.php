<?php include "init.php"; ?>
<?php

$obj = new base_class;
if(isset($_POST["login"])){
    $email = $obj->security($_POST["email"]);
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

                if(password_verify($password, $db_password)){
                    $user_status = 1;
                    $obj->normal_Query("UPDATE users SET status = ? WHERE user_id = ?", [$user_status, $user_id]);
                    $obj->create_Session("user_name", $user_name);
                    $obj->create_Session("user_id", $user_id);
                    $obj->create_Session("user_image", $user_image);
                    $obj->create_Session("user_email", $email);
                    header("Location:index.php");   
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
    <?php if(isset($_SESSION["security"])): ?>
        <div class="flash-message error-flash">
        <span class="remove-flash">&times;</span>
        <div class="flash-heading">
            <h3><span class="cross">&#x2715;</span> Error: </h3>
        </div>
        <div class="flash-body">
            <p><?php echo $_SESSION["security"]; ?></p>
        </div>
    </div>flash message
    <?php endif; ?>
    <?php unset($_SESSION["security"]); ?>
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