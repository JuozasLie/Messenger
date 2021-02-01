<?php 
include "init.php";
if(!isset($_SESSION["user_name"])){
    header("Location:login.php");
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
    <?php if(isset($_SESSION["flash_success"])):     ?>
        <div class="flash-message success-flash">
            <span class="remove-flash">&times;</span>
            <div class="flash-heading">
                <h3><span class="checked">&#10004;</span> Update: </h3>
            </div> <!-- flash heading -->
            <div class="flash-body">
                <p><?php echo $_SESSION["flash_success"]; ?></p>
            </div>
        </div><!-- flash message -->
    <?php endif; ?>
    <?php unset($_SESSION["flash_success"]); ?>
<!--    <div class="flash-message error-flash">
        <span class="remove-flash">&times;</span>
        <div class="flash-heading">
            <h3><span class="cross">&#x2715;</span> Error: </h3>
        </div>
        <div class="flash-body">
            <p>Something went wrong!</p>
        </div>
    </div>flash message -->
    <?php include "components/nav.php"; ?>
    <div class="chat-main-container">
        <?php include "components/sidebar.php"; ?>
        <section id="right-area">
            <?php include "components/messages.php"; ?>
            <?php include "components/chat_form.php"; ?>
            <?php include "components/emoji.php"; ?>
        </section> <!--Right area -->
    </div> <!-- chat main container -->
    <?php include "components/js.php"; ?>
</body>
</html>