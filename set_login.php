<?php
include_once "model/class_login.php";
$login = new login();

if(isset($_POST['login'])){
        
    $login->username = $_POST['username'];
    $login->email = $_POST['username'];
    $login->password = $_POST['password'];

    $data = $login->read_data_user();
    $cek = $data->fetch_array();

    if(empty($cek['level'])){
        $dat = $login->read_data_pelanggan();
        $d = $dat->fetch_array();
        setcookie('level',"pelanggan",strtotime('+7 days'),'/');
        setcookie('user',"$d[username]",strtotime('+7 days'),'/');
        setcookie('nama',"$d[nama]",strtotime('+7 days'),'/');
        setcookie('email',"$d[email]",strtotime('+7 days'),'/');
        setcookie('pass',"$d[password]",strtotime('+7 days'),'/');
        header('location:controller/controller_login.php');
    } else {
        setcookie('level',"$cek[level]",strtotime('+7 days'),'/');
        setcookie('user',"$cek[username]",strtotime('+7 days'),'/');
        setcookie('nama',"$cek[nama]",strtotime('+7 days'),'/');
        setcookie('pass',"$cek[password]",strtotime('+7 days'),'/');
        header('location:controller/controller_login.php');
    }
}
?>
