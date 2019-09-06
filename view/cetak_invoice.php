<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include_once "../model/class_pemesanan.php";
        $pesan = new pemesanan();

        $pesan->kd_pesanan = $_GET["kd_pesanan"];
        $pesan->akun->username = $_GET["username"];
        $username = $_COOKIE["user"];
        $level = $_COOKIE['level'];

        if($level !== "karyawan"){
            header("location:../index.php");
        }

        echo "<title>SinarPutri&mdash; Pesanan-$pesan->kd_pesanan</title>"
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">

    <link rel="stylesheet" href="../css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/style.css">

    

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" id='are-print_invoice'>
  
  <div class="site-wrap">

    <!-- home section -->
    <div class="intro-section" id="home-section">
    
        <div class="container">
          <div class="row set-top" style="padding-top:110px">
            <div class="col-12">

              <div class="row">
                <?php 
                    $d = $pesan->read_akun();
                    $p = $pesan->read_pesanan();
                    $bill_print = $pesan->bill_print();
                    $bill_jilid = $pesan->bill_jilid();
                    $bill = $pesan->bill();
                    $ongkir = $pesan->read_ongkir();
                    $date = date('Y-m-d');
                    $use = $pesan->cek_kertas_via_karyawan();
                    $pesan->kd_kertas = $use["kd_kertas"];
                    $stok = $pesan->cek_kertas(); 
                    $pesan = "";
                    $btn = "";
                    if($use["digunakan"] > $stok["stok"]){
                        $pesan = "*Stok Kertas Tidak Cukup";
                        $btn = "hidden";
                    }
                    else{ 
                        $pesan = "Kode Pembayaran : $bill[kd_bayar]"; 
                        $btn = "submit"; 
                    } 
                ?>
                <!-- detail pesanan -->
                <div class="col-12 col-sm-12 col-lg-12 ml-auto" style='color:black'>
                    <div class="form-box">
                        <div class='row'>

                            <div class='col-12 col-sm-12 col-lg-12'>
                                <div class='card'> 
                                    <h4 class='card-header text-center'>Invoice Pesanan</h4> 
                                    <div class='card-body'>
                                        <h5 class='card-subtitle text-body mb-3'> Pemesana : <?php echo $d["nama"] ?></h5>

                                        <h6 class='card-title text-body'>Alamat</h6>
                                        <h6 class='card-subtitle text-muted mb-3'><?php echo $d["alamat"] ?></h6>
                                    </div>
                                <div class='card'> 
                                    <div class='card-body'>
                                        <div class='row'>
                                            <div class='col-12 col-sm-12 col-lg-12'>
                                                <h6 class='card-title text-body mb-1'> Pesanan : <?php echo "#$p[kd_pesanan]" ?></h6>
                                                <h6 class='card-title text-body mb-3'> Dipesanan Pada : <?php echo "$p[date]" ?></h6>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-12 col-sm-3 col-lg-3'>
                                                <h6 class='card-title text-body'>Dokumen</h6>
                                                <h6 class='card-subtitle text-muted mb-3'><?php echo "$p[jenis_doc] - $p[file]" ?></h6>
                                            </div>
                                            <div class='col-12 col-sm-3 col-lg-3'>
                                                <h6 class='card-title text-body'>Jumlah Halaman</h6>
                                                <h6 class='card-subtitle text-muted mb-3'><?php echo "$p[halaman] - Lembar" ?></h6>
                                            </div>
                                            <div class='col-12 col-sm-3 col-lg-3'>
                                                <h6 class='card-title text-body'>Jumlah Copy</h6>
                                                <h6 class='card-subtitle text-muted mb-3'><?php echo "$p[copy] - Copy" ?></h6>
                                            </div>
                                            <div class='col-12 col-sm-3 col-lg-3'>
                                                <h6 class='card-title text-body'>Jenis Print</h6>
                                                <h6 class='card-subtitle text-muted mb-3'><?php echo "$p[jenis_print]" ?></h6>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-12 col-sm-12 col-lg-12'>
                                                <h6 class='card-title text-body'> Pengiriman : <?php echo "$ongkir[label_kurir]" ?></h6>
                                            </div>
                                        </div>
                                        <div class='row'>
                                            <div class='col-12 col-sm-3 col-lg-3'>
                                                <h6 class='card-title text-muted'> Biaya Pengiriman : <?php echo "$ongkir[sub_biaya]" ?></h6>
                                            </div>
                                            <div class='col-12 col-sm-3 col-lg-3'>
                                                <h6 class='card-title text-muted'> Biaya Print : <?php echo "$bill_print[sub_biaya]" ?></h6>
                                            </div>
                                            <div class='col-12 col-sm-3 col-lg-3'>
                                                <h6 class='card-title text-muted'> Biaya Jilid : <?php echo "$bill_jilid[sub_biaya]" ?></h6>
                                            </div>
                                            <div class='col-12 col-sm-3 col-lg-3'>
                                                <h6 class='card-title text-muted'> Total Biaya : <?php echo "$bill[total_biaya]" ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class='card-footer '>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

              </div>

            </div>
          </div>
        </div>

    </div>
    
  </div> <!-- .site-wrap -->

    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/jquery-migrate-3.0.1.min.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/jquery.stellar.min.js"></script>
    <script src="../js/jquery.countdown.min.js"></script>
    <script src="../js/bootstrap-datepicker.min.js"></script>
    <script src="../js/jquery.easing.1.3.js"></script>
    <script src="../js/aos.js"></script>
    <script src="../js/jquery.fancybox.min.js"></script>
    <script src="../js/jquery.sticky.js"></script>
    <script src="../js/main.js"></script>

    <script>
        window.print();
    </script>
    
  </body>
</html>
