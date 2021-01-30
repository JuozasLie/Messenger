<?php 
    class db {
        private $host     = "localhost";
        private $dbname   = "messenger";
        private $username = "root";
        private $password = "";
        protected $con;

        public function __construct()
        {
            try {
                // new PDO("mysql:host=Localhost;dbname=messenger","root","")
                $this->con = new PDO("mysql:host={$this->host};dbname={$this->dbname}",$this->username,$this->password);
            } 
            catch(Exception $e){
                die("Connection error" . " " . $e->getMessage());
            }
        }
    }


?>
