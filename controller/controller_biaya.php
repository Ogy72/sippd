<?php 
include_once "../model/class_data_biaya.php";
$biaya = new data_biaya();

/* proses insert data */
if(isset($_POST["simpan"])){

    $biaya->kd_biaya = $_POST["kd_biaya"];
    $biaya->label_biaya = $_POST["label_biaya"];
    $biaya->kategori = $_POST["kategori"];
    $biaya->biaya = $_POST["biaya"];

    $d = $biaya->read_kd();
    if($d["kd_biaya"] == $biaya->kd_biaya){
        header("location:../view/form_biaya.php?msg=gagal");
    }
    else{
        $biaya->insert_data();
        header("location:../view/data_biaya.php");
    }
}
/* proses edit data */
else if(isset($_POST["edit"])){

    $biaya->kd_biaya = $_POST["kd_biaya"];
    $biaya->kd_biaya2 = $_POST["kd_biaya2"];
    $biaya->label_biaya = $_POST["label_biaya"];
    $biaya->kategori = $_POST["kategori"];
    $biaya->biaya = $_POST["biaya"];

    $biaya->update_data();
    header("location:../view/data_biaya.php");
}
/* proses hapus data */
else if(isset($_GET["kd"])){

    $biaya->kd_biaya = $_GET["kd"];
    $biaya->delete_data();
    header("location:../view/data_biaya.php");
}
/* notif kontrol logika */
else {
    echo "kontrol logika yang kamu buat masih salag ogy";
}
?>
