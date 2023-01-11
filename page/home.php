<main>
    <div class="container-fluid px-4">
        <br>
        <div class="card">
            <div class="card-body" style="box-shadow: 0px -4px darkgray ;">
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-primary text-white mb-4">
                            <div class="card-body text-center"><h2><?=$jgejala['jumlah']?></h2></span></div>
                            <div class="card-footer">
                                <center><span>Total Gejala</span></center>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body text-center"><h2><?=$jpenyakit['jumlah']?></h2></div>
                            <div class="card-footer">
                                <center><span>Total Penyakit dan Hama</span></center>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body text-center"><h2><?=$jpengetahuan['jumlah']?></h2></div>
                            <div class="card-footer">
                                <center><span>Total Basis Pengetahuan</span></center>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-danger text-white mb-4">
                            <div class="card-body text-center"><h2><?=$jpakar['jumlah']?></h2></div>
                            <div class="card-footer">
                                <center><span>Total Pakar</span></center>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

                <div class="slider">
                    <figure>
                        <div class="slide">
                            <img src="style/banner/banner5.jpg">
                        </div>

                         <div class="slide">
                            <img src="style/banner/banner8.jpg">
                        </div>
                     
                        <div class="slide">
                            <img src="style/banner/banner11.jpg">
                        </div>

                        <div class="slide">
                            <img src="style/banner/banner9.jpg">
                        </div>

                        <div class="slide">
                            <img src="style/banner/banner12.png">
                        </div>
                    </figure>
                </div>

                

                <div class="row">
                <div class="col-sm-4 text-center padding wow fadeIn animated" data-wow-duration="1000ms" data-wow-delay="300ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 300ms; animation-name: fadeIn;">
                    <div class="single-service">
                     
                            <img src="style/icon/berondolan.png" alt="">
                      
                        <h2>Kelapa Sawit</h2>
                        <p>Kelapa sawit adalah tumbuhan industri/ perkebunan yang berguna
                        sebagai penghasil minyak masak, minyak industri, maupun bahan bakar.</p>
                    </div>
                </div>
                
                <div class="col-sm-4 text-center padding wow fadeIn animated" data-wow-duration="1000ms" data-wow-delay="600ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 600ms; animation-name: fadeIn;">
                    <div class="single-service">
                       
                            <img src="style/icon/icon33.png" alt="">
                        
                        <h2>Sahabat Petani</h2>
                        <p>Sistem Pakar ini diharapkan akan terus di sesuaikan pengetahuanya dengan jenis penyakit dan jenis hama kelapa sawit dimasa yang akan datang</p>
                    </div>
                </div>

                <div class="col-sm-4 text-center padding wow fadeIn animated" data-wow-duration="1000ms" data-wow-delay="900ms" style="visibility: visible; animation-duration: 1000ms; animation-delay: 900ms; animation-name: fadeIn;">
                    <div class="single-service">
                            <img src="style/icon/admin.png" alt="">
                        <h2>Admin Pakar</h2>
                        <p>Terdapat fitur admin pakar, untuk mengatur pengetahuan dan nilai keyakinan pakar, telah di sesuaikan tampilannya sehingga pakar bisa lebih mengeksplore aplikasi.</p>
                    </div>
                </div>
            </div>

            </div>

        </div>
    </div>
    <br>
    <div class="container-fluid px-4">
        <div class="card" style="border-color: #34495E;">
            <div class="card-header" style="background-color: #34495E; color: white;">
                Grafik Hasil Pemeriksaan
            </div>
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>            
</main>

<br>
<div>
     <h3 class="text-center text-muted">Selamat Datang di <?=strtoupper($namaapp)?> <?=$tahunapp?> <br>
</div>



<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <?php if ($_GET['s'] == 'loginsukses') { ?>
            <script>
                const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

Toast.fire({
  icon: 'success',
  title: 'Anda Berhasil Login'
})
            </script>
        <?php } ?>

    