<?php
include_once "database.php";
include_once "class_data_kertas.php";
include_once "class_data_kurir.php";
include_once "class_akun_pelanggan.php";

class pemesanan{

    public $kd_pesanan;
    public $jenis_doc;
    public $date;
    public $file;
    public $halaman;
    public $copy;
    public $cover;
    public $jenis_print;
    public $status_pesanan;
    public $status_pembayaran;
    public $username;
    public $kd_kertas;
    public $kd_cover;
    public $id_kurir;
    public $digunakan;
    public $cover_digunakan;
    public $conn;
    public $data_kertas;
    public $data_kurir;
    public $akun;
    public $kode;
    public $kd_bayar;
    public $payment;

    public $id_biaya_print;
    public $id_biaya_jilid;
    public $biaya_print;
    public $biaya_jilid;
    public $jarak;
    public $ongkir;
    public $sub_total;
    public $total_biaya;

    public function __construct(){
        $db = new database();
        $this->conn = $db->connect;
        $this->data_kertas = new data_kertas();
        $this->data_kurir = new data_kurir();
        $this->akun = new akun_pelanggan();
    }

    public function read_pesanan(){
        return $this->conn->query("SELECT * FROM pesanan WHERE kd_pesanan='$this->kd_pesanan' AND username='$this->username'");
    }

    public function read_order(){
        $rd = $this->conn->query("SELECT * FROM pesanan WHERE username='$this->username' AND status!='selesai' ORDER BY kd_pesanan DESC");
        return $rd->fetch_array();
    }

    public function bill_print(){
        $rd = $this->conn->query("SELECT detail_biaya.sub_biaya FROM pembayaran, detail_biaya, data_biaya WHERE pembayaran.kd_pesanan='$this->kd_pesanan' AND pembayaran.kd_bayar=detail_biaya.kd_bayar AND detail_biaya.kategori='Biaya Print'");
        return $rd->fetch_array();
    }

    public function bill_jilid(){
        $rd = $this->conn->query("SELECT detail_biaya.sub_biaya FROM pembayaran, detail_biaya, data_biaya WHERE pembayaran.kd_pesanan='$this->kd_pesanan' AND pembayaran.kd_bayar=detail_biaya.kd_bayar AND detail_biaya.kategori='Biaya Jilid'");
        return $rd->fetch_array();
    }

    public function bill(){
        $rd = $this->conn->query("SELECT * FROM pembayaran WHERE kd_pesanan='$this->kd_pesanan'");
        return $rd->fetch_array();
    }

    public function read_ongkir(){
        $rd = $this->conn->query("SELECT data_kurir.label_kurir, detail_biaya.sub_biaya FROM pembayaran, detail_biaya, data_kurir WHERE pembayaran.kd_pesanan='$this->kd_pesanan' AND pembayaran.kd_bayar=detail_biaya.kd_bayar AND detail_biaya.kategori='Biaya Ongkir' AND data_kurir.id_kurir=detail_biaya.id_biaya");
        return $rd->fetch_array();
    }

    public function read_hvs(){
        return $this->data_kertas->read_hvs();
    }

    public function read_art(){
        return $this->data_kertas->read_art();
    }

    public function cover_mika(){
        return $this->data_kertas->cover_mika();
    }

    public function cover_karton(){
        return $this->data_kertas->cover_karton();
    }

    public function hard_cover(){
        return $this->data_kertas->hard_cover();
    }

    public function cover_buku(){
        return $this->data_kertas->cover_buku();
    }

    public function read_kurir(){
        return $this->data_kurir->read_data();
    }

    public function read_akun(){
        return $this->akun->read_data();
    }

    public function auto_kd(){
        $rd = $this->conn->query("SELECT max(kd_pesanan) as kode FROM pesanan");
        $data = $rd->fetch_array();
        $data_kode = $data["kode"];

        $this->kode = (int) substr($data_kode, 3, 3);
        $this->kode++;

        $chr = "PSN";
        $kode_psn = $chr.sprintf("%03s", $this->kode);
        return $kode_psn;
    }

    public function hitung_digunakan(){
        $this->digunakan = $this->halaman*$this->copy;
        $this->cover_digunakan = $this->cover*$this->copy;
    }

