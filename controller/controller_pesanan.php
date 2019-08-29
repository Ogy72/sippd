<?php
include_once "../model/class_pemesanan.php";
$psn = new pemesanan();

if(isset($_POST["order"])){

    $psn->kd_pesanan = $_POST["kd_pesanan"];
    $psn->date = $_POST["date"];
    $psn->jenis_doc = $_POST["jenis_doc"];
    $psn->halaman = $_POST["halaman"];
    $psn->copy = $_POST["copy"];
    $psn->jenis_print = $_POST["jenis_print"];
    $psn->status_pesanan = "unconfirm";
    $psn->status_pembayaran = "unpayment";
    $psn->username = $_POST["username"];
    $psn->kd_kertas = $_POST["kertas"];
    $psn->kd_cover = $_POST["cover"];
    $psn->cover = 2;
    $psn->id_kurir = $_POST["kurir"];

    $allow_ext = array('doc', 'docx', 'pdf', 'odt');
    $psn->file = $_FILES['file']['name'];
    $x = explode('.', $psn->file);
    $extensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    if(in_array($extensi, $allow_ext) === true){
        move_uploaded_file($file_tmp, '../file/'.$psn->file);
        $psn->insert_pesanan();
        $psn->payment = "uncek";
        if($psn->jenis_print == "Berwarna"){
            $psn->biaya_print_berwarna();
            $psn->insert_payment();
            header("location:../view/detail_pesanan.php?order=$psn->kd_pesanan");
        }
        else{
            $psn->biaya_print_hp();
            $psn->insert_payment();
            header("location:../view/detail_pesanan.php?order=$psn->kd_pesanan");
        }
    }
    else { header('location:../halaman_pelanggan.php?msg=gagal'); }
}
else if(isset($_GET["kd"])){
    $psn->kd_pesanan = $_GET["kd"];
    $action = $_GET["action"];

    if($action == "batal"){
        $psn->delete_pesanan();
        header("location:../halaman_pelanggan.php");
    }
}
else if(isset($_POST["konfirmasi"])){
    $psn->kd_pesanan = $_POST["kd_pesanan"];
    $psn->payment = $_POST["payment"];

    if($psn->payment == "transfer"){
        $psn->status_pembayaran = "Menunggu Pembayaran";
        $psn->update_pembayaran();
        header("location:../view/pesanan_saya.php?order=$psn->kd_pesanan");
    }
    else{
        $psn->status_pembayaran = "Menunggu Konfirmasi";
        $psn->update_pembayaran();
        header("location:../view/pesanan_saya.php?order=$psn->kd_pesanan");
    }
}
else{ echo "logika Kontrol masih salah Ogy .. "; }

?>
