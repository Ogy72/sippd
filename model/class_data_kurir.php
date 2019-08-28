<?php
include_once "database.php";

class data_kurir{

    public $id_kurir;
    public $label_kurir;
    public $tarif_minimum;
    public $tarif_km;
    public $conn;

    public function __construct(){
        $db = new database();
        $this->conn = $db->connect;
    }

    public function read_data(){
        return $this->conn->query("SELECT * FROM data_kurir ORDER BY label_kurir ASC");
    }

    public function cek(){
        $rd = $this->conn->query("SELECT * FROM data_kurir WHERE id_kurir='$this->id_kurir'");
        return $rd->fetch_array();
    }

    public function insert(){
        return $this->conn->query(
            "INSERT INTO data_kurir VAlUES('', '$this->label_kurir', '$this->tarif_minimum', '$this->tarif_km')"
        );
    }

    public function read_bykd(){
        $rd = $this->conn->query("SELECT * FROM data_kurir WHERE id_kurir='$this->id_kurir'");
        return $rd->fetch_array();
    }

    public function update(){
        return $this->conn->query(
            "UPDATE data_kurir SET label_kurir='$this->label_kurir', tarif_min='$this->tarif_minimum', tarif_km='$this->tarif_km' WHERE id_kurir='$this->id_kurir'"
        );
    }

    public function delete(){
        return $this->conn->query("DELETE FROM data_kurir WHERE id_kurir='$this->id_kurir'");
    }

    public function __destruct(){
        $this->conn->close();
    }

}
?>
