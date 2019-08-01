<?php
include "../database.php";

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

    public function count($data){
        return mysqli_num_rows($data);
    }

    public function cek_akun(){
        $query = "SELECT * FROM pelanggan WHERE username='$this->username' OR email='$this->email'";
        return mysqli_query($this->conn, $query);

    }

    public function insert_data(){
        $this->status = "noactiv";
        $query = "INSERT INTO pelanggan VALUES('$this->username', '$this->nama', '$this->email', '$this->password', '$this->alamat', '$this->status')";
        return mysqli_query($this->conn, $query); 
    }

    public function aktivasi(){
        $this->status = "activ";
        $query = "UPDATE pelanggan SET status='$this->status' WHERE username='$this->username'";
        return mysqli_query($this->conn, $query);
    }
}
?>
