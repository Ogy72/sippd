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
        include_once "../model/class_laporan.php";
        $laporan = new laporan();

        $username = $_COOKIE["user"];
        $nama = $_COOKIE['nama'];
        $level = $_COOKIE['level'];

        if($level !== "admin"){
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
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">
      <div class="container-fluid">
        <div class="d-flex align-items-center">
          <div class="site-logo mr-auto w-25"><a href="../halaman_admin.php">Sinar Putri</a></div>

          <div class="ml-auto w-25">
            <nav class="site-navigation position-relative text-right" role="navigation">
              <ul class="site-menu main-menu site-menu-dark js-clone-nav mr-auto d-none d-lg-block m-0 p-0">
                <li class="cta"><a href="../halaman_admin.php" class="nav-link"><span>Beranda</span></a></li>
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
                <div class="col-lg-12 ml-auto mt-1" style='color:black' data-aos="fade-up" data-aos-delay="100">
                  <div class="form-box">
                    <h3 class="h4 text-black mb-3">Laporan</h3>
                        <form method='post' action='laporan.php'>
                        <div class='form-inline'>
                            <div class='form-group'>
                                <select class="form-control mr-3 mb-3 select-lap" name="pilih_laporan" style='height:35px;' required>
                                    <option value="" selected>Pilih Laporan</option>
                                    <option value="data_kertas">Laporan Data Kertas</option>
                                    <option value="pendapatan">Laporan Pendapatan</option>
                                </select>
                            </div>
                            <div class='form-group'>
                                <label for='date_start' class='mr-2 mb-3 date-start'>Pilih Tanggal Awal :</label>
                                <input type='date' class='form-control mr-3 mb-3 date-start' name='date_start' style='height:35px;'>
                            </div>
                            <div class='form-group'>
                                <label for='date_end' class='mr-2 mb-3 date-end'>Pilih Tanggal Akhir :</label>
                                <input type='date' class='form-control mr-3 mb-3 date-end' name='date_end' style='height:35px;'>
                            </div>
                            <input type='submit' name='laporan' value='Submit' class='btn-sm btn-primary mb-3'>
                        </div>
                        </form>
                    <?php
                        if(isset($_POST["laporan"])){
                            $laporan->tanggal_awal = $_POST["date_start"];
                            $laporan->tanggal_akhir = $_POST["date_end"];
                            $laporan->laporan = $_POST["pilih_laporan"];

                            if($laporan->laporan == "data_kertas"){
                                $laporan_data_kertas = $laporan->data_kertas();
                                echo "
                                    <table class='table table-bordered table-hover table-sm'>
                                        <thead class='thead-dark'>
                                        <tr>
                                            <th width='15%'>Kode Kertas</th>
                                            <th width='27%'>jenis</th>
                                            <th width='12%'>ukuran</th>
                                            <th width='12%'>ketebalan</th>
                                            <th width='10%'>stok</th>
                                            <th width='12%'>Terpakai</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                                    foreach($laporan_data_kertas as $dk){
                                        $laporan->kd_kertas = $dk["kd_kertas"];
                                        $terpakai = $laporan->hitung_terpakai();

                                        echo"
                                        <tr>
                                            <td>$dk[kd_kertas]</td>
                                            <td>$dk[jenis]</td>
                                            <td>$dk[ukuran]</td>
                                            <td>$dk[ketebalan]</td>
                                            <td>$dk[stok]</td>
                                            <td>$terpakai[terpakai]</td>
                                        </tr>";
                                    }
                                    echo"
                                    </tbody>
                                </table>
                                <a href='cetak_laporan.php?lap=lap_kertas' target='_blank' class='btn-sm btn-primary float-right'>Cetak Laporan</a>";
                            }
                            else{ 
                                $laporan_pendapatan = $laporan->pendapatan();
                                echo "
                                    <table class='table table-bordered table-hover table-sm'>
                                        <thead class='thead-dark'>
                                        <tr>
                                            <th width='25%'>Tanggal</th>
                                            <th width='25%'>Pesanan</th>
                                            <th width='25%'>Jenis Dokumen</th>
                                            <th width='25%'>Total Biaya</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                                    foreach($laporan_pendapatan as $p){
                                        $total = $laporan->total_pendapatan() ;
                                        
                                        echo"
                                        <tr>
                                            <td>$p[date]</td>
                                            <td>$p[kd_pesanan]</td>
                                            <td>$p[jenis_doc]</td>
                                            <td>$p[total_biaya]</td>
                                        </tr>
                                       <tr>
                                            <td colspan='3'>Total Pendapatan</td>
                                            <td colspan='3'>$total[total]</td>
                                        </tr> ";
                                    }
                                    echo"
                                    </tbody>
                                </table>
                                <a href='cetak_laporan.php?date_start=$laporan->tanggal_awal&date_end=$laporan->tanggal_akhir' target='_blank' class='btn-sm btn-primary float-right'>Cetak Laporan</a>";
                            }
                        }
                                        
                    ?>
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

<script>
$(document).ready(function(){

    $('.date-start').hide();
    $('.date-end').hide();

    $('.select-lap').change(function(){
        var laporan = $('.select-lap').val();
        if((laporan) == ""){
            $('.date-start').hide();
            $('.date-end').hide();
        }
        else if((laporan) == "pendapatan"){
             $('.date-start').show();
            $('.date-end').show();
        }
         else{
             $('.date-start').hide();
            $('.date-end').hide();
        }
    })
    
})
</script>
    
  </body>
</html>
