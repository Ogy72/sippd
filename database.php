<?php
class database{

    public $host = "localhost";
    public $uname = "root";
    public $pass = "";
    public $db = "db_ppd";
    public $connect;

    public function __construct(){
        $this->connect = mysqli_connect($this->host, $this->uname, $this->pass, $this->db);
    } 
}
?>
