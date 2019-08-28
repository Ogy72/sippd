<?php
include_once "../model/class_data_kurir.php";
$kurir = new data_kurir();

/* proses simpan logika */
if(isset($_POST["simpan"])){

  $kurir->id_kurir = $_POST["id_kurir"];
  $kurir->label_kurir = $_POST["label_kurir"];
  $kurir->tarif_minimum = $_POST["tarif_minimum"];
  $kurir->tarif_km = $_POST["tarif_km"];
  $button = $_POST["button"];

    /* proses simpan */
    if($button == "simpan"){

          $kurir->insert();
          header("location:../view/data_kurir.php");
    }
    /* proses edit */ 
    else if($button == "edit"){
        
        $kurir->update();
        header("location:../view/data_kurir.php");
    }
    

}
/* proses hapus data kurir */
else if(isset($_GET["kd"])){
    $kurir->id_kurir = $_GET["kd"];

    $kurir->delete();
    header("location:../view/data_kurir.php");
}
/* notif jika logika salah */
else{ echo "logika kontrol yang kamu buat masih salah ogy...";}
?>
