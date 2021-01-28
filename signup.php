<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0", shrink-to-fit=no>
    <title>Create a new account</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet"> 
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
            <div class="form-area">
                <form action="" method="POST">
                    <div class="group">
                        <h2 class="form-heading">Create your account</h2>
                    </div><!-- group -->
                    <div class="group">
                        <input type="text" name="full_name" class="control" placeholder="Enter your Full name">
                    </div><!-- group -->
                    <div class="group">
                        <input type="email" name="email" class="control" placeholder="Enter your Email">
                    </div><!-- group -->
                    <div class="group">
                        <input type="password" name="password" class="control" placeholder="Create your password">
                    </div><!-- group -->
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
        </div> <!--sign up right-->
    </div><!--sign up container-->


<script type="text/javascript" src="assets/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/file_label.js"></script>
</body>
</html>