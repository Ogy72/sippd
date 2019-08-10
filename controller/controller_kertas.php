<?php
include_once "../model/class_data_kertas.php";
$kertas = new data_kertas();

if(isset($_POST["simpan"])){

    $kertas->kd_kertas = $_POST["kd_kertas"];
    $kertas->jenis = $_POST["jenis"];
    $kertas->ukuran = $_POST["ukuran"];
    $kertas->ketebalan = $_POST["ketebalan"];
    $kertas->jumlah = $_POST["jumlah"];

    $kertas->insert_data();
    header("location:../view/data_kertas.php");
}
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
else if(isset($_GET["kd"])){

    $kertas->kd_kertas = $_GET["kd"];

    $kertas->delete_data();
    header("location:../view/data_kertas.php");
}
else{ echo "logika kontrolmu masih salah ogy..."; }
?>
