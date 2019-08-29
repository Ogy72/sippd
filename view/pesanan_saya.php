<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SinarPutri&mdash; Sistm Informasi PPD</title>
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

    <?php
        include_once "../model/class_pemesanan.php";
        $pesan = new pemesanan();
        
        $pesan->akun->username = $_COOKIE["user"];
        $pesan->username = $_COOKIE["user"];
        $level = $_COOKIE['level'];
        $d = $pesan->read_akun();
        $msg = "";

        if(!isset($_GET["order"])){
            $rd = $pesan->read_order();
            $pesan->kd_pesanan = $rd["kd_pesanan"];
            if($pesan->kd_pesanan == ""){
                $msg = "Tidak Ada Pesanan </br> </br> <a href='../halaman_pelanggan.php' class='btn-sm btn-primary'>Kembali</a>";
            }
            else { $msg == "";}

        }
        else{
            $pesan->kd_pesanan = $_GET["order"];
        }

        if($level !== "pelanggan"){
            header("location:../index.php");
        }

    ?>

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div>   
        <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-lg-block m-0 p-0">
            <li class="cta nav-link"><a href="#contact-section"><span>Hubungi Kami</span></a></li>
        </ul>
      </div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><a href="#home-section">Sinar Putri</a></div>

          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="#contact-section" class="nav-link"><span>Hubungi Kami</span></a></li>
              </ul>
            </nav>
            <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a>
          </div>

        </div>
      </div>
    </header>
    
    <!-- home section -->
    <div class="intro-section" id="home-section">
    
      <div class="slide-1" style="background-image: url('../images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row set-top">
            <div class="col-12">

            <div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100" style='padding-top:385px'>
            <div class="container">
                <div class="row">

                <div class="owl-carousel col-12 nonloop-block-15">
                <?php 
                    if($msg !== ""){
                        echo "<h5 class='text-warning' style='text-align:center'>$msg</h5>";
                    }
                    else{
                    $pesanan = $pesan->pesanan_saya();
                        
                        foreach($pesanan as $p){
                        $pesan->kd_pesanan = $p["kd_pesanan"];
                        $bill_print = $pesan->bill_print();
                        $bill_jilid = $pesan->bill_jilid();
                        $bill = $pesan->bill();
                        $ongkir = $pesan->read_ongkir();

                        if($bill["metode_pembayaran"] == "transfer"){
                            $transfer_ke = "Transfer ke no-rekening :";
                            $norek = "BNI 8277-772299";
                        }
                        else {
                            $transfer_ke = "";
                            $norek = "";
                        }
                    echo "
                <!-- pesanan saya -->
                <div class='bg-white  align-self-stretch' style='color:black'>
                    <div class='course-inner-text py-4 px-4'>
                        <div class='form-row'>
                            <div class='col-12 col-sm-12 col-lg-12'>
                            
                                <div class='card'> 
                                    <h4 class='card-header text-center'>Pesanan Saya</h4> 
                                    <div class='card-body'>
                                        <div class='row'>
                                            <div class='col-12 col-sm-6 col-lg-6'>
                                                <h6 class='card-title text-body mb-1'> Pesanan : #$p[kd_pesanan]</h6>
                                                <h6 class='card-title text-body mb-3'> Dipesanan Pada : $p[date]</h6> 
                                                <h6 class='card-title text-body mb-1'> $transfer_ke </h6>
                                                <h6 class='card-title text-info mb-3'> $norek </h6> 
                                                <h6 class='card-title text-body mb-2'> Jumlah yang harus di Bayar :</h6>
                                                <h5 class='card-title text-danger mb-3'>Rp. $bill[kd_bayar]</h5>
                                                <h6 class='card-title text-muted mb-3'> Status : $bill[status]</h6>
                                            </div>
                                            <div class='col-12 col-sm-6 col-lg-6'>
                                                <h5 class='card-subtitle text-body mb-3'> Pemesana : $d[nama]</h5>
                                                
                                                <h6 class='card-title text-body'>Alamat</h6>
                                                <h6 class='card-subtitle text-muted'>$d[alamat]</h6>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <p style='text-align:center'> 
                                        <a class='btn-sm btn-secondary' data-toggle='collapse' href='#detail' role='button'>Detail Pesanan</a> 
                                    </p>
                                    <div class='collapse' id='detail'>
                                        <div class='card'>
                                            <h4 class='card-header text-center'>Detail Pesanan</h4> 
                                            <div class=' card card-body'>
                                                <div class='row'>
                                                    <div class='col-12 col-sm-3 col-lg-3'>
                                                        <h6 class='card-title text-body'>Dokumen</h6>
                                                        <h6 class='card-subtitle text-muted mb-3'>$p[jenis_doc] - $p[file]</h6>
                                                    </div>
                                                    <div class='col-12 col-sm-3 col-lg-3'>
                                                        <h6 class='card-title text-body'>Jumlah Halaman</h6>
                                                        <h6 class='card-subtitle text-muted mb-3'>$p[halaman] - Lembar</h6>
                                                    </div>
                                                    <div class='col-12 col-sm-3 col-lg-3'>
                                                        <h6 class='card-title text-body'>Jumlah Copy</h6>
                                                        <h6 class='card-subtitle text-muted mb-3'>$p[copy] - Copy</h6>
                                                    </div>
                                                    <div class='col-12 col-sm-3 col-lg-3'>
                                                        <h6 class='card-title text-body'>Jenis Print</h6>
                                                        <h6 class='card-subtitle text-muted mb-3'>$p[jenis_print]</h6>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-12 col-sm-12 col-lg-12'>
                                                        <h6 class='card-title text-body'> Pengiriman : $ongkir[label_kurir]</h6>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-12 col-sm-3 col-lg-3'>
                                                        <h6 class='card-title text-muted'> Biaya Pengiriman : $ongkir[sub_biaya]</h6>
                                                    </div>
                                                    <div class='col-12 col-sm-3 col-lg-3'>
                                                        <h6 class='card-title text-muted'> Biaya Print : $bill_print[sub_biaya]</h6>
                                                    </div>
                                                    <div class='col-12 col-sm-3 col-lg-3'>
                                                        <h6 class='card-title text-muted'> Biaya Jilid : $bill_jilid[sub_biaya]</h6>
                                                    </div>
                                                    <div class='col-12 col-sm-3 col-lg-3'>
                                                        <h6 class='card-title text-muted'> Total Biaya : $bill[total_biaya]</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!-- close collapse -->
                                    <div class='card-footer '>
                                        <div class='row'>
                                            <div class='col-12 col-sm-12 col-lg-12'>
                                                <a href='../halaman_pelanggan.php' class='btn-sm btn-danger float-right'>Kembali</a>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- close div card -->
                            </div>
                            <div class='col-12 text-center'>
                                <button class='customPrevBtn btn-sm btn-primary mt-4'>Prev</button>
                                <button class='customNextBtn btn-sm btn-primary mt-4'>Next</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- close pesanan saya -->";
                        }
                    }
                ?>

                </div><!-- close owl-carousel -->

                </div><!-- close class row -->
            </div><!-- close class container -->
            </div><!-- close class site-section -->

            </div><!-- close class col-12 -->
          </div><!-- close row set-top -->
        </div><!-- close container -->
      </div><!-- close slide1 -->
        
    </div><!-- close intro section -->

    <!-- foter section -->
    <footer class="footer-section bg-white" id="contact-section">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h3>Tentang Fotocopy Sinar Putri</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro consectetur ut hic ipsum et veritatis corrupti. Itaque eius soluta optio dolorum temporibus in, atque, quos fugit sunt sit quaerat dicta.</p>
          </div>

          <div class="col-md-3 ml-auto">
            <h3>Links</h3>
            <ul class="list-unstyled footer-links">
              <li><a href="#">Whatsapp</a></li>
              <li><a href="#">Telegram</a></li>
              <li><a href="#">Instagram</a></li>
            </ul>
          </div>

          <div class="col-md-4">
            <h3>Kontak</h3>
            <p>Jika Ada Permasalahan Mendesak Harap Hubungi Nomor dibawah ini.</p> 
            <a href="#"> 0811-2222-3333</a>
            <p>Note: Hanya Melayani Pada jam Kerja</p>
          </div>

        </div>

        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="border-top pt-5">
            <p>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
      </p>
            </div>
          </div>
          
        </div>
      </div>
    </footer>
    
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
    
  </body>
</html>
