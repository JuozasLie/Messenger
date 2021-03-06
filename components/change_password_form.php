<div class="form-section">
    <div class="form-grid">
    <form action="" method="POST">
        <div class="group">
            <h2 class="form-heading">Change your password</h2>
        </div><!-- group -->
        <div class="password-error error">
            <?php
            if(isset($current_password_error)){
                echo $current_password_error;
            } ?> 
        </div>
        <div class="group">
            <input type="password" name="current_password" class="control" placeholder="Enter Your Old Password">
        </div><!-- group -->
        <div class="password-error error">
            <?php
            if(isset($new_password_error)){
                echo $new_password_error;
            } ?> 
        </div>
        <div class="group">
            <input type="password" name="new_password" class="control" placeholder="Enter Your New Password">
        </div><!-- group -->
        <div class="password-error error">
            <?php
            if(isset($retype_password_error)){
                echo  $retype_password_error;
            } ?> 
        </div>
        <div class="group">
            <input type="password" name="retype_new_password" class="control" placeholder="Retype Your New Password">
        </div><!-- group -->
        <div class="group">
            <input type="submit" name="change_password" class="btn signup-btn" value="Save Changes">
        </div><!-- group -->
    </form>
    </div><!-- form grid -->
</div><!-- form section -->   