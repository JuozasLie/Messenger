<?php 

class base_class extends db {
    private $query;
    public function normal_Query($query, $param = null){
        if(is_null($param)){
            $this->query = $this->con->prepare($query);
            return $this->query->execute();
        } else {
            $this->query = $this->con->prepare($query);
            return $this->query->execute($param);
        }
    }
    public function count_Rows(){
        return $this->query->rowCount();
    }
    public function fetch_all(){
        return $this->query->fetchAll(PDO::FETCH_OBJ);
    }
    public function security($data){
        return trim(strip_tags($data));
    }
    public function create_Session($session_name,$session_value){
        $_SESSION["$session_name"] = $session_value;
    }
    public function single_Result(){
        return $this->query->fetch(PDO::FETCH_OBJ);
    }
}


?>