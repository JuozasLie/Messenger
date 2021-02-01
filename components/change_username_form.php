<div class="form-section">
                <div class="form-grid">
                <form action="" method="POST">
                    <div class="group">
                        <h2 class="form-heading">Change Your Username</h2>
                    </div><!-- group -->
                    <div class="password-error error">
                        <?php
                        if(isset($user_name_error)){
                            echo $user_name_error;
                        } ?> 
                    </div>
                    <div class="group">
                        <input type="text" name="user_name" class="control" placeholder="Enter Your New Username" minlength="5" maxlength="25" value="<?php echo $_SESSION["user_name"]?>">
                    </div><!-- group -->
                    <div class="group">
                        <input type="submit" name="change_username" class="btn signup-btn" value="Save Changes">
                    </div><!-- group -->
                </form>
            </div><!-- form area -->
                </div><!-- form grid -->
            </div><!-- form section --> 