<?php
include_once "../model/class_tracking.php";
$track = new tracking();

if(isset($_POST["input"])){
    $track->status_pengerjaan = $_POST["status_pengerjaan"];
    $track->kd_pesanan = $_POST["kd_pesanan"];
    $track->username = $_POST["username"];

    $track->insert_tracking();
    header("location:../view/form_tracking.php?kd_pesanan=$track->kd_pesanan");
}
else if(isset($_GET["hapus"])){
    $track->id = $_GET["id"];
    $kd_pesanan = $_GET["kd"];

    $track->hapus_tracking();
    header("location:../view/form_tracking.php?kd_pesanan=$kd_pesanan");
}
else{ echo"logika kontrol salah ogy.."; }
?>
