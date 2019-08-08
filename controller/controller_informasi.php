<?php
include_once "../model/class_informasi.php";
$inf = new informasi();

/* proses insert informasi */
if(isset($_POST['simpan'])){
    
    $inf->kategori = $_POST['kategori'];
    $inf->judul = $_POST['judul'];
    $inf->konten = $_POST['konten'];

    $allow_ext = array('png', 'jpg');
    $inf->img = $_FILES['img']['name'];
    $x = explode('.', $inf->img);
    $extensi = strtolower(end($x));
    $ukuran = $_FILES['img']['size'];
    $file_tmp = $_FILES['img']['tmp_name'];
    
    /* proses post informasi */
    if($inf->kategori == "informasi"){
        $inf->tgl_post = $_POST['date-post'];

        if(in_array($extensi, $allow_ext) === true){
            move_uploaded_file($file_tmp, '../img/'.$inf->img);
            $inf->insert_informasi();
            header('location:../halaman_admin.php#informasi-section');
        }
        else { header('location:../halaman_admin.php?post=gagal'); }
    } 
    /* proses post promo */ 
    else if($inf->kategori == "promo"){
        $inf->tgl_post = $_POST['berlaku'];

        if(in_array($extensi, $allow_ext) === true){
            move_uploaded_file($file_tmp, '../img/'.$inf->img);
            $inf->insert_informasi();
            header('location:../halaman_admin.php#promo-section');
        }
        else { header('location:../halaman_admin.php?post=gagal'); }

    } 
    else { echo " kategori tidak ditemukan "; }
}
/* proses edit informasi */
else if(isset($_POST['edit'])){
    $inf->id = $_POST['id'];
    $id = $_POST['id'];
    $inf->kategori = $_POST['kategori'];
    $inf->judul = $_POST['judul'];
    $inf->konten = $_POST['konten'];

    $allow_ext = array('png', 'jpg');
    $inf->img = $_FILES['img']['name'];
    $x = explode('.', $inf->img);
    $extensi = strtolower(end($x));
    $ukuran = $_FILES['img']['size'];
    $file_tmp = $_FILES['img']['tmp_name'];

    /* edit informasi */
    if($inf->kategori == "informasi"){
        $inf->tgl_post = $_POST['date-post'];
        if(empty($inf->img)){
            $inf->update_notimg();
            header('location:../halaman_admin.php#informasi-section');
        }
        else if(in_array($extensi, $allow_ext) === true){
            move_uploaded_file($file_tmp, '../img/'.$inf->img);
            $inf->update_informasi();
            header('location:../halaman_admin.php#informasi-section');
        }
        else { header("location:../view/edit_informasi.php?post=gagal&id=$id"); }
    }
    /* edit promo */
    else if($inf->kategori == "promo"){
        $inf->tgl_post = date("Y-m-d", strtotime($_POST['berlaku']));
        if(empty($inf->img)){
            $inf->update_notimg();
            header('location:../halaman_admin.php#promo-section');
        }
        else if(in_array($extensi, $allow_ext) === true){
            move_uploaded_file($file_tmp, '../img/'.$inf->img);
            $inf->update_informasi();
            header('location:../halaman_admin.php#promo-section');
        }
        else { header("location:../view/edit_informasi.php?post=gagal&id=$id"); }
    }
}
/* proses hapus informasi */
else if(isset($_GET['id'])){
    $inf->id = $_GET['id'];
    $inf->delete_informasi();

    if($_GET['kat'] == "promo"){
        header('location:../halaman_admin.php#promo-section');
    }
    else { header('location:../halaman_admin.php#informasi-section'); }
}
/* notif jika logika kontrol salah */
else { echo " logikan kontrol masih salah ogy ...."; }
?>
