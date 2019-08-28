<?php
include_once "database.php";

class data_biaya{

    public $id_biaya;
    public $kd_kertas;
    public $label_biaya;
    public $kategori;
    public $biaya;
    public $conn;

    public function __construct(){
        $db = new database();
        $this->conn = $db->connect;
    }

    public function read_data(){
        return $this->conn->query("SELECT data_biaya.*, data_kertas.* FROM data_biaya, data_kertas WHERE data_biaya.kd_kertas=data_kertas.kd_kertas ORDER BY label_biaya ASC");
    }

    public function read_kd(){
        $rd = $this->conn->query("SELECT data_biaya.*, data_kertas.* FROM data_biaya, data_kertas WHERE data_biaya.kd_kertas=data_kertas.kd_kertas AND id_biaya='$this->id_biaya'");
        return $rd->fetch_array();
    }

    public function read_kertas(){
        return $this->conn->query("SELECT * FROM data_kertas");
    }

    public function read_kertas2(){
        return $this->conn->query("SELECT * FROM data_kertas WHERE kd_kertas!='$this->kd_kertas'");
    }

    public function insert_data(){
        return $this->conn->query(
            "INSERT INTO data_biaya VALUES('', '$this->label_biaya', '$this->kategori', '$this->biaya', '$this->kd_kertas')"
        );
    }

    public function update_data(){
        return $this->conn->query(
            "UPDATE data_biaya SET label_biaya='$this->label_biaya', kategori='$this->kategori', biaya='$this->biaya', kd_kertas='$this->kd_kertas' WHERE id_biaya='$this->id_biaya'"
        );
    }

    public function delete_data(){
        return $this->conn->query("DELETE FROM data_biaya WHERE id_biaya='$this->id_biaya'");
    }

    public function __destruct(){
        $this->conn->close();
    }

}
?>
