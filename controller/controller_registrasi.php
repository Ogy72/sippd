<?php
include_once "../model/class_registrasi.php";
$regist = new registrasi();

if(isset($_POST['registrasi'])){
    $regist->nama = $_POST['nama'];
    $regist->username = $_POST['username'];
    $regist->email = $_POST['email'];
    $regist->alamat = $_POST['alamat'];
    $regist->password = $_POST['password1'];
    $password1 = $regist->password;
    $password2 = $_POST['password2'];

    /* cek kombinasi password */ 
    if($password1 == $password2){
        $akun = $regist->cek_akun();
        $cek = $regist->count($akun);
        
        /* cek akun apakah sudah ada dalam database */
        if($cek <= 0 ){
            $regist->insert_data();
            $username = $regist->username;
            header("location:../view/succes_registrasi.php?link=$username");
        } else {
            header("location:../view/registrasi.php?pesan=akun");
        }/* end cek akun */

    } else {
        header("location:../view/registrasi.php?pesan=password");
    }/* end cek kombinasi password */

} /*proses aktivasi akun */
else if(isset($_GET['akun'])){
    $regist->username = $_GET['akun'];
    $rd = $regist->read_data();
    $data = $rd->fetch_array();
    if($data['username'] == $regist->username){
        $regist->aktivasi();
        $level = "pelanggan";
        setcookie("user", $data['username'], strtotime('+7 days'), "/");
        setcookie("nama", $data['nama'], strtotime('+7 days'), "/");
        setcookie("email", $data['email'], strtotime('+7 days'), "/");
        setcookie("pass", $data['password'], strtotime('+7 days'), "/");
        setcookie("level", $level, strtotime('+7 days'), "/");
        header("location:controller_login.php");
    } else { echo "Aktivasi Akun Gagal"; }
} 
else { echo " Fail Logic"; }/* end isset */
?>
