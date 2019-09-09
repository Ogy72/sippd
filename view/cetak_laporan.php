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
        $nama = $_COOKIE["nama"];
        $nama = $_COOKIE['nama'];
        $level = $_COOKIE['level'];

        if($level !== "admin"){
            header("location:../index.php");
        }
    ?>

  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
<div class="site-wrap">
    <!-- home section -->
    <div class="intro-section" id="home-section">
    
        <div class="container">
            <div class="row set-top" style="padding-top:110px">
                <div class="col-12">
                    <div class="row">
                        <!-- Data Kertas -->
                        <div class="col-lg-12 ml-auto mt-1" style='color:black' data-aos="fade-up" data-aos-delay="100">
                            <div class="form-box">
                            <?php
                                if(isset($_GET["lap"])){
                                    $laporan_data_kertas = $laporan->data_kertas();
                                    $date_now = date('d F Y');
                                    echo "
                                    <h3 class='text-black mb-2'>Laporan Data Kertas</h3>
                                    <h5 class='text-black mb-2'>Foto Copy Sinar Putri</h5>
                                    <h6 class='text-black mb-3'>Tanggal : $date_now</h6>
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
                                    <div class='float-right mt-4 text-center'>
                                        <h6 class='text-black mb-4'>Samarinda, ". date('d F Y')."</h6><br>
                                        <h6 class='text-muted'> ............... </h6>
                                        <h6 class='text-black'>$nama</h6>
                                    </div>";
                                }
                                else{
                                    $laporan->tanggal_awal = $_GET["date_start"];
                                    $laporan->tanggal_akhir = $_GET["date_end"]; 
                                    $laporan_pendapatan = $laporan->pendapatan();
                                    echo "
                                    <h3 class='text-black mb-2'>Laporan Pendapatan</h3>
                                    <h5 class='text-black mb-2'>Foto Copy Sinar Putri</h5>
                                    <h6 class='text-black mb-3'>Periode : ". date('d F Y', strtotime($laporan->tanggal_awal))." - ". date('d F Y', strtotime($laporan->tanggal_akhir))."</h6>
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
                                        echo"
                                            <tr>
                                                <td>$p[date]</td>
                                                <td>$p[kd_pesanan]</td>
                                                <td>$p[jenis_doc]</td>
                                                <td>$p[total_biaya]</td>
                                            </tr>";
                                        }
                                        $total = $laporan->total_pendapatan();
                                        foreach($total as $t){
                                        echo "
                                           <tr>
                                                <td colspan='3'>Total Pendapatan</td>
                                                <td colspan='3'>$t[total]</td>
                                            </tr> ";
                                        }
                                        echo"
                                        </tbody>
                                    </table>
                                    <div class='float-right mt-4 text-center'>
                                        <h6 class='text-black mb-4'>Samarinda, ". date('d F Y')."</h6><br>
                                        <h6 class='text-muted'> ............... </h6>
                                        <h6 class='text-black'>$nama</h6>
                                    </div>";
                                }
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
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
            window.print();
        </script>
  </body>
</html>
