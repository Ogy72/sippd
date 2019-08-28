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
          <div class="site-logo mr-auto w-25"><a href="../index.php">Sinar Putri</a></div>

          <div class="mx-auto text-center">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu js-clone-nav mx-auto d-none d-lg-block  m-0 p-0">
                <li><a href="#home-section" class="nav-link">From Registrasi</a></li>
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
    
      <div class="slide-1" style="background-image: url('../images/hero_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row">

               <!-- from Registrasi -->
                <div class=" col-12 col-sm-12 col-lg-12" style="margin-top:100px" data-aos="fade-up" data-aos-delay="500">
                  <form action="../controller/controller_registrasi.php" method="post" class="form-box-reg">
                <?php
                    if(isset($_GET['pesan'])){
                        $pesan = $_GET['pesan'];
                        $this_pesan = '';

                        if($pesan == "akun"){
                            $this_pesan .='*Username atau Email Sudah Terdaftar. Harap Gunakan Username atau Email Lain.';
                        } 
                        else if($pesan == "password"){
                            $this_pesan .='*Kombinasi Password Salah. Harap Periksa Kembali.';
                        } else { 
                            $this_pesan .='';
                        }

                        echo "<small class='text-danger float-right'> $this_pesan</small>";
                    }

                ?> 
 
                    <h3 class="h4 text-black mb-3">Registrasi</h3>
                    <div class="form-row">
                        <div class='form-group col-12 col-sm-4 col-lg-4'>
                            <label for='nama' class='text-body'>Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>
                        </div>
                        <div class="form-group col-12 col-sm-4 col-lg-4">
                            <label for='username' class='text-body'>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Gunakan Username yang mudah diingat" required>
                        </div>
                        <div class="form-group col-12 col-sm-4 col-lg-4">
                            <label for='email' class='text-body'>Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class='form-group col-12 col-sm-12 col-lg-12'>
                            <label for='alamat' class='text-body'>Alamat</label>
                            <textarea class="form-control" name="alamat" cols="3" rows="3"></textarea>
                            <small class='form-text text-muted'>Note: Harap menuliskan alamat dengan lengkap disertai nomor telepon/Hp</small> 
                        </div>
                    </div>
                    <div class="form-row">
                        <div class='form-group col-12 col-sm-6 col-lg-6'>
                            <label for='password1' class='text-body'>Password</label>
                            <input type="password" name="password1" class="form-control" placeholder="Password" required>
                        </div>
                        <div class="form-group col-12 col-sm-6 col-lg-6">
                            <label for='password2' class='text-body'>Konfirmasi Password</label>
                            <input type="password" name="password2" class="form-control" placeholder="Retype-password" required>
                        </div>
                    </div> 
                    <div class="form-row mt-sm-4">
                        <div class='col-12 col-sm-12 col-lg-12'>
                            <input type="submit" name="registrasi" class="btn btn-primary float-right" value="Registrasi">
                            <a class='float-left pt-3' href="../index.php"> Sudah Punya Akun ? </a>
                        </div>
                    </div>
                  </form>
                </div>

          </div>
        </div>
      </div>

    </div>

     
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
