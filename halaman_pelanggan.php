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
        $email = $_COOKIE['email'];
        $nama = $_COOKIE['nama'];
        $level = $_COOKIE['level'];
        $pesan = "";

        if($level !== "pelanggan"){
            header("location:index.php");
        }

        include_once "model/class_informasi.php";
        $inf = new informasi();

        if(isset($_GET["msg"])){
            $msg = $_GET["msg"];
            if($msg == "unstok"){
                $pesan = "*Mohon Maaf Kertas Sedang Tidak Tersedia/Habis";
            }
            else { $pesan == ""; }
        }

    ?>
  </head>
  <body data-spy='scroll' data-target='.site-navbar-target' data-offset='300'>
  
  <div class='site-wrap'>

    <!-- mobile menu -->
    <div class='site-mobile-menu site-navbar-target'>
        <div class='site-mobile-menu-header'>
            <div class='site-mobile-menu-close mt-3'>
                <span class='icon-close2 js-menu-toggle'></span>
            </div>
        </div>
        <div>
          <ul class='site-menu main-menu js-clone-nav mx-auto d-lg-block  m-0 p-0'>
            <li class='nav-link'><a href='#promo-section' >Promo Sinar Putri</a></li>
            <li class='nav-link'><a href='#informasi-section'>Informasi Terbaru</a></li>
            <li class="nav-item dropdown nav-link">
                <a class="dropdown-toggle" href="#" data-toggle="dropdown">
                    <?php echo $nama; ?>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="view/pesanan_saya.php">Pesanan Saya</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="view/manage_akun.php?usr=<?php echo $username ?>">Manage Akun</a>
                    <a class="dropdown-item" href="logout.php">Logout</a>
                </div>
                <li class="cta nav-link"><a href="#contact-section"><span>Hubungi Kami</span></a></li>
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
                <li><a href='#promo-section' class='nav-link'>Promo Sinar Putri</a></li>
                <li><a href='#informasi-section' class='nav-link'>Informasi Terbaru</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                        <?php echo $nama; ?>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="view/pesanan_saya.php">Pesanan Saya</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="view/manage_akun.php?usr=<?php echo $username ?>">Manage Akun</a>
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
    
      <div class="slide-1" style="background-image: url('images/hero_1.jpg'); overflow:auto;" data-stellar-background-ratio="0.5">
        <div class="container">
          <div class="row set-top" style="padding-top:180px">
            <div class="col-12">

              <div class="row">
                <?php 
                    include_once "model/class_pemesanan.php";
                    $psn = new pemesanan();
                    $date = date('Y-m-d');
                ?>
                
                <!-- from login -->
                <div class="col-12 col-sm-12 col-lg-12 ml-auto mt-3" data-aos="fade-up" data-aos-delay="500">
                  <form action="controller/controller_pesanan.php" method="post" class="form-box" enctype='multipart/form-data'>
                    <div class='form-row'>
                        <h3 class="h4 text-black col-12 col-sm-3 col-lg-3">From Pemesanan</h3>
                        <div class="col-12 col-sm-5 col-lg-5 text-form text-small text-danger"><?php echo $pesan ?></div>
                        <div class='form-group col-12 col-sm-4 col-lg-4'>
                            <input type='text' name='kd_pesanan' class='form-control-plaintext text-right text-black-50' value='<?php echo $psn->auto_kd() ?>' readonly>
                            <input type='hidden' name='username' value='<?php echo $username; ?>'>
                            <input type='hidden' name='date' value="<?php echo $date; ?>">
                        </div>
                    </div>
                    <div class='form-group row'>
                        <div class='form-group col-12 col-sm-3 col-lg-3'>
                            <label for='file' class='text-body'>Unggah File Dokumen</label>
                            <input class='form-control-file' type="file" name='file' required>
                        </div>
                        <div class='form-group col-12 col-sm-3 col-lg-3'>
                            <label for='jenisdoc' class='text-body'>Pilih Jenis Dokumen</label>
                            <select class='form-control' name='jenis_doc' id='jenis-doc' required>
                                <option selected>Jenis Dokumen</option>
                                <option value="Skripsi">Skripsi</option>
                                <option value="Makalah Hard Cover">Makalah Hard Cover</option>
                                <option value="Makalah Soft Cover">Makalah Soft Cover</option>
                                <option value="Buku Hard Cover">Buku Hard Cover</option>
                                <option value="Buku Soft Cover">Buku Soft Cover</option>
                                <option value="Browsur">Browsur</option>
                            </select>
                        </div>
                        <div class='form-group col-12 col-sm-3 col-lg-3'>
                            <label for='halaman' class='text-body'>Jumlah Halaman</label>
                            <input class='form-control' type="text" name='halaman'  placeholder='Masukkan Jumlah Halaman' required>
                        </div>
                        <div class='form-group col-12 col-sm-3 col-lg-3'>
                            <label for='copy' class='text-body'>Jumlah Copy</label>
                            <input class='form-control' type="text" name='copy'  placeholder='Banyaknya dokumen dicetak ?' required>
                        </div>
                    </div>
                    <div class='form-group row'>
                        <div class='form-group col-12 col-sm-3 col-lg-3'>
                            <label for='kertas' class='text-body'>Pilih Kertas & Ukuran</label>
                            <select class='form-control' name='kertas' required>
                            <optgroup label='kertas HVS'>
                            <?php
                                $rd_hvs = $psn->read_hvs();
                                foreach($rd_hvs as $h){
                                    echo "
                                    <option value='$h[kd_kertas]'>$h[jenis] - $h[ukuran]($h[ketebalan])</option>";
                                }
                            ?>
                            </optgroup>
                            <optgroup label='kertas Browsur'>
                            <?php
                                $rd_browsur = $psn->read_art();
                                foreach($rd_browsur as $b){
                                    echo "
                                    <option value='$b[kd_kertas]'>$b[jenis] - $b[ukuran]($b[ketebalan])</option>";
                                }
                            ?>
                            </optgroup>
                            </select>
                        </div>
                        <div class='form-group col-12 col-sm-3 col-lg-3 cover'>
                            <label for='Cover' class='text-body'>Pilih Cover</label>
                            <select class='form-control' name='cover'>
                            <option value='' selected>Pilih Cover</option>
                            <optgroup label='Soft Cover Mika'>
                            <?php
                                $cover_mika = $psn->cover_mika();
                                foreach($cover_mika as $m){
                                    echo "
                                    <option value='$m[kd_kertas]'>$m[jenis] - $m[ukuran]($m[warna])</option>";
                                }
                            ?>
                            </optgroup>
                            <optgroup label='Soft Cover Karton'>
                            <?php
                                $cover_karton = $psn->cover_karton();
                                foreach($cover_karton as $ck){
                                    echo "
                                    <option value='$ck[kd_kertas]'>$ck[jenis] - $ck[ukuran]($ck[warna])</option>";
                                }
                            ?>
                            </optgroup>
                            <optgroup label='Hard Cover'>
                            <?php
                                $hard_cover = $psn->hard_cover();
                                foreach($hard_cover as $hc){
                                    echo "
                                    <option value='$hc[kd_kertas]'>$hc[jenis] - $hc[ukuran]($hc[warna])</option>";
                                }
                            ?>
                            </optgroup>
                            <optgroup label='Cover Buku'>
                            <?php
                                $cover_buku = $psn->cover_buku();
                                foreach($cover_buku as $cb){
                                    echo "
                                    <option value='$cb[kd_kertas]'>$cb[jenis] - $cb[ukuran]($cb[warna])</option>";
                                }
                            ?>
                            </optgroup>
                            </select>
                        </div>
                        <div class='form-group col-12 col-sm-3 col-lg-3'>
                            <label for='jenis-print' class='text-body'>Pilih Jenis Print</label>
                            <select class='form-control' name='jenis_print' required>
                                <option value="Berwarna">Berwarna</option>
                                <option value="Hitam Putih">Hitam - Putih</option>
                            </select>
                        </div>
                        <div class='form-group col-12 col-sm-3 col-lg-3'>
                            <label for='pengiriman' class='text-body'>Pilih Metode Pengiriman</label>
                            <select class='form-control' name='kurir' required>
                                <?php
                                    $rd_kurir = $psn->read_kurir();
                                    foreach($rd_kurir as $kur){
                                    echo"
                                    <option value='$kur[id_kurir]'>$kur[label_kurir]</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-row mt-sm-4">
                        <div class='form-group col-12 col-sm-12 col-lg-12 '>
                            <input type="submit" name="order" class="btn btn-primary float-right" value="Order">
                        </div>
                    </div>
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
                            <a href='view/view-informasi.php?id=$d[id]' class='btn-sm btn-primary'>Baca Selengkapnya</a>
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
                    <p class='mb-4 text-justify'>$konten</p>
                    <div class='d-flex align-items-center custom-icon-wrap mb-3'>
                        <div>
                            <a href='view/view-informasi.php?id=$dat1[id]'>Baca Selengkapnya ...</a> 
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
                            <a href='view/view-inforamsi.php?id=$dat2[id]'>Baca Selengkapnya ...</a> 
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
                            <a href='view/view-informasi.php?id=$dat3[id]'>Baca Selengkapnya ...</a> 
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

            </div>


          </div>
          <div class="col-lg-7 align-self-end"  data-aos="fade-left" data-aos-delay="200">
            <img src="images/person_transparent.png" alt="Image" class="img-fluid">
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

<script>
            $(document).ready(function(){
                $('#jenis-doc').change(function(){
                    if($('#jenis-doc').val() == "Browsur"){
                        $('.cover').hide();
                    }
                    else{ $('.cover').show(); }
                })
            })

</script>
    
  </body>
</html>
