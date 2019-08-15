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
        include_once "../model/class_data_kertas.php";
        $kertas = new data_kertas();

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
                <li class="cta"><a href="data_kertas.php" class="nav-link"><span>Kembali</span></a></li>
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

                $form = $_GET["form"];
                $kertas->kd_kertas = $_GET["kd"];
                $d = $kertas->read_kd();

                echo "
                <!-- form edit data Kertas -->
                <div class='col-2'></div>

                <div class='col-lg-8 ml-auto mt-1' data-aos='fade-up' data-aos-delay='100'>
                    <div class='form-box' style='color:black'>
                    <h3 class='h4 text-black mb-2'>Edit Data Kertas</h3>
                    <form action='../controller/controller_kertas.php' method='post'>
                        <div class='form-row'>
                            <div class='form-group col-12'>
                                <label for='kd-kertas'>Kode Kertas</label>
                                <input class='form-control' type='text' name='kd_kertas2' value='$d[kd_kertas]' required placeholder='Masukkan Kode Kertas'>
                                <input type='hidden' name='kd_kertas' value='$d[kd_kertas]'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-4'>
                                <label for='jenis'>Jenis Kertas]</label>
                                <select class='form-control' name='jenis' required>";
                                if($d["jenis"] == "Soft Cover Mika"){
                                    echo "<option value='Soft Cover Mika' selected>Soft Cover Mika</option>";
                                }else{ echo "<option value='Soft Cover Mika'>Soft Cover Mika</option>";}

                                if($d["jenis"] == "Soft Cover Karton"){
                                    echo "<option value='Soft Cover Karton' selected>Soft Cover Karton</option>";
                                }else { echo "<option value='Soft Cover Karton'>Soft Cover Karton</option>";}

                                if($d["jenis"] == "Hard Cover"){
                                    echo "<option value='Hard Cover' selected>Hard Cover</option>";
                                }else{ echo "<option value='Hard Cover'>Hard Cover</option>";}

                                if($d["jenis"] == "HVS"){
                                    echo "<option value='HVS' selected>HVS</option>";
                                }else{ "<option value='HVS'>HVS</option>";}

                                if($d["jenis"] == "Art Paper"){
                                    echo "<option value='Art Paper' selected>Art Paper</option>";
                                }else{ echo "<option value='Art Paper'>Art Paper</option>";}

                                if($d["jenis"] == "Art Karton"){
                                    echo "<option value='Art Karton' selected>Art Karton</option>";
                                }else{ echo "<option value='Art Karton'>Art Karton</option>";}
                            echo "
                                </select>
                            </div>
                            <div class='form-group col-4'>
                                <label for='ukuran'>Ukuran Kertas</label>
                                <select class='form-control' name='ukuran' required>";
                                if($d["ukuran"] == "A3"){
                                    echo "<option value='A3' selected>A3</option>";
                                }else{ echo "<option value='A3'>A3</option>"; }

                                if($d["ukuran"] == "A4"){
                                    echo "<option value='A4' selected>A4</option>";
                                }else{ echo "<option value='A4'>A4</option>"; }

                                if($d["ukuran"] == "A5"){
                                    echo "<option value='A5' selected>A5</option>";
                                }else{ echo "<option value='A5'>A5</option>"; }

                                if($d["ukuran"] == "A6"){
                                    echo "<option value='A6' selected>A6</option>";
                                }else{ echo "<option value='A6'>A6</option>"; }

                                if($d["ukuran"] == "A7"){
                                    echo "<option value='A7' selected>A7</option>";
                                }else{ echo "<option value='A7'>A7</option>"; }

                                if($d["ukuran"] == "F4"){
                                    echo "<option value='F4' selected>F4</option>";
                                }else{ echo "<option value='F4'>F4</option>"; }
                            echo "
                                </select>
                            </div>
                            <div class='form-group col-4'>
                                <label for='tebal'>Ketebalan Kertas</label>
                                <select class='form-control' name='ketebalan' required>";
                                if($d["ketebalan"] == "70gsm"){
                                    echo "<option value='70gsm' selected>70gsm</option>";
                                }else{ echo "<option value='70gsm'>70gsm</option>"; }

                                if($d["ketebalan"] == "80gsm"){
                                    echo "<option value='80gsm' selected>80gsm</option>";
                                }else{ echo "<option value='80gsm'>80gsm</option>"; }

                                if($d["ketebalan"] == "150gsm"){
                                    echo "<option value='150gsm' selected>150gsm</option>";
                                }else{ echo "<option value='150gsm'>150gsm</option>"; }

                                if($d["ketebalan"] == "210gsm"){
                                    echo "<option value='210gsm' selected>210gsm</option>";
                                }else{ echo "<option value='210gsm'>210gsm</option>"; }
                            echo"
                                </select>
                            </div>
                        </div>
                        <div class='form-group form-row'>
                            <div class='col-12'>
                                <label for='stok'>Stok Kertas</label>
                                <input class='form-control' type='text' name='stok' value='$d[stok]' required placeholder='Masukkan Stok Kertas'>
                            </div>
                        </div>
                        <input type='submit' value='Simpan' name='edit' class='btn btn-info' style='width:100%'>
                        <p style='color:red'>$pesan</a>
                    </form>
                    </div>
                </div>

                <div class='col-2'></div>";

            }
            else{
                echo "
              
                <!-- form input data Kertas -->
                <div class='col-2'></div>

                <div class='col-lg-8 ml-auto mt-1' data-aos='fade-up' data-aos-delay='100'>
                    <div class='form-box' style='color:black'>
                    <h3 class='h4 text-black mb-2'>Input Data Kertas</h3>
                    <form action='../controller/controller_kertas.php' method='post'>
                        <div class='form-row'>
                            <div class='form-group col-12'>
                                <label for='kd-kertas'>Kode Kertas</label>
                                <input class='form-control' type='text' name='kd_kertas' required placeholder='Masukkan Kode Kertas'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-4'>
                                <label for='jenis'>Jenis Kertas</label>
                                <select class='form-control' name='jenis' required>
                                    <option selected>Pilih Jenis Kertas</option>
                                    <option value='Soft Cover Mika'>Soft Cover Mika</option>
                                    <option value='Soft Cover Karton'>Soft Cover Karton</option>
                                    <option value='Hard Cover'>Hard Cover</option>
                                    <option value='HVS'>HVS</option>
                                    <option value='Art Paper'>Art Paper</option>
                                    <option value='Art Karton'>Art Karton</option>
                                </select>
                            </div>
                            <div class='form-group col-4'>
                                <label for='ukuran'>Ukuran Kertas</label>
                                <select class='form-control' name='ukuran' required>
                                    <option selected>Pilih Ukuran Kertas</option>
                                    <option value='A3'>A3</option>
                                    <option value='A4'>A4</option>
                                    <option value='A5'>A5</option>
                                    <option value='A6'>A6</option>
                                    <option value='A7'>A7</option>
                                    <option value='F4'>F4</option>
                                </select>
                            </div>
                            <div class='form-group col-4'>
                                <label for='tebal'>Ketebalan Kertas</label>
                                <select class='form-control' name='ketebalan' required>
                                    <option selected>Pilih Ketebalan Kertas</option>
                                    <option value='70gsm'>70gsm</option>
                                    <option value='80gsm'>80gsm</option>
                                    <option value='150gsm'>150gsm</option>
                                    <option value='210gsm'>210gsm</option>
                                </select>
                            </div>
                        </div>
                        <div class='form-group form-row'>
                            <div class='col-12'>
                                <label for='stok'>Stok Kertas</label>
                                <input class='form-control' type='text' name='jumlah' required placeholder='Masukkan Stok Kertas Dalam Jumlah Satuan'>
                            </div>
                        </div>
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
