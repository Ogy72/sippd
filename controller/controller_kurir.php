<?php
include_once "../model/class_data_kurir.php";
$kurir = new data_kurir();

/* proses simpan logika */
if(isset($_POST["simpan"])){

  $kurir->kd_kurir = $_POST["kd_kurir"];
  $kurir->label_kurir = $_POST["label_kurir"];
  $kurir->tarif_minimum = $_POST["tarif_minimum"];
  $kurir->tarif_km = $_POST["tarif_km"];
  $button = $_POST["button"];

    /* proses simpan */
    if($button == "simpan"){

        $rd = $kurir->cek();
        if($kurir->kd_kurir == $rd["kd_kurir"]){
          header("location:../view/form_kurir.php?msg=gagal");
        }
        else{
          $kurir->insert();
          header("location:../view/data_kurir.php");
        }
    }
    /* proses edit */ 
    else if($button == "edit"){
        
        $kurir->kd_kurir2 = $_POST["kd_kurir2"];

        $kurir->update();
        header("location:../view/data_kurir.php");
    }
    

}
/* proses hapus data kurir */
else if(isset($_GET["kd"])){
    $kurir->kd_kurir = $_GET["kd"];

    $kurir->delete();
    header("location:../view/data_kurir.php");
}
/* notif jika logika salah */
else{ echo "logika kontrol yang kamu buat masih salah ogy...";}
?>
