<?php 
include "../init.php";
$obj = new base_class;
if(isset($_FILES['send_file']['name'])){
    $file_name = $obj->security($_FILES['send_file']['name']);
    $file_tmp_name = $_FILES['send_file']['tmp_name'];
    $file_path = "../assets/uploaded_files/";
    $extensions = ["jpg", "JPG", "jpeg", "png", "pdf", "zip", "docx", "xlsx"];
    $file_extension = explode(".", $file_name);
    $get_file_extension = end($file_extension);
    if(!in_array($get_file_extension, $extensions)){
        echo "error";
    } else {
        move_uploaded_file($file_tmp_name, "$file_path/$file_name");
        $user_id = $_SESSION["user_id"];
        if($obj->normal_Query("INSERT INTO messages (msg_content, msg_type, user_id) VALUES (?, ?, ?)", [$file_name, $get_file_extension, $user_id])){
            echo "success";
        }
    }
}
?>