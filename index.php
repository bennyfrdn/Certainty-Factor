<?php 

include "config/koneksi.php";
include "config/fungsi.php";

$page = 'home.php';
if (!empty($_GET['p'])) {
    if ($_GET['p'] == 'gejala') {
        $page = 'gejala.php';
    }elseif ($_GET['p'] == 'gejala_form') {
        $page = 'gejala_form.php';
    }elseif ($_GET['p'] == 'gejala_update') {
        $page = 'gejala_update.php';
    }elseif ($_GET['p'] == 'gangguan') {
        $page = 'gangguan.php';
    }elseif ($_GET['p'] == 'gangguan_form') {
        $page = 'gangguan_form.php';
    }elseif ($_GET['p'] == 'pengetahuan') {
        $page = 'pengetahuan.php';
    }elseif ($_GET['p'] == 'gangguan_update') {
        $page = 'gangguan_update.php';
    }elseif ($_GET['p'] == 'pengetahuan_form') {
        $page = 'pengetahuan_form.php';
    }elseif ($_GET['p'] == 'diagnosa') {
        $page = 'diagnosa.php';
    }elseif ($_GET['p'] == 'pemeriksaan') {
        $page = 'pemeriksaan.php';
    }elseif ($_GET['p'] == 'detail') {
        $page = 'detail.php';
    }elseif ($_GET['p'] == 'tentang') {
        $page = 'tentang.php';
    }elseif ($_GET['p'] == 'bantuan'){
        $page = 'bantuan.php';
    }elseif ($_GET['p'] == 'keterangan') {
        $page = 'keterangan.php';
    }elseif ($_GET['p'] == 'det_penyakit') {
        $page = 'det_penyakit.php';
    }elseif ($_GET['p'] == 'resetpwd') {
        $page = 'password_form.php';
    }elseif ($_GET['p'] == 'pakar') {
        $page = 'pakar.php';
    }elseif ($_GET['p'] == 'pakar_form') {
        $page = 'pakar_form.php';
    }elseif ($_GET['p'] == 'pakar_update') {
        $page = 'pakar_update.php';
    }elseif ($_GET['p'] == 'kondisi') {
        $page = 'kondisi.php';
    }elseif ($_GET['p'] == 'kondisi_form') {
        $page = 'kondisi_form.php';
    }elseif ($_GET['p'] == 'user') {
        $page = 'user.php';
    }elseif ($_GET['p'] == 'user_update') {
        $page = 'user_update.php';
    }elseif ($_GET['p'] == 'profilpakar_update') {
        $page = 'profilpakar_update.php';
    }
}
else
{
    $page = 'home.php';
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="SPK Penyakit dan Hama Pada Pelepah dan Daun Kelapa Sawit" />
        <meta name="author" content="Beni Frandian" />
        <title>Welcome - <?=$namaapp?></title>
        <link rel="icon" href="style/img/dokter.png">

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="style/css/styles.css" rel="stylesheet" />
        <link href="style/css/wizard.css" rel="stylesheet" />
        <link href="style/css/slider.css" rel="stylesheet"  media="all">
        <link href="style/css/owl-carousel/owl.carousel.css" rel="stylesheet"  media="all">
        <link href="style/css/owl-carousel/owl.theme.css" rel="stylesheet"  media="all">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3 text-center" href="index.php"><?=$namaapp?></a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" style="display: none;">
                <div class="input-group" style="display: none;">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <?php if ($_SESSION['login'] == 'true') { ?> 
                  
                <?php if ($_SESSION['level'] == 'pakar') { ?>   
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?=ucwords($_SESSION['nama'])?> </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                         <li><a class="dropdown-item" href='?p=profilpakar_update&b=update&id=<?=$d['idpakar']?>'>Ubah Profil</a></li>

                        <li><a onclick="return confirm('apakah anda yakin ?')" class="dropdown-item" href="logout.php">Logout</a></li>

                         <li><a class="dropdown-item" href="https://api.whatsapp.com/send?phone=6282367053696&text=Hallo%20Admin%20Dokter Sawit">Hubungi Kami</a></li>

                    </ul>
                </li>
                <?php }?>


                <?php if ($_SESSION['level'] == 'admin') { ?>   
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?=ucwords($_SESSION['nama'])?> </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                        <li><a onclick="return confirm('apakah anda yakin ?')" class="dropdown-item" href="logout.php">Logout</a></li>

                    </ul>
                </li>
                <?php }?>

                 <?php if ($_SESSION['level'] == 'user') { ?>   

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?=ucwords($_SESSION['nama'])?> </a>

                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                        <li><a class="dropdown-item" href='?p=user_update&b=update&id=<?=$d['iduser']?>'>Ubah Profil</a></li>

                        <li><a onclick="return confirm('apakah anda yakin ?')" class="dropdown-item" href="logout.php">Logout</a></li>

                        <li><a class="dropdown-item" href="https://api.whatsapp.com/send?phone=6282367053696&text=Hallo%20Admin%20Dokter Sawit">Hubungi Kami</a></li>

                    </ul>
                </li>
                <?php }

                }else{ ?> 
                <li class="nav-item dropdown">
                    <a  class="nav-link " id="navbarDropdown" href="login.php" ><i class="fa fa-sign-out-alt fa-fw"></i> Login</a>
                </li>

                <?php } ?>
            </ul>
        </nav>
        <div id="layoutSidenav">
            
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark"  id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-home"></i></div>
                                Beranda
                            </a>

                            <?php if ($_SESSION['level'] == 'admin') { ?> 

                             
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-columns"></i></div>
                                Manage Akun
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down" style="color:#C2C7D0"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion ">
                                <nav class="sb-sidenav-menu-nested nav">
                                   <a class="nav-link" href="?p=pakar" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-user-tie"></i></div>
                                Data Pakar
                            </a>
                            <a class="nav-link" href="?p=user" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-users"></i></div>
                                Data User
                            </a>
                                </nav>
                            </div>


                            
                            <a class="nav-link" href="?p=gejala" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-syringe"></i></div>
                                Gejala
                            </a>
                            <a class="nav-link" href="?p=gangguan" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-tasks"></i></div>
                                Penyakit dan Hama
                            </a>
                            <a class="nav-link" href="?p=pengetahuan" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-book-medical"></i></div>
                                Basis Pengetahuan
                            </a>
                            <a class="nav-link" href="?p=kondisi" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-edit"></i></div>
                                Bobot
                            </a>
                            <a class="nav-link" href="?p=pemeriksaan" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-history"></i></div>
                                Hasil Pemeriksaan
                            </a>
                            <a class="nav-link" href="?p=resetpwd" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon"style="color:#C2C7D0"><i class="fas fa-key"></i></div>
                                Ubah Password
                            </a>
                             <?php } ?> 

                            <?php if ($_SESSION['level'] == 'pakar') { ?> 
                            <a class="nav-link" href="?p=user" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-users"></i></div>
                                Data User
                            </a>
                            <a class="nav-link" href="?p=gejala" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-syringe"></i></div>
                                Gejala
                            </a>
                            <a class="nav-link" href="?p=gangguan" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-tasks"></i></div>
                                Penyakit dan Hama
                            </a>
                            <a class="nav-link" href="?p=pengetahuan" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-book-medical"></i></div>
                                Basis Pengetahuan
                            </a>
                            <a class="nav-link" href="?p=kondisi" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-edit"></i></div>
                                Bobot
                            </a>
                            <a class="nav-link" href="?p=pemeriksaan" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-history"></i></div>
                                Hasil Pemeriksaan
                            </a>
                            <a class="nav-link" href="?p=resetpwd" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon"style="color:#C2C7D0"><i class="fas fa-key"></i></div>
                                Ubah Password
                            </a>
                            
                            <?php } ?> 
                            <?php if ($_SESSION['level'] == 'user') { ?> 
                            <a class="nav-link" href="?p=diagnosa" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-flask"></i></div>
                                Diagnosis
                            </a>
                            <a class="nav-link" href="?p=pemeriksaan" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-history"></i></div>
                                Riwayat Pemeriksaan
                            </a>
                            <a class="nav-link" href="?p=resetpwd" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-key"></i></div>
                                Ubah Password
                            </a>
                            <?php } ?> 
                            
                            <a class="nav-link" href="?p=keterangan" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fas fa-comment"></i></div>
                                Keterangan
                            </a>
                            <a class="nav-link" href="?p=tentang" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="fa fa-info-circle"></i></div>
                                Tentang
                            </a>

                            <?php if ($_SESSION['level'] == 'user') { ?> 

                              <a class="nav-link" href="?p=bantuan" style="color:#C2C7D0">
                                <div class="sb-nav-link-icon" style="color:#C2C7D0"><i class="far fa-question-circle"></i></div>
                                Bantuan
                            </a>
                              <?php } ?> 
                        </div>
                    </div>
                </nav>
            </div>
            
            <div id="layoutSidenav_content">
                <?php include "page/".$page; ?>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; <b><?=$namaapp?> </b>- <?=$tahunapp?></div>
                            <div>
                                <div class="text-muted">Author <b><?=$authorapp?></b></div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="style/js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <!-- <script src="style/assets/demo/chart-area-demo.js"></script> -->
        <!-- <script src="style/assets/demo/chart-bar-demo.js"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="style/js/datatables-simple-demo.js"></script>
        <script src="style/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
        <script src="https://cdn.ckeditor.com/ckeditor5/1.0.0-alpha.2/classic/ckeditor.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        
        <?php
        $arr    = [];
        $name   = [];
        $sql    = mysqli_query($con," SELECT nama_gangguan, COUNT(hasil.idgangguan) as jumlah FROM hasil JOIN gangguan on hasil.idgangguan = gangguan.idgangguan
                                        GROUP BY gangguan.idgangguan
                                    ");
        while ($s = mysqli_fetch_array($sql)) {
            array_push($arr, $s['jumlah']);
            array_push($name, $s['nama_gangguan']);
        }
        ?>
        <script>
        $( document ).ready(function() {
           $('#pengembang').hide();
           $('#pakar1').hide();
           $('#pakar2').hide();
        });
        function pengembang()
        {
            $('#pengembang').show();
            $('#pakar1').hide();
            $('#pakar2').hide();
        }
        function pakar1()
        {
            $('#pakar1').show();
            $('#pengembang').hide();
            $('#pakar2').hide();
        }
        function pakar2()
        {
            $('#pakar2').show();
            $('#pengembang').hide();
            $('#pakar1').hide();
        }
        function printContent(el){
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?=json_encode($name)?>,
                datasets: [{
                    label: 'Jumlah',
                    data: <?=json_encode($arr)?>,
                    backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 103, 160, 0.2)',
                    'rgba(54, 169, 243, 0.2)',
                    'rgba(255, 220, 99, 0.2)',
                    'rgba(75, 198, 198, 0.2)',
                    'rgba(153, 113, 265, 0.2)',
                    'rgba(280, 226, 99, 0.2)',
                    'rgba(80, 199, 198, 0.2)',
                    'rgba(170, 119, 265, 0.2)',
                    ],
                    borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 103, 160, 1)',
                    'rgba(54, 169, 243, 1)',
                    'rgba(255, 220, 99, 1)',
                    'rgba(75, 198, 198, 1)',
                    'rgba(153, 113, 265, 1)',
                      'rgba(280, 226, 99, 1)',
                    'rgba(80, 199, 198, 1)',
                    'rgba(170, 119, 265, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
</script>


        <!-- script ini dijalankan saat menjalankan menu diagnosa -->
        <?php if ($_GET['p'] == 'diagnosa') { ?>
        <script>
        $( document ).ready(function() {
           $.ajax({
                 type: "GET",
                 url: 'page/diagnosa_proses.php?aksi=awal',
                 dataType: 'html',
                 success: function(res){
                    $('#viewitem').html(res);
                 }
            });
        });

        function ganti(no,isi)
        {
            var kdgejala    = $('#gejala'+no).val();
            var kode        = $('#kode').val();            
            $.ajax({
                 type: "POST",
                 url: 'page/diagnosa_proses.php?aksi=ubah',
                 data: { 'kdgejala':kdgejala,'isi':isi, 'kode':kode },
                 // dataType: 'html',
                 success: function(res){
                    $('#viewitem').html(res);
                    // console.log(res)
                 }
            });
        }
        </script>
        <?php } ?>
        <script>
            function views()
            {
                var x = document.getElementById("view");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>
    </body>
</html>