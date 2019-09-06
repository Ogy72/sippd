<?php
include_once "database.php";

class data_kertas{

    public $kd_kertas;
    public $kd_kertas2;
    public $jenis;
    public $ukuran;
    public $ketebalan;
    public $warna;
    public $jumlah;
    public $stok;
    public $new_stok;
    public $conn;

    public function __construct(){
        $db = new database();
        $this->conn = $db->connect;
    }

    public function read_data(){
        return $this->conn->query("SELECT * FROM data_kertas ORDER BY kd_kertas ASC");
    }

    public function read_hvs(){
        return $this->conn->query("SELECT DISTINCT data_kertas.kd_kertas, data_kertas.jenis, data_kertas.ukuran, data_kertas.ketebalan FROM data_kertas, data_biaya WHERE data_kertas.kd_kertas=data_biaya.kd_kertas AND data_kertas.jenis LIKE '%HVS%' AND data_kertas.stok>='10'");
    }

    public function read_art(){
        return $this->conn->query("SELECT DISTINCT data_kertas.kd_kertas, data_kertas.jenis, data_kertas.ukuran, data_kertas.ketebalan FROM data_kertas, data_biaya WHERE data_kertas.kd_kertas=data_biaya.kd_kertas AND data_kertas.jenis LIKE '%Art Paper%' AND data_kertas.stok>='10'");
    }

    public function cover_mika(){
        return $this->conn->query("SELECT DISTINCT data_kertas.kd_kertas, data_kertas.jenis, data_kertas.ukuran, data_kertas.warna FROM data_kertas, data_biaya WHERE data_kertas.kd_kertas=data_biaya.kd_kertas AND data_kertas.jenis LIKE '%Cover Mika%' AND data_kertas.stok>='2'");
    }
    
    public function cover_karton(){
        return $this->conn->query("SELECT DISTINCT data_kertas.kd_kertas, data_kertas.jenis, data_kertas.ukuran, data_kertas.warna FROM data_kertas, data_biaya WHERE data_kertas.kd_kertas=data_biaya.kd_kertas AND data_kertas.jenis LIKE '%Cover Karton%' AND data_kertas.stok>='2'");
    }

    public function hard_cover(){
        return $this->conn->query("SELECT DISTINCT data_kertas.kd_kertas, data_kertas.jenis, data_kertas.ukuran, data_kertas.warna FROM data_kertas, data_biaya WHERE data_kertas.kd_kertas=data_biaya.kd_kertas AND data_kertas.jenis LIKE '%Hard Cover%' AND data_kertas.stok>='2'");
    }
    
    public function cover_buku(){
        return $this->conn->query("SELECT DISTINCT data_kertas.kd_kertas, data_kertas.jenis, data_kertas.ukuran, data_kertas.warna FROM data_kertas, data_biaya WHERE data_kertas.kd_kertas=data_biaya.kd_kertas AND data_kertas.jenis LIKE '%Cover Buku%' AND data_kertas.stok>='2'");
    }

    public function read_kd(){
        $rd = $this->conn->query("SELECT * FROM data_kertas WHERE kd_kertas='$this->kd_kertas'");
        return $rd->fetch_array();
    }

    public function query_insert(){
        return $this->conn->query(
            "INSERT INTO data_kertas VALUES('$this->kd_kertas', '$this->jenis', '$this->ukuran', '$this->ketebalan', '$this->warna', '$this->stok')"
        );
    }

    public function insert_data(){
        if($this->jenis == "HVS"){
            $this->hitung_hvs();
            $this->query_insert();
        }
        else{
            $this->hitung_cover();
            $this->query_insert();
        }
    }

    public function hitung_hvs(){
        $this->stok = $this->jumlah*500;
    }

    public function hitung_cover(){
        $this->stok = $this->jumlah*100;
    }

    public function update_data(){
        return $this->conn->query(
            "UPDATE data_kertas SET kd_kertas='$this->kd_kertas2', jenis='$this->jenis', ukuran='$this->ukuran', ketebalan='$this->ketebalan', warna='$this->warna', stok='$this->stok' WHERE kd_kertas='$this->kd_kertas'"
        );
    }

    public function update_stok(){
        return $this->conn->query("UPDATE data_kertas SET stok='$this->new_stok' WHERE kd_kertas='$this->kd_kertas'");
    }

    public function delete_data(){
        return $this->conn->query(
            "DELETE FROM data_kertas WHERE kd_kertas='$this->kd_kertas'"
        );
    }

    public function __destruct(){
        $this->conn->close();
    }

}
?>
