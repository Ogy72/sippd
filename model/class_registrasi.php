<?php
include "database.php";

class registrasi{

    public $nama;
    public $username;
    public $email;
    public $alamat;
    public $password;
    public $status;
    public $conn;

    public function __construct(){
        $db = new database();
        $this->conn = $db->connect;
    }

    public function fetch($data){
        return mysqli_fetch_array($data);
    }

    public function count($data){
        return mysqli_num_rows($data);
    }

    public function cek_akun(){
       return $this->conn->query("SELECT * FROM pelanggan WHERE username='$this->username' OR email='$this->email'");
    }

    public function read_data(){
       return $this->conn->query("SELECT * FROM pelanggan WHERE username='$this->username'");
    }

    public function insert_data(){
        $this->status = "noactiv";
        return $this->conn->query("INSERT INTO pelanggan VALUES('$this->username', '$this->nama', '$this->email', '$this->password', '$this->alamat', '$this->status')");
    }

    public function aktivasi(){
        $this->status = "activ";
        return $this->conn->query("UPDATE pelanggan SET status='$this->status' WHERE username='$this->username'");
    }

    public function __destruct(){
        $this->conn->close();
    }
}
?>
