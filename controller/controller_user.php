<?php
include_once "../model/class_data_user.php";
$user = new data_user();

/* logika kontrol */
if(isset($_POST["simpan"])){

    $user->username = $_POST["username"];
    $user->nama = $_POST["nama"];
    $user->password = $_POST["password"];
    $user->level = $_POST["level"];
    $button = $_POST["button"];
    
    /* proses simpan data */
    if($button == "simpan"){
        $rd = $user->cek();
        if($rd["username"] == $user->username){
            header("location:../view/form_user.php?msg=gagal");
        }
        else{
            $user->insert();
            header("location:../view/data_user.php");
        }
    }
    /* proses edit data */
    else if($button == "edit"){
        $user->username2 = $_POST["username2"];
        $user->update();
        header("location:../view/data_user.php");
    }
    /* notif jika logika salah */
    else{ echo "logika simpan dan edit salah"; }
}
/* proses hapus data */
else if(isset($_GET["kd"])){
    $user->username = $_GET["kd"];
    $user->delete();
    header("location: ../view/data_user.php");
}
/* notif jika logika salah */
else{ echo "logika kontrol yang kamu buat masih salah ogy..."; }
?>
