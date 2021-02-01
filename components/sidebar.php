<section id="sidebar">
            <ul class="sidebar-list">
                <li>
                    <a href="">
                        <span class="profile-img-span">
                            <img src="assets/images/user_images/<?php echo $_SESSION["user_image"]; ?>" alt="Your profile image" class="profile-img">
                        </span>
                    </a>
                </li>
                <li><a href="index.php"><?php echo ucfirst($_SESSION['user_name']); ?><span class="hover-effect"></span></a></li>
                <li><a href="change_username.php">Change Username<span class="hover-effect"></span></a></li>
                <li><a href="change_password.php">Change Password<span class="hover-effect"></span></a></li>
                <li><a href="">110 users online<span class="hover-effect"></span></a></li>
                <li><a href="logout.php">Logout<span class="hover-effect"></span></a></li>
                
            </ul>
        </section><!-- sidebar -->