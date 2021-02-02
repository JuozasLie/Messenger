<?php
include "init.php";
include "security.php";
?>

<?php
    $obj = new base_class;
    if(isset($_POST["change_image"])){
        $img_name = $obj->security($_FILES["new_image"]["name"]);
        $img_tmp  = $_FILES['new_image']['tmp_name'];
        $img_path = "assets/images/user_images/{$_SESSION['user_email']}/";
        $img_extensions = ['jpg','jpeg','png'];
        $img_ext = explode(".", $img_name);
        $img_ext_last = end($img_ext);
        $image_status = 1;
            //image validation
        if(empty($img_name)){
            $image_error = "Image is required";
            $image_status = "";
        } else if(!in_array($img_ext_last,$img_extensions)){
            $image_error = "Invalid image format";
            $image_status = "";
        } else {
            $user_id = $_SESSION["user_id"];
            $new_img_path = $img_path.$img_name;
            move_uploaded_file($img_tmp, $new_img_path);
            if($obj->normal_Query("UPDATE users SET image = ? WHERE user_id = ?", [$img_name, $user_id])){
                $img_old_path = $img_path.$_SESSION["user_image"];
                unlink($img_old_path);
                $obj->create_Session("flash_success", "Image has been updated!");
                $obj->create_Session("user_image", $img_name);
                header("Location: index.php");
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
            <?php include "components/change_image_form.php"; ?>   
        </section> <!--Right area -->
    </div> <!-- chat main container -->

    <?php include "components/js.php"; ?>
</body>
</html>