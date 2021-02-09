<?php 
include "../init.php";
$obj = new base_class;
$status = 1;
if($obj->normal_Query("SELECT user_id FROM users WHERE status = ?", [$status])){
    $row_count = $obj->count_Rows();
    echo json_encode(array("users" => $row_count));
}

?>