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
        if($psn->msg == "unstok"){
            header("location:../halaman_pelanggan.php?msg=unstok");
        }
        else{
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
    else { echo "Logika Salah"; }
}
else if(isset($_POST["konfirmasi"])){
    $psn->kd_pesanan = $_POST["kd_pesanan"];
    $psn->payment = $_POST["payment"];

    if($psn->payment == "transfer"){
        $psn->status_pembayaran = "Menunggu Pembayaran";
        $psn->update_pembayaran();
        header("location:../view/detail_pesanan_saya.php?kd_pesanan=$psn->kd_pesanan");
    }
    else{
        $psn->status_pembayaran = "Menunggu Konfirmasi";
        $psn->update_pembayaran();
        header("location:../view/detail_pesanan_saya.php?kd_pesanan=$psn->kd_pesanan");
    }
}
else if(isset($_POST["konfirmasi_pesanan"])){
    $psn->kd_pesanan = $_POST["kd_pesanan"];
    $psn->username = $_POST["username_pelanggan"];
    $psn->kd_bayar = $_POST["kd_bayar"];
    $psn->tgl_bayar = $_POST["tgl_bayar"];
    $psn->tracking->username = $_POST["username_karyawan"];
    $psn->tracking->status_pengerjaan = "Pesanan Telah Dikonfirmasi";

    $psn->pesanan_dikonfirmasi();
    
    header("location:../view/pesanan_pelanggan.php?kd_pesanan=$psn->kd_pesanan&username=$psn->username&dikonfirmasi");
}
else if(isset($_POST["tolak_pesanan"])){
        $psn->kd_pesanan = $_POST["kd_pesanan"];

        $psn->tolak_pesanan();
        header("location:../halaman_karyawan.php");
}
else if(isset($_GET["get_file"])){
    
    $filename = $_GET["get_file"];
    $directory = "../file/";
    $file = $directory.$filename;
    if(file_exists($file)){
        header("Content-Description: File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition: attachment; filename=".basename($file));
        header("Content-Transfer-Encoding: binary");
        header("Expires: 0");
        header("Cache-Control: private");
        header("Pragma: private");
        header("Content-Length:".filesize($file));
        ob_clean();
        flush();
        readfile($file);

        exit;
    }
    else {
        echo "Ops..! $filename - Not Found...";
    }
}
else{ echo "logika Kontrol masih salah Ogy .. "; }

?>
