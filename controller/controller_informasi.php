<?php
include_once "class_informasi.php";
$inf = new informasi();

if(isset($_POST['simpan'])){
    
    $inf->kategori = $_POST['kategori'];
    $inf->judul = $_POST['judul'];
    $inf->img = $_POST['img'];
    $inf->konten = $_POST['konten'];

    if($inf->kategori == "informasi"){
        $inf->tgl_post = $_POST['date-post'];
    } 
    else if($inf-> == "promo"){
        $inf->tgl_post = $_POST['berlaku'];
    } 
    else { echo " kategori tidak ditemukan "; }
}
else { echo " logikan kontrol masih salah ogy ...."; }
?>
