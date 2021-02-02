<div class="form-section">
                <div class="form-grid">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="group">
                        <h2 class="form-heading">Change Your Profile Image</h2>
                    </div><!-- group -->
                    <div class="password-error error">
                        <?php
                        if(isset($image_error)){
                            echo $image_error;
                        } ?> 
                    </div>
                    <div class="group">
                        <label for="new_image" id="change-image-label"></label>
                        <input type="file" name="new_image" id="new_image" class="change-image">
                    </div><!-- group -->
                    <div class="group">
                        <input type="submit" name="change_image" class="btn signup-btn" value="Save Changes">
                    </div><!-- group -->
                </form>
            </div><!-- form area -->
                </div><!-- form grid -->
            </div><!-- form section --> 