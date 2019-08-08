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

    public function __construct(){
        $db = new database();
        $this->conn = $db->connect;
    }

    public function insert_informasi(){
        return $this->conn->query("INSERT INTO informasi VALUES('$this->id', '$this->kategori', '$this->judul', '$this->konten', '$this->tgl_post', '$this->img')");
    }

    public function read_list(){
        return $this->conn->query("SELECT * FROM informasi ORDER by id DESC");
    }

    public function read_informasi1(){
        $rd = $this->conn->query("SELECT * FROM informasi WHERE kategori='informasi' ORDER BY id DESC LIMIT 0,1");
        return $rd->fetch_array();
    }

    public function read_informasi2(){
        $rd = $this->conn->query("SELECT * FROM informasi WHERE kategori='informasi' ORDER BY id DESC LIMIT 1,1");
        return $rd->fetch_array();
    }
    
    public function read_informasi3(){
        $rd = $this->conn->query("SELECT * FROM informasi WHERE kategori='informasi' ORDER BY id DESC LIMIT 2,1");
        return $rd->fetch_array();
    }
    
    public function read_promo(){
        return $this->conn->query("SELECT * FROM informasi WHERE kategori='promo'");
    }

    public function delete_informasi(){
        return $this->conn->query("DELETE FROM informasi WHERE id='$this->id'");
    }
    
    public function read_edit(){
        $rd = $this->conn->query("SELECT * FROM informasi WHERE id='$this->id'");
        return $rd->fetch_array();
    }

    public function update_notimg(){
        return $this->conn->query("UPDATE informasi set kategori='$this->kategori', judul='$this->judul', kontent='$this->konten', tgl_post='$this->tgl_post' WHERE id='$this->id'");
    }

    public function update_informasi(){
        return $this->conn->query("UPDATE informasi set kategori='$this->kategori', judul='$this->judul', kontent='$this->konten', tgl_post='$this->tgl_post', img='$this->img' WHERE id='$this->id'");
    }



}
?>
