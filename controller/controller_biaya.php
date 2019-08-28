<?php 
include_once "../model/class_data_biaya.php";
$biaya = new data_biaya();

/* proses insert data */
if(isset($_POST["simpan"])){

    $biaya->label_biaya = $_POST["label_biaya"];
    $biaya->kategori = $_POST["kategori"];
    $biaya->kd_kertas = $_POST["kertas"];
    $biaya->biaya = $_POST["biaya"];

    $d = $biaya->read_kd();
    if($d["label_biaya"] == $biaya->label_biaya){
        header("location:../view/form_biaya.php?msg=gagal");
    }
    else{
        $biaya->insert_data();
        header("location:../view/data_biaya.php");
    }
}
/* proses edit data */
else if(isset($_POST["edit"])){

    $biaya->id_biaya = $_POST["id_biaya"];
    $biaya->label_biaya = $_POST["label_biaya"];
    $biaya->kategori = $_POST["kategori"];
    $biaya->kd_kertas = $_POST["kertas"];
    $biaya->biaya = $_POST["biaya"];

    $biaya->update_data();
    header("location:../view/data_biaya.php");
}
/* proses hapus data */
else if(isset($_GET["kd"])){

    $biaya->id_biaya = $_GET["kd"];
    $biaya->delete_data();
    header("location:../view/data_biaya.php");
}
/* notif kontrol logika */
else {
    echo "kontrol logika yang kamu buat masih salah ogy";
}
?>
