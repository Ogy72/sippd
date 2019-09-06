<?php
include_once "database.php";

class tracking{

    public $id = "";
    public $date_time = "NOW()";
    public $status_pengerjaan;
    public $kd_pesanan;
    public $username;
    public $conn;

    public function __construct(){
        $db = new database();
        $this->conn = $db->connect;
    }

    public function insert_tracking(){
        $this->conn->query("INSERT INTO tracking Values('$this->id', $this->date_time, '$this->status_pengerjaan', '$this->kd_pesanan', '$this->username')");
    }

    public function read_data(){
        return $this->conn->query("SELECT pesanan.*, pelanggan.* FROM pesanan, pelanggan WHERE pesanan.username=pelanggan.username AND pesanan.status!='ditolak'");
    }
    
    public function search_read(){
        return $this->conn->query("SELECT tracking.*, pesanan.*, pelanggan.* FROM tracking, pesanan, pelanggan WHERE tracking.kd_pesanan=pesanan.kd_pesanan AND pesanan.username=pelanggan.username AND tracking.kd_pesanan='$this->kd_pesanan'");
    }

    public function read_tracking(){
        return $this->conn->query("SELECT tracking.*, user.nama FROM tracking, user WHERE tracking.username=user.username AND kd_pesanan='$this->kd_pesanan'");
    }

    public function detail_tracking(){
        return $this->conn->query("SELECT * FROM tracking WHERE kd_pesanan='$this->kd_pesanan' AND username='$this->username' ORDER BY date_time DESC");
    }

    public function hapus_tracking(){
        return $this->conn->query("DELETE FROM tracking WHERE id='$this->id'");
    }

    public function __destruct(){
        $this->conn->close();
    }
}
?>
