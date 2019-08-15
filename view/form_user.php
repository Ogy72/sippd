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
        include_once "../model/class_data_user.php";
        $user = new data_user();

        $username = $_COOKIE["user"];
        $nama = $_COOKIE['nama'];
        $level = $_COOKIE['level'];
        $pesan = "";

        if($level !== "admin"){
            header("location:../index.php");
        }

        if(isset($_GET["msg"])){
            $msg = $_GET["msg"];

            if($msg == "gagal"){
                $pesan = "*Data yang Anda Input Sudah Tersedia Dalam Database";
            }
            else{ 
                $pesan = "";
            }
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
          <div class="site-logo mr-auto w-25"><a href="../halaman_admin.php">Sinar Putri</a></div>

          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="data_user.php" class="nav-link"><span>Kembali</span></a></li>
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
        <?php
            if(isset($_GET["form"])){

                $user->username = $_GET["kd"];
                $d = $user->read_bykd();

                /* form edit data user */
                echo "
                <div class='col-2'></div>

                <div class='col-lg-8 ml-auto mt-1' data-aos='fade-up' data-aos-delay='100'>
                    <div class='form-box' style='color:black'>
                    <h3 class='h4 text-black mb-2'>Edit Data User</h3>
                    <form action='../controller/controller_user.php' method='post'>
                        <div class='form-row'>
                            <div class='form-group col-12'>
                                <label for='username'>Username</label>
                                <input class='form-control' type='text' name='username2' value='$d[username]' required placeholder='Masukkan User Name'>
                                <input type='hidden' name='username' value='$d[username]'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-12'>
                                <label for='nama'>Nama</label>
                                <input class='form-control' type='text' name='nama' value='$d[nama]' required placeholder='Masukkan Nama User'>
                            </div>
                        </div>
                        <div class='form-group form-row'>
                            <div class='form-group col-8'>
                                 <label for='password'>Password</label>
                                <input class='form-control' type='text' name='password' value='$d[password]' required placeholder='Masukkan Password User'>
                            </div>
                            <div class='form-gorup col-4'>
                                <label for='level'>Level</label>
                                <select class='form-control' name='level'>";
                                if($d["level"] == "admin"){
                                    echo "<option value='admin' selected>Admin</option>";
                                }else { echo "<option value='admin'>Admin</option>"; }

                                if($d["level"] == "karyawan"){
                                    echo "<option value='karyawan' selected>Karyawan</option>";
                                }else { echo "<option value='karyawan'>Karyawan</option>"; }

                                echo"
                                </select>                            
                            </div>
                        </div>
                            <input type='hidden' name='button' value='edit'>                        
                            <input type='submit' value='Simpan' name='simpan' class='btn btn-info' style='width:100%'>
                    </form>
                    </div>
                </div>

                <div class='col-2'></div>";

            }
            else{
                /* form input data user */ 
                echo "
                <div class='col-2'></div>

                <div class='col-lg-8 ml-auto mt-1' data-aos='fade-up' data-aos-delay='100'>
                    <div class='form-box' style='color:black'>
                    <h3 class='h4 text-black mb-2'>Input Data User</h3>
                    <form action='../controller/controller_user.php' method='post'>
                        <div class='form-row'>
                            <div class='form-group col-12'>
                                <label for='username'>Username</label>
                                <input class='form-control' type='text' name='username' required placeholder='Masukkan Username'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-12'>
                                <label for='nama'>Nama</label>
                                <input class='form-control' type='text' name='nama' required placeholder='Masukkan Nama User'>
                            </div>
                        </div>
                        <div class='form-group form-row'>
                            <div class='form-group col-8'>
                                 <label for='password'>Password</label>
                                <input class='form-control' type='text' name='password' required placeholder='Masukkan Password'>
                            </div>
                            <div class='form-gorup col-4'>
                                <label for='level'>Level</label>
                                <select class='form-control' name='level'>
                                    <option selected>Pilih Level Akun</option>
                                    <option value='admin'>Admin</option>
                                    <option value='karyawan'>Karyawan</option>
                                </select>
                            </div>
                        </div>
                            <input type='hidden' name='button' value='simpan'>                        
                            <input type='submit' value='Simpan' name='simpan' class='btn btn-info' style='width:100%'>
                        <p style='color:red'>$pesan</a>
                    </form>
                    </div>
                </div>

                <div class='col-2'></div>";
            }
        ?>

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
