<?php
include_once "database.php";

class login{

    public $username;
    public $email;
    public $password;
    public $level;
    public $akun;
    public $data;
    public $conn;

    public function __construct(){
        $db = new database();
        $this->conn = $db->connect;
    }

    public function read_data_pelanggan(){
        return $this->conn->query("SELECT * FROM pelanggan WHERE (username='$this->username' OR email='$this->email') AND password='$this->password'");
    }

    public function read_data_user(){
        return $this->conn->query("SELECT * FROM user WHERE username='$this->username' AND password='$this->password'");
    }

    public function validasi_pelanggan(){
        $rd = $this->read_data_pelanggan();
        $cek = $rd->fetch_array();

        if($cek['status'] == 'activ'){
            return $this->akun = 'valid';
        }
        else if(empty($cek['status'])){
            return $this->akun = 'nopelanggan'; 
        }
        else { return $this->akun = 'noactiv'; }
    }

    public function validasi_user(){
        $this->data = $this->read_data_user();
        return $this->data->num_rows;
    }

    public function __destruct(){
        $this->conn->close();
    }

}
?>
