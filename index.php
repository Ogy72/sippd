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
          <div class="site-logo mr-auto w-25"><a href="index.php">Sinar Putri</a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="#home-section" class="nav-link">Home</a></li>
                <li><a href="#promo-section" class="nav-link">Promo Sinar Putri</a></li>
                <li><a href="#informasi-section" class="nav-link">Informasi Terbaru</a></li>
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
    
      <div class="slide-1" style="background-image: url('images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row set-top" style="padding-top:180px">
            <div class="col-12 col-sm-12 col-lg-12">

              <div class="row">
                
                <div class="col-12 col-sm-6 col-lg-6">
                  <h4 data-aos="fade-up" data-aos-delay="100" style="color:#fff"> Alur Pemesanan </h4>
                  <img src="images/alur12.svg" data-aos="fade-up" data-aos-delay="100" class="form-box-alur mb-4 img-fluid">
                  <p data-aos="fade-up" data-aos-delay="300"><a href="view/registrasi.php" class="btn btn-primary py-3 px-5 btn-pill">Registrasi Sekarang</a></p>
                </div>
                <?php   
                if(isset($_GET['akun'])){
                    $akun = $_GET['akun'];
                    $pesan = '';

                    if($akun == 'gagal'){
                        $pesan = "*Username atau Password Salah";
                    }
                    else if($akun == 'noactiv'){
                        $pesan = "*Akun Anda Belum Aktiv, Harap Cek Email Konfirmasi";
                    }
                }
                else{
                    $pesan = '';
                }
                ?>
                <!-- from login -->
                <div class="col-12 col-sm-5 col-lg-5 ml-auto mt-3" data-aos="fade-up" data-aos-delay="500">
                  <form action="set_login.php" method="post" class="form-box">
                    <h3 class="h4 text-black mb-4">Login</h3>
                    <div class="form-group">
                      <input type="text" name="username" class="form-control" placeholder="Email atau Username" required>
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div> 
                    <div class="form-group">
                      <input type="submit" name="login" class="btn btn-primary btn-pill" value="Login">
                    </div>
                    <p style="color:red"><?php echo $pesan; ?></p>
                  </form>
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
                            <a href='view/view-informasi2.php?id=$d[id]' class='btn-sm btn-primary'>Baca Selengkapnya</a>
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
            $konten = substr($dat1["kontent"],0,450);
            echo "
            <div class='row mb-5 align-items-center'>

                <div class='col-lg-7 mb-5' data-aos='fade-up' data-aos-delay='100'>
                    <img src='img/$dat1[img]' alt='Image' width='105%' height='450px'>
                </div>

                <div class='col-lg-4 ml-auto' data-aos='fade-up' data-aos-delay='200'>
                    <h2 class='text-black mb-4'>$dat1[judul]</h2>
                    <p>di post pada - $dat1[tgl_post]</p>
                    <p class='mb-4' style='text-align:justify'>$konten</p>
                    <div class='d-flex align-items-center custom-icon-wrap mb-3'>
                        <div>
                            <a href='view/view-informasi2.php?id=$dat1[id]'>Baca Selengkapnya ...</a> 
                        </div>
                    </div>
                </div>

            </div>";

            $dat2 = $inf->read_informasi2();
            $konten2 = substr($dat2["kontent"],0,450);
            if(empty($dat2)){
                echo "";
            }
            else{
            echo "
            <div class='row mb-5 align-items-center'>

                <div class='col-lg-7 mb-5 order-1 order-lg-2' data-aos='fade-up' data-aos-delay='100'>
                    <img src='img/$dat2[img]' alt='Image' width='105%' height='450px'>
                </div>

                <div class='col-lg-4 mr-auto order-2 order-lg-1' data-aos='fade-up' data-aos-delay='200'>
                    <h2 class='text-black mb-4'>$dat2[judul]</h2>
                    <p>di post pada - $dat2[tgl_post]</p>
                    <p class='mb-4' style='text-align:justify'>$konten2</p>
                    <div class='d-flex align-items-center custom-icon-wrap mb-3'>
                        <div>
                            <a href='view/view-informasi2.php?id=$dat2[id]'>Baca Selengkapnya ...</a> 
                        </div>
                    </div>
                </div>

            </div>";
            }

            $dat3 = $inf->read_informasi3();
            $konten3 = substr($dat3["kontent"],0,450);
            if(empty($dat3)){
                echo "";
            }
            else {
            echo "
            <div class='row mb-5 align-items-center'>

                <div class='col-lg-7 mb-5' data-aos='fade-up' data-aos-delay='100'>
                    <img src='img/$dat3[img]' alt='Image' width='105%' height='450px'>
                </div>

                <div class='col-lg-4 ml-auto' data-aos='fade-up' data-aos-delay='200'>
                    <h2 class='text-black mb-4'>$dat3[judul]</h2>
                    <p>di post pada - $dat3[tgl_post]</p>
                    <p class='mb-4' style='text-align:justify'>$konten3</p>
                    <div class='d-flex align-items-center custom-icon-wrap mb-3'>
                        <div>
                            <a href='view/view-informasi2.php?id=$dat3[id]'>Baca Selengkapnya ...</a> 
                        </div>
                    </div>
                </div>

            </div>";
            }
        ?>
      </div><!--end container-->
    </div><!--end site-section-->


    
    <div class="site-section pb-0">

      <div class="future-blobs">
        <div class="blob_2">
          <img src="images/blob_2.svg" alt="Image">
        </div>
        <div class="blob_1">
          <img src="images/blob_1.svg" alt="Image">
        </div>
      </div>

      <div class="container">
        <div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="">
          <div class="col-lg-7 text-center">
            <h3 class="section-title">Kenapa Harus Memilih Foto Copy Sinar Putri</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 ml-auto align-self-start"  data-aos="fade-up" data-aos-delay="100">

            <div class="p-4 rounded bg-white why-choose-us-box">

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Kami Memberikan Pelayanan Terbaik</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Kami Selalu Menjaga Kualitas Jasa</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Kualitas Cetak Terbaik</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Memberikan Pengalaman Baru Dalam Mencetak Dokumen</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light mb-3">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-graduation-cap"></span></span></div>
                <div><h3 class="m-0">Website Pemesanan Percetakan Dokumen Pertama</h3></div>
              </div>

              <div class="d-flex align-items-center custom-icon-wrap custom-icon-light">
                <div class="mr-3"><span class="custom-icon-inner"><span class="icon icon-university"></span></span></div>
                <div><h3 class="m-0">Kami Memiliki Karyawan Kompeten</h3></div>
              </div>

            </div><!--end why choose box-->

          </div><!--end col-lg-4-->
          <div class="col-lg-7 align-self-end"  data-aos="fade-left" data-aos-delay="200">
            <img src="images/person_transparent.png" alt="Image" class="img-fluid">
          </div>
        </div><!--end row-->
      </div><!--end container-->
    </div><!--end section pb-0 -->

     
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
