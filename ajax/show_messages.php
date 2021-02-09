<?php
include "../init.php"; 
$obj = new base_class;
if(isset($_GET["message"])){
    $user_id = $_SESSION["user_id"];
    if($obj->normal_Query("SELECT clean_message_id FROM clean WHERE clean_user_id = ?", [$user_id])){
        $last_msg_row = $obj->single_Result();
        $last_msg_id = $last_msg_row->clean_message_id;

        $obj->normal_Query("SELECT msg_id FROM messages ORDER BY msg_id DESC LIMIT 1");
        $msg_row = $obj->single_Result();
        $msg_newest_id = $msg_row->msg_id;

        $obj->normal_Query("SELECT * FROM messages INNER JOIN users ON messages.user_id = users.user_id WHERE messages.msg_id BETWEEN $last_msg_id AND $msg_newest_id ORDER BY messages.msg_id ASC");
        if($obj->count_Rows() == 0){
            echo "<p class='empty_msg'>Send a message to start the conversation!</p>";
        } else {
            $messages = $obj->fetch_all();
            foreach($messages as $information):
                $username = ucwords($information->user_name);
                $user_email = $information->user_email;
                $user_image = $information->image;
                $user_status = $information->status;
                $message = $information->msg_content;
                $msg_type = $information->msg_type;
                $msg_user_id = $information->user_id;
                $msg_time = $information->msg_time;
                if($user_status == 0){
                    $user_online_status = "<span class='offline-icon'></span>";
                } else {
                    $user_online_status = "<span class='online-icon'></span>";
                }
                if($msg_user_id == $user_id){
                    //right messages
                    if($msg_type == "text"){
                        echo '<div class="right-message common-msg-margin">
                            <div class="right-msg-area">
                                <span class="date-time right-time">
                                <span class="send-msg">&#10004;</span>'.time_ago($msg_time).'
                                </span> <!-- date time -->
                                <div class="right-msg">
                                '.$message.'
                                </div><!-- right msg -->
                            </div><!--right msg area -->
                        </div><!-- right-message --> ';
                    } else if($msg_type == "jpg" || $msg_type == "JPG" || $msg_type == "JPEG" || $msg_type == "jpeg"){
                        echo '<div class="right-message common-msg-margin">
                        <div class="right-msg-area">
                            <span class="date-time right-time right-message-time">
                            <span class="send-msg">&#10004;</span>'.time_ago($msg_time).'
                            </span> <!-- date time -->
                            <div class="right-files">
                                <img src="assets/uploaded_files/'.$message.'" class="common-images">
                            </div><!-- right-files -->
                        </div><!--right msg area -->
                    </div><!-- right-message --> ';

                    } else if($msg_type == "PNG" || $msg_type == "png"){
                        echo '<div class="right-message common-msg-margin">
                        <div class="right-msg-area">
                            <span class="date-time right-time right-message-time">
                            <span class="send-msg">&#10004;</span>'.time_ago($msg_time).'
                            </span> <!-- date time -->
                            <div class="right-files">
                                <img src="assets/uploaded_files/'.$message.'" class="common-images">
                            </div><!-- right-files -->
                        </div><!--right msg area -->
                    </div><!-- right-message --> ';
                    } else if($msg_type == "zip" || $msg_type == "ZIP"){
                        echo '<div class="right-message common-msg-margin">
                        <div class="right-msg-area">
                            <span class="date-time right-time right-message-time">
                            <span class="send-msg">&#10004;</span>'.time_ago($msg_time).'
                            </span> <!-- date time -->
                            <div class="right-files">
                                <a href="assets/uploaded_files/'.$message.'" class="all-files"><i class="fas fa-arrow-circle-down files-common-icon"></i>'.$message.'</a>
                            </div><!-- right-files -->
                        </div><!--right msg area -->
                    </div><!-- right-message --> ';
                    } else if($msg_type == "PDF" || $msg_type == "pdf"){
                        echo '<div class="right-message common-msg-margin">
                        <div class="right-msg-area">
                            <span class="date-time right-time right-message-time">
                            <span class="send-msg">&#10004;</span>'.time_ago($msg_time).'
                            </span> <!-- date time -->
                            <div class="right-files">
                                <a href="assets/uploaded_files/'.$message.'" class="all-files" target="_blank"><i class="far fa-file-pdf files-common-icon pdf"></i>'.$message.'</a>
                            </div><!-- right-files -->
                        </div><!--right msg area -->
                    </div><!-- right-message --> ';
                    } else if($msg_type == "emoji"){
                        echo '<div class="right-message common-msg-margin">
                        <div class="right-msg-area">
                            <span class="date-time right-time right-message-time">
                            <span class="send-msg">&#10004;</span>'.time_ago($msg_time).'
                            </span> <!-- date time -->
                            <div class="right-files">
                                <img src="'.$message.'" class="animated-emoji">
                            </div><!-- right-files -->
                        </div><!--right msg area -->
                    </div><!-- right-message --> ';
                    } else if($msg_type == "docx"){
                        echo '<div class="right-message common-msg-margin">
                        <div class="right-msg-area">
                            <span class="date-time right-time right-message-time">
                            <span class="send-msg">&#10004;</span>'.time_ago($msg_time).'
                            </span> <!-- date time -->
                            <div class="right-files">
                                <a href="assets/uploaded_files/'.$message.'" class="all-files"><i class="far fa-file-word files-common-icon word"></i>'.$message.'</a>
                            </div><!-- right-files -->
                        </div><!--right msg area -->
                    </div><!-- right-message --> ';
                    } else if($msg_type == "xlsx"){
                        echo '<div class="right-message common-msg-margin">
                        <div class="right-msg-area">
                            <span class="date-time right-time right-message-time">
                            <span class="send-msg">&#10004;</span>'.time_ago($msg_time).'
                            </span> <!-- date time -->
                            <div class="right-files">
                                <a href="assets/uploaded_files/'.$message.'" class="all-files"><i class="far fa-file-excel files-common-icon excel"></i>'.$message.'</a>
                            </div><!-- right-files -->
                        </div><!--right msg area -->
                    </div><!-- right-message --> ';
                    }
                } else {
                    //left messages
                    if($msg_type == "text"){
                        echo 
                        '<div class="left-message common-msg-margin">
                            <div class="sender-img-block">
                                <img src="assets/images/user_images/'.$user_email.'/'.$user_image.'" alt="profile image" class="sender-img">
                                '.$user_online_status.'
                            </div> <!-- sender img block -->
                            <div class="left-msg-area">
                                <div class="sender-name-date">
                                    <span class="sender-name">
                                        '.$username.'
                                    </span> <!-- sender name -->
                                    <span class="date-time">
                                    '.time_ago($msg_time).'
                                    </span> <!-- date time -->
                                </div> <!-- sender name date -->
                                <div class="left-msg">
                                    <p>'.$message.'</p>
                                </div> <!-- left msg -->
                            </div> <!-- left msg area -->
                        </div> <!-- left message -->';
                    } else if($msg_type == "jpg" || $msg_type == "JPG" || $msg_type == "JPEG" || $msg_type == "jpeg"){
                        echo 
                        '<div class="left-message common-msg-margin">
                            <div class="sender-img-block">
                                <img src="assets/images/user_images/'.$user_email.'/'.$user_image.'" alt="profile image" class="sender-img">
                                '.$user_online_status.'
                            </div> <!-- sender img block -->
                            <div class="left-msg-area">
                                <div class="sender-name-date">
                                    <span class="sender-name">
                                        '.$username.'
                                    </span> <!-- sender name -->
                                    <span class="date-time">
                                    '.time_ago($msg_time).'
                                    </span> <!-- date time -->
                                </div> <!-- sender name date -->
                                <div class="left-files">
                                    <img src="assets/uploaded_files/'.$message.'" class="common-images">
                                </div> <!-- left-files -->
                            </div> <!-- left msg area -->
                        </div> <!-- left message -->';
                    } else if($msg_type == "PNG" || $msg_type == "png"){
                        echo 
                        '<div class="left-message common-msg-margin">
                            <div class="sender-img-block">
                                <img src="assets/images/user_images/'.$user_email.'/'.$user_image.'" alt="profile image" class="sender-img">
                                '.$user_online_status.'
                            </div> <!-- sender img block -->
                            <div class="left-msg-area">
                                <div class="sender-name-date">
                                    <span class="sender-name">
                                        '.$username.'
                                    </span> <!-- sender name -->
                                    <span class="date-time">
                                    '.time_ago($msg_time).'
                                    </span> <!-- date time -->
                                </div> <!-- sender name date -->
                                <div class="left-files">
                                    <img src="assets/uploaded_files/'.$message.'" class="common-images">
                                </div> <!-- left-files -->
                            </div> <!-- left msg area -->
                        </div> <!-- left message -->';
                    } else if($msg_type == "zip" || $msg_type == "ZIP"){
                        echo 
                        '<div class="left-message common-msg-margin">
                            <div class="sender-img-block">
                                <img src="assets/images/user_images/'.$user_email.'/'.$user_image.'" alt="profile image" class="sender-img">
                                '.$user_online_status.'
                            </div> <!-- sender img block -->
                            <div class="left-msg-area">
                                <div class="sender-name-date">
                                    <span class="sender-name">
                                        '.$username.'
                                    </span> <!-- sender name -->
                                    <span class="date-time">
                                    '.time_ago($msg_time).'
                                    </span> <!-- date time -->
                                </div> <!-- sender name date -->
                                <div class="left-files">
                                <a href="assets/uploaded_files/'.$message.'" class="all-files"><i class="fas fa-arrow-circle-down files-common-icon"></i>'.$message.'</a>
                                </div> <!-- left-files -->
                            </div> <!-- left msg area -->
                        </div> <!-- left message -->';
                    } else if($msg_type == "PDF" || $msg_type == "pdf"){
                        echo 
                        '<div class="left-message common-msg-margin">
                            <div class="sender-img-block">
                                <img src="assets/images/user_images/'.$user_email.'/'.$user_image.'" alt="profile image" class="sender-img">
                                '.$user_online_status.'
                            </div> <!-- sender img block -->
                            <div class="left-msg-area">
                                <div class="sender-name-date">
                                    <span class="sender-name">
                                        '.$username.'
                                    </span> <!-- sender name -->
                                    <span class="date-time">
                                    '.time_ago($msg_time).'
                                    </span> <!-- date time -->
                                </div> <!-- sender name date -->
                                <div class="left-files">
                                <a href="assets/uploaded_files/'.$message.'" class="all-files" target="_blank"><i class="far fa-file-pdf files-common-icon pdf"></i>'.$message.'</a>
                                </div> <!-- left-files -->
                            </div> <!-- left msg area -->
                        </div> <!-- left message -->';
                    } else if($msg_type == "emoji"){
                        echo 
                        '<div class="left-message common-msg-margin">
                            <div class="sender-img-block">
                                <img src="assets/images/user_images/'.$user_email.'/'.$user_image.'" alt="profile image" class="sender-img">
                                '.$user_online_status.'
                            </div> <!-- sender img block -->
                            <div class="left-msg-area">
                                <div class="sender-name-date">
                                    <span class="sender-name">
                                        '.$username.'
                                    </span> <!-- sender name -->
                                    <span class="date-time">
                                    '.time_ago($msg_time).'
                                    </span> <!-- date time -->
                                </div> <!-- sender name date -->
                                <div class="left-files">
                                <img src="'.$message.'" class="animated-emoji">
                                </div> <!-- left-files -->
                            </div> <!-- left msg area -->
                        </div> <!-- left message -->';
                    } else if($msg_type == "docx"){
                        echo 
                        '<div class="left-message common-msg-margin">
                            <div class="sender-img-block">
                                <img src="assets/images/user_images/'.$user_email.'/'.$user_image.'" alt="profile image" class="sender-img">
                                '.$user_online_status.'
                            </div> <!-- sender img block -->
                            <div class="left-msg-area">
                                <div class="sender-name-date">
                                    <span class="sender-name">
                                        '.$username.'
                                    </span> <!-- sender name -->
                                    <span class="date-time">
                                    '.time_ago($msg_time).'
                                    </span> <!-- date time -->
                                </div> <!-- sender name date -->
                                <div class="left-files">
                                <a href="assets/uploaded_files/'.$message.'" class="all-files"><i class="far fa-file-word files-common-icon word"></i>'.$message.'</a>
                                </div> <!-- left-files -->
                            </div> <!-- left msg area -->
                        </div> <!-- left message -->';
                    } else if($msg_type == "xlsx"){
                        echo 
                        '<div class="left-message common-msg-margin">
                            <div class="sender-img-block">
                                <img src="assets/images/user_images/'.$user_email.'/'.$user_image.'" alt="profile image" class="sender-img">
                                '.$user_online_status.'
                            </div> <!-- sender img block -->
                            <div class="left-msg-area">
                                <div class="sender-name-date">
                                    <span class="sender-name">
                                        '.$username.'
                                    </span> <!-- sender name -->
                                    <span class="date-time">
                                    '.time_ago($msg_time).'
                                    </span> <!-- date time -->
                                </div> <!-- sender name date -->
                                <div class="left-files">
                                <a href="assets/uploaded_files/'.$message.'" class="all-files"><i class="far fa-file-excel files-common-icon excel"></i>'.$message.'</a>
                                </div> <!-- left-files -->
                            </div> <!-- left msg area -->
                        </div> <!-- left message -->';
                    }
                }
            endforeach;
        }
    }
}
?>