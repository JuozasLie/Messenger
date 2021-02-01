<?php include "init.php"; ?>
<?php
    $obj = new base_class;
    if(isset($_POST["change_username"])){
        $old_username = $_SESSION['user_name'];
        $new_username = $obj->security($_POST['user_name']);
        $username_validation = 1;
        if(empty($new_username)){
            $user_name_error = "Username is required";
            $username_validation = "";
        }
        if(strlen($new_username) < 5 || strlen($new_username) > 25){
            $username_validation = "Username must be more than 5 and less than 25 characters";
            $username_validation = "";
        }
        $query = $obj->normal_Query("SELECT * FROM users WHERE user_name = ?", [$new_username]);
        if(!$obj->count_Rows() == 0){
            $user_name_error = "Username already taken";
            $username_validation = "";
        }
        if(!empty($username_validation)){
            $query = $obj->normal_Query("UPDATE users SET user_name = ? WHERE user_id = ?", [$new_username, $_SESSION["user_id"]]);
            $obj->create_Session("user_name", $new_username);
            $obj->create_Session("flash_success", "Your Username has been succesfully changed!");
            header("Location:index.php");
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
            <?php include "components/change_username_form.php"; ?>   
        </section> <!--Right area -->
    </div> <!-- chat main container -->

    <?php include "components/js.php"; ?>
</body>
</html>