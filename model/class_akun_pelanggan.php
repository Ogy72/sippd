<?php
include_once "database.php";

class akun_pelanggan{

    public $nama;
    public $username;
    public $username2;
    public $email;
    public $password;
    public $password1;
    public $alamat;
    public $status;
    public $conn;

    public function __construct(){
        $db = new database();
        $this->conn = $db->connect;
    }

    public function read_data(){
        $rd = $this->conn->query("SELECT * FROM pelanggan WHERE username='$this->username'");
        return $rd->fetch_array();
    }

    public function cek_username(){
        $rd = $this->conn->query("SELECT * FROM pelanggan WHERE username='$this->username2'");
        return $rd->num_rows;
    }

    public function cek_email(){
        $rd = $this->conn->query("SELECT * FROM pelanggan WHERE email='$this->email'");
        return $rd->num_rows;
    }

    public function cek_password(){
        $rd = $this->conn->query("SELECT * FROM pelanggan WHERE username='$this->username' AND password='$this->password'");
        return $rd->num_rows;
    }

    public function update_nama(){
        return $this->conn->query("UPDATE pelanggan SET nama='$this->nama' WHERE username='$this->username'");
    }

    public function update_username(){
        return $this->conn->query("UPDATE pelanggan SET username='$this->username2' WHERE username='$this->username'");
    }

    public function update_email(){
        return $this->conn->query("UPDATE pelanggan SET email='$this->email' WHERE username='$this->username'");
    }

    public function update_password(){
        return $this->conn->query("UPDATE pelanggan SET password='$this->password1' WHERE username='$this->username'");
    }

    public function update_alamat(){
        return $this->conn->query("UPDATE pelanggan SET alamat='$this->alamat' WHERE username='$this->username'");
    }

    public function __destruct(){
        $this->conn->close();
    }

}
?>
