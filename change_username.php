<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0", shrink-to-fit=no>
    <title>Home</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&display=swap" rel="stylesheet"> 
</head>
<body>
    <nav id="nav">
        nav area
    </nav>

    <div class="chat-main-container">
        <section id="sidebar">
            <ul class="sidebar-list">
                <li>
                    <a href="">
                        <span class="profile-img-span">
                            <img src="assets/images/sender.png" alt="Your profile image" class="profile-img">
                        </span>
                    </a>
                </li>
                <li><a href="index.php">Juozas Liebus <span class="hover-effect"></span></a></li>
                <li><a href="change_username.php">Change Username<span class="hover-effect"></span></a></li>
                <li><a href="change_password.php">Change Password<span class="hover-effect"></span></a></li>
                <li><a href="">110 users online<span class="hover-effect"></span></a></li>
                
            </ul>
        </section><!-- sidebar -->
        <section id="right-area">
            <div class="form-section">
                <div class="form-grid">
                <form action="" method="POST">
                    <div class="group">
                        <h2 class="form-heading">Change Your Username</h2>
                    </div><!-- group -->
                    <div class="group">
                        <input type="text" name="user_name" class="control" placeholder="Enter Your New Username">
                    </div><!-- group -->
                    <div class="group">
                        <input type="submit" name="change_username" class="btn signup-btn" value="Save Changes">
                    </div><!-- group -->
                </form>
            </div><!-- form area -->
                </div><!-- form grid -->
            </div><!-- form section -->     
        </section> <!--Right area -->
    </div> <!-- chat main container -->

</body>
</html>