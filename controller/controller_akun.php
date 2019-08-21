<?php
include_once "../model/class_akun_pelanggan.php";
$akun = new akun_pelanggan();

if(isset($_POST["simpan"])){

    $akun->nama = $_POST["nama"];
    $akun->username = $_POST["username"];
    $akun->username2 = $_POST["username2"];
    $akun->email = $_POST["email"];
    $akun->alamat = $_POST["alamat"];
    $akun->password = $_POST["old_password"];
    $akun->password1 = $_POST["new_password"];
    $password2 = $_POST["new_password2"];

    /* proses update nama */
    if(!empty($akun->nama)){
        $akun->update_nama();
        header("location:../view/manage_akun.php");
    }
    /* proses update username */
    else if(!empty($akun->username2)){
        /* cek apakah username sedang digunakan saat ini atau oleh akun lain */
        $cek = $akun->cek_username(); 
        if($cek > 0){
            header("location:../view/edit_profil.php?msg=akun1&frm=username");
        }
        else{
            $akun->update_username();
            header("location:../logout.php");
        }
    }
    /* proses update email */
    else if(!empty($akun->email)){
        /* cek apakah email digunakan saat ini atau oleh akun lain */
        $cek = $akun->cek_email();
        if($cek > 0){
            header("location:../view/edit_profil.php?msg=email1&frm=email");
        }
        else{
            $akun->update_email();
            header("location:../view/manage_akun.php");
        }
    }
    /* proses update alamat */
    else if(!empty($akun->alamat)){
        $akun->update_alamat();
        header("location:../view/manage_akun.php");
    }
    /* proses update password */
    else if(!empty($akun->password)){
        /* cek password yang diinputkan benar */
        $cek = $akun->cek_password();
        if($cek > 0){
            /* cek kombinasi password baru sesuai */
            if($akun->password1 == $password2){
                $akun->update_password();
                header("location:../logout.php");
            }
            else{ header("location:../view/edit_profil.php?msg=kombinasi&frm=password"); }
        }
        else{ header("location:../view/edit_profil.php?msg=password&frm=password"); }
    }
    /* notif jika logika update salah */
    else { echo "logika update salah"; }
}
/* notif jika logika kontrol salah */
else{ echo "Logika Kontrol Salah ogy.. "; }
?>
