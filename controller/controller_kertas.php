<?php
include_once "../model/class_data_kertas.php";
$kertas = new data_kertas();

/* proses simpan data kertas */
if(isset($_POST["simpan"])){

    $kertas->kd_kertas = $_POST["kd_kertas"];
    $kertas->jenis = $_POST["jenis"];
    $kertas->ukuran = $_POST["ukuran"];
    $kertas->ketebalan = $_POST["ketebalan"];
    $kertas->jumlah = $_POST["jumlah"];

    $rd = $kertas->read_kd();
    if($kertas->kd_kertas == $rd["kd_kertas"]){
        header("location:../view/form_kertas.php?msg=gagal");
    }
    else{
        $kertas->insert_data();
        header("location:../view/data_kertas.php");
    }
}
/* proses edit data kertas */
else if(isset($_POST["edit"])){
    
    $kertas->kd_kertas = $_POST["kd_kertas"];
    $kertas->kd_kertas2 = $_POST["kd_kertas2"];
    $kertas->jenis = $_POST["jenis"];
    $kertas->ukuran = $_POST["ukuran"];
    $kertas->ketebalan = $_POST["ketebalan"];
    $kertas->stok = $_POST["stok"];

    $kertas->update_data();
    header("location:../view/data_kertas.php");
}
/* proses hapus data kertas */
else if(isset($_GET["kd"])){

    $kertas->kd_kertas = $_GET["kd"];

    $kertas->delete_data();
    header("location:../view/data_kertas.php");
}
/* notif logika kontrol */
else{ echo "logika kontrolmu masih salah ogy..."; }
?>
