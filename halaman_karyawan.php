<!DOCTYPE html>
<html lang="en">
  <head>
    <title>SinarPutri&mdash; Sistm Informasi PPD</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">

    <?php
        include_once "model/class_pemesanan.php";
        $pesan = new pemesanan();

        $username = $_COOKIE["user"];
        $nama = $_COOKIE['nama'];
        $level = $_COOKIE['level'];

        if($level !== "karyawan"){
            header("location:../index.php");
        }

    ?>

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <!-- mobile menu -->
    <div class='site-mobile-menu site-navbar-target'>
        <div class='site-mobile-menu-header'>
            <div class='site-mobile-menu-close mt-3'>
                <span class='icon-close2 js-menu-toggle'></span>
            </div>
        </div>
        <div>
          <ul class='site-menu main-menu js-clone-nav mx-auto d-lg-block  m-0 p-0'>
            <li class='nav-link'><a href='#daftar-pesanan' >Daftar Pesanann</a></li>
            <li class='nav-link'><a href='view/input_tracking.php'>Input Tracking</a></li>
            <li class="nav-item dropdown nav-link">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                    <?php echo $nama; ?>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </li>
          </ul>
        </div>
    </div>
   
    
    <header class='site-navbar py-4 js-sticky-header site-navbar-target' role='banner'>
      <div class='container-fluid'>
        <div class='d-flex align-items-center'>
          <div class='site-logo mr-auto w-25'><a href='#home-section'>Sinar Putri</a></div>

          <div class='mx-auto text-center'>
            <nav class='site-navigation position-relative text-right' role='navigation'>
              <ul class='site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0'>
                <li class='nav-link'><a href='#daftar-pesanan' >Daftar Pesanann</a></li>
                <li class='nav-link'><a href='view/input_tracking.php'>Input Tracking</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <?php echo $nama; ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
              </ul>
            </nav>
          </div>

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
    
      <div class="slide-1" style="background-image: url('../images/hero_1.jpg'); overflow:auto;" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row set-top" style="padding-top:110px">
            <div class="col-12">

              <div class="row">
        
                <!-- detail pesanan -->
                <div class="col-12 col-sm-12 col-lg-12 ml-auto" style='color:black' data-aos="fade-up" data-aos-delay="100">
                    <div class="form-box">
                        <div class='row'>

                            <div class='col-12 col-sm-12 col-lg-12'>
                                <div class='card'> 
                                    <h4 class='card-header text-center'>Daftar Pesanan</h4> 
                                    <div class='card-body'>
                                        <table class='table table-hover table-sm'>
                                            <thead class='thead-dark'>
                                                <tr>
                                                    <th width='15%'>Kode Pesanan</th>
                                                    <th width='20%'>Metode Pembayaran</th>
                                                    <th width='17%'>Kode Pembayaran</th>
                                                    <th width='20%'>Jenis Dokumen</th>
                                                    <th width='20%'>Pemesan</th>
                                                    <th width='8%'>Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $pesanan = $pesan->read_all_pesanan();
                                                    foreach($pesanan as $p){
                                                        echo "
                                                        <tr>
                                                            <td>$p[kd_pesanan]</td>
                                                            <td>$p[metode_pembayaran]</td>
                                                            <td>$p[kd_bayar]</td>
                                                            <td>$p[jenis_doc]</td>
                                                            <td>$p[username]</td>
                                                            <td>
                                                                <a href='view/pesanan_pelanggan.php?kd_pesanan=$p[kd_pesanan]&username=$p[username]' class='btn-sm btn-primary'>Detail</a>
                                                            </td>
                                                        </tr>";
                                                }
                                            ?>
                                            </tbody>
                                        </table>
                                                        
                                    </div>
                                    <div class='card-footer '>
                                        <div class='row'>
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

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/jquery.sticky.js"></script>

  
  <script src="js/main.js"></script>
    
  </body>
</html>