    public function insert_pesanan(){
        $this->hitung_digunakan();
        $this->conn->query("INSERT INTO pesanan VALUES('$this->kd_pesanan', '$this->jenis_doc', '$this->date', '$this->file', '$this->halaman', '$this->copy', '$this->jenis_print', '$this->status_pesanan', '$this->username')");
        /* insert detail kertas */
        $this->conn->query("INSERT INTO detail_kertas VALUES('$this->kd_pesanan', '$this->kd_kertas', '$this->digunakan')");
        $this->conn->query("INSERT INTO detail_kertas VALUES('$this->kd_pesanan', '$this->kd_cover', '$this->cover_digunakan')");
    }

    public function biaya_print_berwarna(){
        $query = $this->conn->query("SELECT * FROM data_biaya WHERE label_biaya LIKE '%berwarna' AND kd_kertas='$this->kd_kertas'");
        $b = $query->fetch_array();
        $biaya = $b["biaya"];
        $this->biaya_print = $biaya*$this->digunakan;
        $this->id_biaya_print = $b["id_biaya"];
    }

    public function biaya_print_hp(){
        $query = $this->conn->query("SELECT * FROM data_biaya WHERE label_biaya LIKE '%hitam putih' AND kd_kertas='$this->kd_kertas'");
        $b = $query->fetch_array();
        $biaya = $b["biaya"];
        $this->biaya_print = $biaya*$this->digunakan;
        $this->id_biaya_print = $b["id_biaya"];
    }

    public function biaya_jilid(){
        $query = $this->conn->query("SELECT * FROM data_biaya WHERE kategori='Biaya Jilid' AND kd_kertas='$this->kd_cover'");
        $j = $query->fetch_array();
        $this->biaya_jilid = $j["biaya"]*$this->copy;
        $this->id_biaya_jilid = $j["id_biaya"];
    }

    public function hitung_jarak(){
        $this->jarak = 9;
    }

    public function hitung_ongkir(){
        $this->data_kurir->id_kurir = $this->id_kurir;
        $rd = $this->data_kurir->cek();
        if($this->jarak <= 10){
            $this->ongkir = $rd["tarif_min"];
        }
        else{
            $this->ongkir = $rd["tarif_km"]*$this->jarak;
        }
    }

    public function get_kd_bayar(){
        $this->sub_total = $this->biaya_print+$this->biaya_jilid;
        $this->total_biaya = $this->sub_total+$this->ongkir;
        $this->kode = (int) substr($this->kd_pesanan, 3, 3);
        $kode = sprintf("%03s", $this->kode);
        $this->kd_bayar = $this->total_biaya+$kode;
    }

    public function insert_pembayaran(){
        $this->conn->query("INSERT INTO pembayaran VALUES('$this->kd_bayar', '', '$this->payment', '$this->status_pembayaran', '$this->total_biaya', '$this->kd_pesanan', '$this->id_kurir')");
        /* insert detail biaya */
        $this->conn->query("INSERT INTO detail_biaya VALUES('$this->kd_bayar', '$this->id_biaya_print', 'Biaya Print', '$this->biaya_print')");
        $this->conn->query("INSERT INTO detail_biaya VALUES('$this->kd_bayar', '$this->id_biaya_jilid', 'Biaya Jilid', '$this->biaya_jilid')");
        $this->conn->query("INSERT INTO detail_biaya VALUES('$this->kd_bayar', '$this->id_kurir', 'Biaya Ongkir', '$this->ongkir')");
    }

    public function insert_payment(){
        $this->biaya_jilid();
        $this->hitung_jarak();
        $this->hitung_ongkir();
        $this->get_kd_bayar();
        $this->insert_pembayaran();
    }

    public function delete_pesanan(){
        return $this->conn->query("DELETE FROM pesanan WHERE kd_pesanan='$this->kd_pesanan'");
    }

    public function update_pembayaran(){
        $this->conn->query("UPDATE pembayaran SET metode_pembayaran='$this->payment', status='$this->status_pembayaran' WHERE kd_pesanan='$this->kd_pesanan'");
    }

    public function __destruct(){
        $this->conn->close();
    }

}
?>
