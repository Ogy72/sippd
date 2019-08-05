<?php
include_once "../model/class_login.php";
$login = new login();

if(isset($_COOKIE['level'])){

    $login->level = $_COOKIE['level'];
    $login->username = $_COOKIE['user'];
    $login->password = $_COOKIE['pass'];
    
    /* kontrol login pelanggan */
    if($login->level == "pelanggan"){
        $login->email = $_COOKIE['email'];
        $login->validasi_pelanggan();

        if($login->akun == 'valid'){
            header("location:../halaman_pelanggan.php");
        }
        else if($login->akun == 'noactiv'){
            header('location:../index.php?akun=noactiv');
        }
        else if($login->akun == 'nopelanggan'){
            header("location:../index.php?akun=gagal");
        }
    } 
    /* kontrol login admin */
    else if($login->level == "admin"){
        $cek = $login->validasi_user();

        if($cek > 0){
            header("location:../halaman_admin.php");
        }
        else{
            header('location:../index.php?akun=gagal');
        }
    }
    /* kontrol login karyawan */
    else if($login->level == "karyawan"){
        $cek = $login->validasi_user();

        if($cek > 0){
            header('location:../halaman_karyawan.php');
        }
        else{
            header('location:../index.php?akun=gagal');
        }
    }
    else { echo "logika login salah"; }
}
/* end kontrol */
else { echo "kontrol logikamu masih salah ogy..."; }
?>
