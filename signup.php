<?php
include "init.php";
$obj = new base_class;
if(isset($_POST["signup"])){
    $username = $obj->security($_POST["user_name"]);
    $email    = $obj->security($_POST["email"]);
    $password = $obj->security($_POST["password"]);
    $img_name = $obj->security($_FILES['img']['name']);
    $img_tmp  = $_FILES['img']['tmp_name'];
    $img_path = "assets/images/user_images/";
    $img_extensions = ['jpg','jpeg','png'];
    $img_ext = explode(".", $img_name);
    $img_ext_last = end($img_ext);
    $status = 0;
    

    $username_status = $email_status = $password_status = $image_status = 1;

    //username validation
    if(empty($username)){
        $username_error = "Username is required";
        $username_status = "";
    } elseif($query = $obj->normal_Query("SELECT user_name FROM users WHERE user_name=?", array($username))){
        if(!$obj->count_Rows() == 0){
            $username_error = "Username already exists";
            $username_status = "";
        }
    }
    //email validation
    if(empty($email)){
        $email_error = "Email is required";
        $email_status = "";
    } else {
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $email_error = "Email is invalid";
            $email_status = "";
        } else {
            if($query = $obj->normal_Query("SELECT user_email FROM users WHERE user_email=?", array($email))){
                if(!$obj->count_Rows() == 0){
                    $email_error = "Email already exists";
                    $email_status = "";
                }
            }
        }
    }
    //password validation
    if(empty($password)){
        $password_error = "Password is required";
        $password_status = "";
    } else if(strlen($password) < 5){
        $password_error = "Password is too short";
        $password_status = "";
    }
    //image validation
    if(empty($img_name)){
        $image_error = "Image is required";
        $image_status = "";
    } else if(!in_array($img_ext_last,$img_extensions)){
        $image_error = "Invalid image format";
        $image_status = "";
    }
    //Check Values and upload to db
    if(!empty($username_status) && !empty($email_status) && !empty($password_status) && !empty($image_status)){
        move_uploaded_file($img_tmp, "$img_path.$img_name");
        $obj->normal_Query("INSERT INTO users(user_name, user_email, user_password, image, status) VALUES (?,?,?,?,?)", [$username, $email, password_hash($password, PASSWORD_DEFAULT), $img_name, $status]);
        $obj->create_Session("account_success", "Your account is successfully created");
        header("Location: login.php");
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0", shrink-to-fit=no>
    <title>Create a new account</title>
    <?php include "components/css.php"; ?>
</head>
<body>
    <div class="sign-up-container">
        <div class="sign-up-left">
            <div class="left-side-text">
                <h1>Chat app</h1>
                <p>Chat application made with html, css, jquery, php and mysql</p>
            </div><!--account text-->
        </div> <!--sign up left-->
        <div class="sign-up-right">
            <?php include "components/signup_form.php"; ?>
        </div> <!--sign up right-->
    </div><!--sign up container-->


    <?php include "components/js.php"; ?>
    <script type="text/javascript" src="assets/js/file_label.js"></script>
</body>
</html>