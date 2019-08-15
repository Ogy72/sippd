<?php
include_once "database.php";

class data_user{

    public $username;
    public $username2;
    public $nama;
    public $password;
    public $level;
    public $conn;

    public function __construct(){
        $db = new database();
        $this->conn = $db->connect;
    }

    public function read_data(){
        return $this->conn->query("SELECT * FROM user ORDER BY username ASC");
    }

    public function cek(){
        $rd = $this->conn->query("SELECT * FROM user WHERE username='$this->username'");
        return $rd->fetch_array();
    }

    public function insert(){
        return $this->conn->query("INSERT INTO user VALUES('$this->username', '$this->nama', '$this->password', '$this->level')");
    }

    public function read_bykd(){
        $rd = $this->conn->query("SELECT * FROM user WHERE username='$this->username'");
        return $rd->fetch_array();
    }

    public function update(){
        return $this->conn->query("UPDATE user SET username='$this->username2', nama='$this->nama', password='$this->password', level='$this->level' WHERE username='$this->username'");
    }

    public function delete(){
        return $this->conn->query("DELETE FROM user WHERE username='$this->username'");
    }

    public function __destruct(){
        $this->conn->close();
    }
}
?>
