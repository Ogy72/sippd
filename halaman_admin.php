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
        include_once "model/class_informasi.php";
        $inf = new informasi();

        $username = $_COOKIE["user"];
        $nama = $_COOKIE['nama'];
        $level = $_COOKIE['level'];

        if($level !== "admin"){
            header("location:index.php");
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
          <div class="site-logo mr-auto w-25"><a href="halaman_admin.php">Sinar Putri</a></div>
        
        <div class='mx-auto text-center'>
            <nav class='site-navigation position-relative text-right' role='navigation'>
              <ul class='site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0'>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Input Informasi</a>
                    <div class="dropdown-menu">
                        <a class="customPrevBtn dropdown-item" href="#">Input Informasi Website</a>
                        <a class="customNextBtn dropdown-item" href="#">Input Informasi Promo</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Input Data</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="view/data_kertas.php">Data Kertas</a>
                        <a class="dropdown-item" href="view/data_biaya.php">Data Biaya</a>
                        <a class="dropdown-item" href="view/data_kurir.php">Data Kurir</a>
                    </div>
                </li>
                <li><a href='#' class='nav-link'>Laporan</a></li>
                <li><a href='view/data_user.php' class='nav-link'>Kelola User</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"><?php echo $nama; ?></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
              </ul>
            </nav>
        </div>

        </div>
      </div>
    </header>

<?php   
    if(isset($_GET['post'])){
        $post = $_GET['post'];
        $pesan = '';

        if($post == 'gagal'){
            $pesan = "*Format Gambar Tidak Sesuai";
        }
    }
    else{
        $pesan = '';
    }
?>   
    <!-- home section -->
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
                                <p style="color:red"><?php echo $pesan; ?></p>
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
                                <p style="color:red"><?php echo $pesan; ?></p>
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

    <!-- promo section -->

    <?php
        
        $data = $inf->read_promo();
    ?>
    <div class="site-section courses-title" id="promo-section">
      <div class="container">
        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Promo Sinar Putri</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section courses-entry-wrap"  data-aos="fade-up" data-aos-delay="100">
      <div class="container">
        <div class="row">

          <div class="owl-carousel col-12 nonloop-block-14">
            <?php

            foreach($data as $d){
                echo "
                <div class='course bg-white h-100 align-self-stretch' >
                    <figure class='m-0'>
                        <a href='#'><img src='img/$d[img]' alt='Image' height='220px' ></a>
                    </figure>
                    <div class='course-inner-text py-4 px-4' style='height:250px'>
                        <span class='course-price' style='background-color:#fff'>
                            <a href='view/edit_informasi.php?id=$d[id]' class='btn-sm btn-secondary'>Edit</a> 
                            <a href='controller/controller_informasi.php?id=$d[id]&kat=$d[kategori]' class='btn-sm btn-danger'>Hapus</a>
                        </span>
                        <div class='meta'><span class='icon-clock-o'></span>Promo Berlaku Hingga : $d[tgl_post]</div>
                            <h3>$d[judul]</h3>
                            <p style='text-align:justify'>$d[kontent]</p>
                         
                    </div>
                </div>";
            }
            ?>
          </div>

        </div>
        <div class="row justify-content-center">
          <div class="col-7 text-center">
            <button class="customPrevBtn btn btn-primary m-1">Prev</button>
            <button class="customNextBtn btn btn-primary m-1">Next</button>
          </div>
        </div>
      </div>
    </div>


    <!-- informasi section -->
    <div class="site-section" id="informasi-section">
      <div class="container">

        <div class="row mb-5 justify-content-center">
          <div class="col-lg-7 text-center"  data-aos="fade-up" data-aos-delay="">
            <h2 class="section-title">Informasi Terbaru</h2>
            <p>Dapatkan informasi dan berita terbaru dari foto copy sinar putri dalam website ini. Jangan sampai anda ketinggalan, dan dapatkan promo menarik yang dapat anda lihat dalam halaman promo.</p>
          </div>
        </div>

        <?php 

            $dat1 = $inf->read_informasi1();
            echo "
            <div class='row mb-5 align-items-center'>

                <div class='col-lg-7 mb-5' data-aos='fade-up' data-aos-delay='100'>
                    <img src='img/$dat1[img]' alt='Image' class='img-fluid'>
                </div>

                <div class='col-lg-4 ml-auto' data-aos='fade-up' data-aos-delay='200'>
                    <h2 class='text-black mb-4'>$dat1[judul]</h2>
                    <p class='mb-4'>$dat1[kontent]</p>
                    <div class='d-flex align-items-center custom-icon-wrap mb-3'>
                        <div>
                            <a href='view/edit_informasi.php?id=$dat1[id]' class='btn-sm btn-secondary'>Edit</a> 
                            <a href='controller/controller_informasi.php?id=$dat1[id]' class='btn-sm btn-danger'>Hapus</a>
                        </div>
                    </div>
                </div>

            </div>";

            $dat2 = $inf->read_informasi2();
            if(empty($dat2)){
                echo "";
            }
            else{
            echo "
            <div class='row mb-5 align-items-center'>

                <div class='col-lg-7 mb-5 order-1 order-lg-2' data-aos='fade-up' data-aos-delay='100'>
                    <img src='img/$dat2[img]' alt='Image' class='img-fluid'>
                </div>

                <div class='col-lg-4 mr-auto order-2 order-lg-1' data-aos='fade-up' data-aos-delay='200'>
                    <h2 class='text-black mb-4'>$dat2[judul]</h2>
                    <p class='mb-4'>$dat2[kontent]</p>
                    <div class='d-flex align-items-center custom-icon-wrap mb-3'>
                        <div>
                            <a href='view/edit_informasi.php?id=$dat2[id]' class='btn-sm btn-secondary'>Edit</a> 
                            <a href='controller/controller_informasi.php?id=$dat2[id]' class='btn-sm btn-danger'>Hapus</a>
                        </div>
                    </div>
                </div>

            </div>";
            }

            $dat3 = $inf->read_informasi3();
            if(empty($dat3)){
                echo "";
            }
            else {
            echo "
            <div class='row mb-5 align-items-center'>

                <div class='col-lg-7 mb-5' data-aos='fade-up' data-aos-delay='100'>
                    <img src='img/$dat3[img]' alt='Image' class='img-fluid'>
                </div>

                <div class='col-lg-4 ml-auto' data-aos='fade-up' data-aos-delay='200'>
                    <h2 class='text-black mb-4'>$dat3[judul]</h2>
                    <p class='mb-4'>$dat3[kontent]</p>
                    <div class='d-flex align-items-center custom-icon-wrap mb-3'>
                        <div>
                            <a href='view/edit_informasi.php?id=$dat3[id]' class='btn-sm btn-secondary'>Edit</a> 
                            <a href='controller/controller_informasi.php?id=$dat3[id]' class='btn-sm btn-danger'>Hapus</a>
                        </div>
                    </div>
                </div>

            </div>";
            }
        ?>
        <div style="text-align:center"> 
            <a href="view/list_informasi.php">Lihat Semua Informasi</a>        
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
