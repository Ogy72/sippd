<?php
include_once "database.php";

class data_biaya{

    public $kd_biaya;
    public $kd_biaya2;
    public $label_biaya;
    public $kategori;
    public $biaya;
    public $conn;

    public function __construct(){
        $db = new database();
        $this->conn = $db->connect;
    }

    public function read_data(){
        return $this->conn->query(
            "SELECT * FROM data_biaya ORDER BY kd_biaya ASC"
        );
    }

    public function read_kd(){
        $rd = $this->conn->query("SELECT * FROM data_biaya WHERE kd_biaya='$this->kd_biaya'");
        return $rd->fetch_array();
    }

    public function insert_data(){
        return $this->conn->query(
            "INSERT INTO data_biaya VALUES('$this->kd_biaya', '$this->label_biaya', '$this->kategori', '$this->biaya')"
        );
    }

    public function update_data(){
        return $this->conn->query(
            "UPDATE data_biaya SET kd_biaya='$this->kd_biaya2', label_biaya='$this->label_biaya', kategori='$this->kategori', biaya='$this->biaya' WHERE kd_biaya='$this->kd_biaya'"
        );
    }

    public function delete_data(){
        return $this->conn->query("DELETE FROM data_biaya WHERE kd_biaya='$this->kd_biaya'");
    }

    public function __destruct(){
        $this->conn->close();
    }

}
?>
