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
        $username = $_COOKIE["user"];
        $nama = $_COOKIE['nama'];
        $level = $_COOKIE['level'];

        if($level !== "admin"){
            header("location:index.php");
        }
    ?>
  </head>
  <body data-spy='scroll' data-target='.site-navbar-target' data-offset='300'>
  
  <div class='site-wrap'>

    <div class='site-mobile-menu site-navbar-target'>
      <div class='site-mobile-menu-header'>
        <div class='site-mobile-menu-close mt-3'>
          <span class='icon-close2 js-menu-toggle'></span>
        </div>
      </div>
      <div class='site-mobile-menu-body'></div>
    </div>
   
    
<header class='site-navbar py-4 js-sticky-header site-navbar-target' role='banner'>
  <div class='container-fluid'>
    <div class='d-flex align-items-center'>
      <div class='site-logo mr-auto w-25'><a href='#home-section'>Sinar Putri</a></div>

        <div class='mx-auto text-center'>
            <nav class='site-navigation position-relative text-right' role='navigation'>
              <ul class='site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0'>
                <li class="nav-item dropdown">
                    <a href='#' class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Input Informasi</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="customPrevBtn dropdown-item" href="#">Input Informasi Website</a>
                        <a class="customNextBtn dropdown-item" href="#">Input Informasi Promo</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Input Data</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="view/menu_data_kertas.php">Data Kertas</a>
                        <a class="dropdown-item" href="view/menu_data_biaya.php">Data Biaya</a>
                        <a class="dropdown-item" href="view/menu_data_kurir.php">Data Kurir</a>
                    </div>
                </li>
                <li><a href='#promo-section' class='nav-link'>Laporan</a></li>
                <li><a href='#' class='nav-link'>Kelola User</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nama; ?></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Manage Akun</a>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
              </ul>
            </nav>
        </div>

      </div>
    </div>
  </div>
</header>
    

<!-- Form Input -->
<div class="intro-section" id="home-section">
    
    <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row set-top" style="padding-top:325px">
                <div class="col-12">

                <div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100">
                    <div class="container">
                        <div class="row">

                        <div class="owl-carousel col-12 nonloop-block-15">
                        <?php
                            $date = date('Y-m-d');
                        ?>
                        <!-- form input informasi -->
                        <div class="bg-white  align-self-stretch" style="color:black">
                            <div class="course-inner-text py-4 px-4">
                            <h3 style="font-weight:bold" class="mb-4">Input Informasi Website</h3>
                            <form action="controller/controller_informasi.php" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="judul"> Judul Informasi </label>
                                        <input type="text" name="judul" class="form-control" required>
                                        <input type="hidden" name="date-post" value="<?php echo $date; ?>">
                                        <input type="hidden" name="kategori" value="informasi">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="img"> Image Konten </label>
                                        <input class="form-control" type="file" name="img" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="konten"> Konten </label>
                                    <textarea class="form-control" name="konten" cols="30" rows="10" required></textarea>
                                </div>
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                            </form>
                            </div>
                        </div>

                        <!-- form input promo -->
                        <div class="bg-white  align-self-stretch" style="color:black">
                            <div class="course-inner-text py-4 px-4">
                            <h3 style="font-weight:bold" class="mb-4">Input Informasi Promo</h3>
                            <form action="controller/controller_informasi.php" method="post" enctype="multipart/form-data">
                                <div class="form-row">
                                    <div class="form-group col-6">
                                        <label for="judul"> Judul Promo </label>
                                        <input type="text" name="judul" class="form-control" required>
                                        <input type="hidden" name="kategori" value="promo">
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="mass-ber"> Masa Berlaku </label>
                                        <input class="form-control" type="date" name="berlaku" required>                       
                                    </div>
                                    <div class="form-group col-3">
                                        <label for="img"> Image Konten </label>
                                        <input class="form-control" type="file" name="img" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="konten"> Konten </label>
                                    <textarea class="form-control" name="konten" cols="30" rows="10" required></textarea>
                                </div>
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                            </form>
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

   <!-- footer -->
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
  <script src="js/bootstrap.bundle.js"></script>
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
