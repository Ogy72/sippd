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
        include_once "../model/class_tracking.php";
        $tracking = new tracking();

        $username = $_COOKIE["user"];
        $nama = $_COOKIE['nama'];
        $level = $_COOKIE['level'];
        $tracking->username = $username;

        if($level !== "karyawan"){
            header("location:../index.php");
        }

        if(isset($_GET["kd_pesanan"])){
            $kd_pesanan = $_GET["kd_pesanan"];
            $tracking->kd_pesanan = $kd_pesanan;
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
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><a href="../halaman_karyawan.php">Sinar Putri</a></div>

          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="input_tracking.php" class="nav-link"><span>Kembali</span></a></li>
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
          <div class="row set-top" style="padding-top:110px">
            <div class="col-12">

            <div class="row">
                
                <!-- Data Kertas -->
                <div class="col-12 col-lg-12 ml-auto mt-1" style='color:black' data-aos="fade-up" data-aos-delay="100">
                  <div class="form-box">
                    <h3 class="h4 text-black mb-2">Input Tracking</h3>
                        <form method='post' action='../controller/controller_tracking.php'> 
                            <select class="form-control mb-sm-2" name="status_pengerjaan" required>
                                <option value="" selected>Pilih Status Pengerjaan</option>
                                <option value="Pesanan Sedang Dalam Proses Print">Pesanan Sedang Dalam Proses Print</option>
                                <option value="Pesanan Sedang Dalam Proses Jilid">Pesanan Sedang Dalam Proses Jilid</option>
                                <option value="Pesanan Selesai Dicetak">Pesanan Selesai Dicetak</option>
                                <option value="Pesanan Telah Diantar Kurir">Pesanan Telah Diantar Kurir</option>
                                <option value="Pesanan Telah Diterima Pemilik">Pesanan Telah Diterima Pemilik</option>
                            </select>
                            <input type='hidden' name='kd_pesanan' value='<?php echo $kd_pesanan ?>'>
                            <input type='hidden' name='username' value='<?php echo $username ?>'>
                            <button type='link' class='btn-sm btn-warning'><a href='input_tracking.php' class='text-white'>Batal</a></button>
                            <input type='submit' name='input' value='Input' class='btn-sm btn-primary mb-sm-4' style='width:75px'>
                        </form>
                        <div class='col-12 col-sm-12'>
                            <table class='table table-hover table-sm'>
                                <thead>
                                    <tr>
                                        <th width='27%'>Tanggal dan Waktu Pengerjaan</th>
                                        <th width='45%'>Status Pengerjaan</th>
                                        <th width='18%'>Dikerjakan Oleh</th>
                                        <th width='10%'>Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $rd = $tracking->detail_tracking();
                                        foreach($rd as $d){
                                        echo "
                                            <tr>
                                                <td>$d[date_time]</td>
                                                <td>$d[status_pengerjaan]</td>
                                                <td>$d[username]</td>
                                                <td><a href='../controller/controller_tracking.php?id=$d[id]&kd=$kd_pesanan&hapus' class='btn-sm btn-danger'>Hapus</a></td>
                                            </tr>";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                  </div>
                </div>

            </div>

            </div>
          </div>
        </div>
      </div>

    </div>

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
