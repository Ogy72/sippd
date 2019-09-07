<?php
include_once "database.php";

class laporan{

    public $tanggal_awal;
    public $tanggal_akhir;
    public $kd_kertas;
    public $laporan;
    public $conn;

    public function __construct(){
        $db = new database();
        $this->conn = $db->connect;
    }

    public function pendapatan(){
        return $this->conn->query("SELECT pesanan.*, pembayaran.total_biaya FROM pesanan, pembayaran WHERE pesanan.kd_pesanan=pembayaran.kd_pesanan AND pesanan.status!='ditolak' AND pesanan.date BETWEEN '$this->tanggal_awal' AND '$this->tanggal_akhir'");
    }

    public function total_pendapatan(){
        $rd = $this->conn->query("SELECT SUM(total_biaya) AS total FROM pembayaran WHERE tgl_bayar BETWEEN '$this->tanggal_awal' AND '$this->tanggal_akhir'");
        return $rd->fetch_array();
    }

    public function data_kertas(){
        return $this->conn->query("SELECT * FROM data_kertas");
    }

    public function hitung_terpakai(){
        $rd = $this->conn->query("SELECT SUM(digunakan) AS terpakai FROM detail_kertas WHERE kd_kertas='$this->kd_kertas'");
        return $rd->fetch_array();
    }

    public function __destruct(){
        $this->conn->close();
    }
}
?>
