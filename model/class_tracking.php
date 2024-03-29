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
        return $this->conn->query("SELECT pesanan.*, pelanggan.* FROM pesanan, pelanggan WHERE pesanan.username=pelanggan.username AND pesanan.status!='ditolak' AND pesanan.status!='selesai'");
    }
    
    public function search_read(){
        return $this->conn->query("SELECT pesanan.*, pelanggan.* FROM pesanan, pelanggan WHERE pesanan.username=pelanggan.username AND pesanan.status!='ditolak' AND pesanan.kd_pesanan='$this->kd_pesanan'");
    }

    public function read_tracking(){
        return $this->conn->query("SELECT tracking.*, user.nama FROM tracking, user WHERE tracking.username=user.username AND kd_pesanan='$this->kd_pesanan'");
    }

    public function read_status(){
        return $this->conn->query("SELECT * FROM tracking WHERE kd_pesanan='$this->kd_pesanan' ORDER BY date_time DESC LIMIT 1");
    }

    public function detail_tracking(){
        return $this->conn->query("SELECT * FROM tracking WHERE kd_pesanan='$this->kd_pesanan' AND username='$this->username' ORDER BY date_time DESC");
    }

    public function hapus_tracking(){
        return $this->conn->query("DELETE FROM tracking WHERE id='$this->id'");
    }

    public function update_pesanan(){
        return $this->conn->query("UPDATE pesanan SET status='selesai' WHERE kd_pesanan='$this->kd_pesanan'");
    }

    public function __destruct(){
        $this->conn->close();
    }
}
?>
