<div class="form-area"> 
    <?php 
        if(isset($_SESSION['account_success'])){
    ?>      <div class="alert alert-success">
                <?php echo $_SESSION['account_success']; ?>
            </div> <!-- alert --> 
    
<?php   }
        unset($_SESSION['account_success']);

?>          
    <form action="" method="POST">
        <div class="group">
            <h2 class="form-heading">User Login</h2>
        </div><!-- group -->
        <div class="email-error error">
            <?php
            if(isset($email_error)){
                echo $email_errorr;
            } ?> 
        </div>
        <div class="group">
            <input type="email" name="email" class="control" placeholder="Enter your Email" value="<?php if(isset($email)): echo $email; endif; ?>">
        </div><!-- group -->
        <div class="password-error error">
            <?php
            if(isset($password_error)){
                echo $password_error;
            } ?> 
        </div>
        <div class="group">
            <input type="password" name="password" class="control" placeholder="Enter your password" value="<?php if(isset($password)): echo $password; endif; ?>">
        </div><!-- group -->
        <div class="group">
            <input type="submit" name="login" class="btn signup-btn" value="Login">
        </div><!-- group -->
    </form>
    <div class="group">
        <a href="signup.php" class="link">Don't have an account? Click here to register!</a>
    </div>
</div><!-- form area -->