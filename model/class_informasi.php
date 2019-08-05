<?php 
include_once "database.php";

class informasi{

    public $id = "";
    public $kategori;
    public $judul;
    public $konten;
    public $tgl_post;
    public $img;
    public $conn;

    public function __construct{
        $db = new database();
        $this->conn = $db->connect;
    }

    public function insert_informasi{
        return $this->conn->query("INSERT INTO informasi VALUES('$this->id', '$this->kategori', '$this->judul', '$this->konten', '$this->tgl_post', '$this->img')");
    }

    public function read_informasi{
        $rd = $this->conn->query("SELECT * FROM informasi");
        return $rd->fetch_array();
    }

    public function read_by_judul{
        $rd = $this->conn->query("SELECT * FROM informasi WHERE judul='$this->judul'");
        return $rd->fetch_array();
    }


}
?>
