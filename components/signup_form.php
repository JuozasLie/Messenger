<div class="form-area">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="group">
                        <h2 class="form-heading">Create your account</h2>
                    </div><!-- group -->
                    <div class="username-error error">
                        <?php
                        if(isset($username_error)){
                            echo $username_error;
                        } ?> 
                    </div>
                    <div class="group">
                        <input type="text" name="user_name" class="control" placeholder="Enter your Username" required value="<?php if(isset($username)): echo $username; endif; ?>">
                    </div><!-- group -->
                    <div class="email-error error">
                        <?php
                        if(isset($email_error)){
                            echo $email_error;
                        } ?> 
                    </div>
                    <div class="group">
                        <input type="email" name="email" class="control" placeholder="Enter your Email" required value="<?php if(isset($email)): echo $email; endif; ?>">
                    </div><!-- group -->
                    <div class="password-error error">
                        <?php
                        if(isset($password_error)){
                            echo $password_error;
                        } ?> 
                    </div>
                    <div class="group">
                        <input type="password" name="password" class="control" placeholder="Create your password" required value="<?php if(isset($password)): echo $password; endif; ?>">
                    </div><!-- group -->
                    <div class="image-error error">
                        <?php
                        if(isset($image_error)){
                            echo $image_error;
                        } ?> 
                    </div>
                    <div class="group">
                        <label for="file" id="file-label"> <i class="fas fa-cloud-upload-alt upload-icon"></i>  Choose profile image</label>
                        <input type="file" name="img" class="file" id="file">
                    </div><!-- group -->

                    <div class="group">
                        <input type="submit" name="signup" class="btn signup-btn" value="Create account">
                    </div><!-- group -->
                </form>
                <div class="group">
                    <a href="login.php" class="link">Already have an account? Click here to login!</a>
                </div>
            </div><!-- form area -->