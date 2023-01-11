<?php
//untuk halaman detail hasil diagnosis 

 if (isset($_SESSION['nama']) == 0) {
    header('location:index.php');
    }


$kode   = $_GET['id'];
$cek    = mysqli_query($con," SELECT * FROM hasil 
                            JOIN gangguan on hasil.idgangguan = gangguan.idgangguan 
                            WHERE hasil.kode = '$kode'");

$c = mysqli_fetch_assoc($cek);
$idpenyakit = $c['idgangguan'];
$list   = mysqli_query($con," SELECT * FROM diagnosa 
                            JOIN gejala on diagnosa.idgejala = gejala.idgejala 
                            JOIN kondisi on diagnosa.cfuser = kondisi.cfuser 
                            WHERE diagnosa.kode_diagnosa = '$kode' order by gejala.idgejala asc"); 
$gejalapilihan   = mysqli_query($con," SELECT * FROM diagnosa 
                            JOIN gejala on diagnosa.idgejala = gejala.idgejala 
                            JOIN kondisi on diagnosa.cfuser = kondisi.cfuser 
                            WHERE diagnosa.kode_diagnosa = '$kode' order by gejala.idgejala asc"); 


?>
<main >
    <div class="container-fluid px-4">
        <br>
        <button style="color:white" class="btn btn-danger btn-sm" onclick="printContent('cetak')" ><i class="fas fa-print"></i> Print hasil pemeriksaan</button>
        <br><br>
        <div class="card" id="cetak">
            <div class="card-body">
                <h4 class="text-primary">Inferensi Forward Chaining</h4><br>
                <div class="rental-manager-progress-bar-container">
                    <?php while ($rows = mysqli_fetch_object($gejalapilihan)) { ?>
                        <div ><?=$rows->idgejala?></div>
                    <?php } ?>
                </div>
                <br>
                <hr>
                

                <!-- </div> -->
                <h4 class="text-center" style="color:#036ffc">Hasil Diagnosis #<?=$c['kode']?></h4>
                <br>
                <table class="table table-bordered text-center table-striped" style="border-color: #9003fc;">
                    <thead style="background-color: #9003fc; color:white">
                        <th style="text-align: center;" width="1%">No</th>
                        <th style="text-align: center;" width="10%">Kode</th>
                        <th style="text-align: center;">Gejala yang dialami</th>
                        <th style="text-align: center;">Pilihan Keyakinan</th>
                        <th style="text-align: center;">Bobot</th>
                    </thead>
                    <tbody>
                        <?php 
                        $no     = 1;
                        while ($d = mysqli_fetch_array($list)) { ?>
                             <tr>
                                <td><?=$no++?></td>
                                <td style="text-align: center;"><?=ucwords($d['idgejala'])?></td>
                                <td style="text-align: left;"><?=ucwords($d['gejala'])?></td>
                                <td style="text-align: left;"><?=$d['kondisi']?></td>
                                <td style="text-align: center;"><?=$d['cfuser']?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
                <button id="btnviews" onclick="views()" type="button" class="btn btn-info btn-sm text-white">Tampilkan Perhitungan</button>
                <div id="view" style="display:none">
                <hr> 
                <?php  //cek pada table diagnosis dengen kode tersebut dan nilai cfrule > 0
                $array      = [];
                $posisi     = [];
                $dthasil    = [];
                $dtsakit    = [];
                $z          = 1;
                $pilihgangguan = mysqli_query($con," SELECT gangguan.idgangguan,gangguan.nama_gangguan FROM diagnosa 
                                            JOIN pengetahuan on diagnosa.idgejala = pengetahuan.idgejala 
                                            JOIN gejala on pengetahuan.idgejala = gejala.idgejala 
                                            JOIN gangguan on pengetahuan.idgangguan = gangguan.idgangguan 
                                            WHERE cfuser > 0 AND kode_diagnosa = '$kode' GROUP BY gangguan.idgangguan  ");
                //cari gejala yang dipilih user berdasarkan penyakit yang sesuai (dikelompokan)
                while ($p = mysqli_fetch_array($pilihgangguan)) {
                    $idpenyakit = $p['idgangguan'];
                    $gejala     = mysqli_query($con," SELECT diagnosa.idgejala,gejala, cfuser * cf as cfgejala FROM diagnosa 
                                                        JOIN pengetahuan on diagnosa.idgejala = pengetahuan.idgejala 
                                                        JOIN gejala on pengetahuan.idgejala = gejala.idgejala 
                                                        JOIN gangguan on pengetahuan.idgangguan = gangguan.idgangguan 
                                                        WHERE cfuser > 0 AND kode_diagnosa = '$kode' AND pengetahuan.idgangguan = '$idpenyakit'
                                                    ");
                    $data = [];
                    $i = 1;
                    //masukan data CF [H,E] kedalam array
                    while ($g = mysqli_fetch_array($gejala)) {
                        $data[$i++] = $g['cfgejala'];
                    }

                    $akhir = 0;
                    //jika jumlah gejala berdasarkan penyakit hanya 1 maka nilai cfall yang digunakan
                    if (mysqli_num_rows($gejala) == 1) {
                       $akhir = $data[1];
                    }

                    //jika jumlah gejala berdasarkan penyakit hanya 2 maka rumusnya jadi /CF(A) = CF(1) + CF(2) * [ 1 – CF(1) ]
                    elseif (mysqli_num_rows($gejala) == 2) {
                        $akhir = $data[1] + $data[2] * ( 1 - $data[1] );
                    }
                    
                    //jika jumlah gejala berdasarkan penyakit hanya 2 maka rumusnya jadi /CF(A) = CF(1) + CF(2) * [ 1 – CF(1) ] //CF(B) = CF(3) + CF(A) * [ 1 – CF(3) ]
                    elseif (mysqli_num_rows($gejala) == 3) {
                        $cfa    = $data[1] + $data[2] * ( 1 - $data[1] );
                        $akhir  = $data[3] + $cfa * (1 - $data[3]);
                    }
                    else {
                        //rumus cf combine (jika gejala yang dipilih minimal 3 keatas)
                        //CF(A) = CF(1) + CF(2) * [ 1 – CF(1) ]
                        //CF(B) = CF(3) + CF(A) * [ 1 – CF(3) ] dst
                        $cfa    = $data[1] + $data[2] * ( 1 - $data[1] ); 
                        $cfb    = $data[3] + $cfa * (1 - $data[3]);
                        $y      = $cfb;
                        for ($i=4; $i < count($data)+1; $i++) { 
                            $z = $data[$i] + $y * (1 - $data[$i]);
                            $y = $z;
                        }

                        $akhir = $y;
                    }
                    echo "Perhitungan gangguan ".$p['nama_gangguan'].'<br>';
                    echo "Jumlah gejala = ".mysqli_num_rows($gejala).'<br>';
                    if (mysqli_num_rows($gejala) == 1) {
                       echo "Nilai CF = ". $data[1]. " x 100% <br>";
                       echo "Hasil Akhir = ".number_format($data[1] * 100,2).'%<br>';
                       
                    }
                    elseif (mysqli_num_rows($gejala) == 2) {
                        echo "CF = CF(1) + CF(2) * [ 1 – CF(1) ]<br>";
                        echo "CF = ".number_format($data[1],3)." + ".number_format($data[2],3)." * ( 1 - ".number_format($data[1],3)." ) <br>";

                       echo "CF = ".number_format($data[1],3)." + ".number_format($data[2],3)." * ".$KALI = number_format(1- $data[1],3)."<br>";
                       echo "CF = ".number_format($data[1],3)." + ".$kali2 = number_format($data[2] * $KALI,3)."<br>";
                       echo "CF = ".number_format($data[1] + $kali2,3)."<br>";
                       echo "Hasil Akhir = ".number_format($akhir * 100,2).'%<br>';
                    }
                    elseif (mysqli_num_rows($gejala) == 3) {
                        echo "CFAwal = CF(1) + CF(2) * [ 1 – CF(1) ]<br>";
                        
                        echo "CFAwal = ".number_format($data[1],3)." + ".number_format($data[2],3)." * ( 1 - ".number_format($data[1],3)." ) <br>";

                        $cfa    = $data[1] + $data[2] * ( 1 - $data[1] );
                        echo 'CFAwal = '. number_format($cfa,3).'<br>';
                        echo "CF = CF(3) + CFAwal * [ 1 – CF(3) ]<br>";
                        echo "CF = ".number_format($data[3],3)." + ".number_format($cfa,3)." * ( 1 - ".number_format($data[3],3)." ) <br>";
                        echo "CF = ".number_format($data[3],3)." + ".number_format($cfa,3)." * ".number_format(1-$data[3],3)."<br>";
                        $akhir  = $data[3] + $cfa * (1 - $data[3]);
                        echo 'CF = '. number_format($akhir,3).'<br>';
                        echo "Hasil Akhir = ".number_format($akhir * 100,2).'%<br>';
                    }
                    elseif (mysqli_num_rows($gejala) > 3) {
                        // echo "--Proses 1--<br>";
                        echo "CFAwal = CF(1) + CF(2) * [ 1 – CF(1) ]<br>";
                        
                        echo "CFAwal = ".number_format($data[1],3)." + ".number_format($data[2],3)." * ( 1 - ".number_format($data[1],3)." ) <br>";

                        $cfa    = $data[1] + $data[2] * ( 1 - $data[1] );
                        echo 'CFAwal = '. number_format($cfa,3).'<br>';
                        echo "CFBaru = CF(3) + CFAwal * [ 1 – CF(3) ]<br>";
                        echo "CFBaru = ".number_format($data[3],3)." + ".number_format($cfa,3)." * ( 1 - ".number_format($data[3],3)." ) <br>";
                        echo "CFBaru = ".number_format($data[3],3)." + ".number_format($cfa,3)." * ".number_format(1-$data[3],3)."<br>";
                        $y  = $data[3] + $cfa * (1 - $data[3]);
                        echo "CFBaru = ".number_format($y,3).'<br>';
                        
                        for ($i=4; $i < count($data)+1; $i++) {
                            echo "CFBaru = CF(".$i.") + CFBaru * [ 1 – CF(".$i.") ]<br>";
                            echo "CFBaru = ".number_format($data[$i],3)." + ".number_format($y,3)." * ( 1 - ".number_format($data[$i],3).")<br>";
                             echo "CFBaru = ".number_format($data[$i],3)." + ".number_format($y,3)." * ".number_format(1-$data[$i],3)."<br>";
                            $z = $data[$i] + $y * (1 - $data[$i]);
                            if ($i != count($data)) {
                                echo "CFBaru = ".number_format($z,3).'<br>';
                            }
                            
                            $y = $z;
                        }
                        echo 'CFAkhir = '. number_format($y,3).'<br>';
                        echo "Hasil Akhir = ".number_format($akhir * 100,2).'%<br>';
                    }
                    echo "____________<br>";

                }

                ?>
                </div>
                <hr>
                <div class="well well-small row" style="background-color: #f5f4f2;">
                    <div class="col-md-7">
                        <br>
                        <h5>Hasil Diagnosis</h5>
                        <div class="callout callout-default">
                        <p class="small">Jenis penyakit / hama yang diderita adalah</p> <br>
                        <h3 class="text text-success text-center"><b><?=$c['nama_gangguan']?> </b>| <?=ucfirst($c['jenis'])?><br> <?=number_format($c['hasil']*100,2)?>% (<?=number_format($c['hasil'],4)?>)</h3><br>
                    </div>
                    </div>

                    <div class="col-md-5">
                        <img class="card-img-top img-bordered-sm" style="float:right; border: 3px solid #c5c7c5; margin-left:15px; margin-top:8px; " height="200" src="style/img/<?=$c['gambar']?>">
                    </div>
                    </div>
                    <br>
                
                    <div class="card" style="border-color: #00b859;">
                    <div class="card-header with-border" style="background-color: #00b859; color: white;">
                        <h5 class="card-title">Deskripsi</h5>
                    </div>


                    <div class="card-body">
                        <?=ucfirst($c['desk_gangguan'])?>
                    </div>
                    </div>
                    <br>
                
                    <div class="card" style="border-color: #009dff;">
                    <div class="card-header with-border" style="background-color: #009dff; color: white;">
                        <h5 class="card-title">Saran</h5>
                    </div>
                    <div class="card-body">
                        <?=ucfirst($c['saran'])?>
                    </div>
                    </div>
                    <br>
                    
                <?php 
                $sakit = [];
                $hasil = [];
                $penyakitterpilih = $c['idgangguan'];
                $gejala     = mysqli_query($con," SELECT nama_gangguan,jenis,gangguan.idgangguan FROM diagnosa 
                                        JOIN pengetahuan on diagnosa.idgejala = pengetahuan.idgejala 
                                        JOIN gejala on pengetahuan.idgejala = gejala.idgejala 
                                        JOIN gangguan on pengetahuan.idgangguan = gangguan.idgangguan 
                                        WHERE cfuser > 0 
                                        AND kode_diagnosa = '$kode' 
                                        AND pengetahuan.idgangguan != '$penyakitterpilih' 
                                        GROUP BY pengetahuan.idgangguan
                                        ");


                ?>
                <div class="card" style="border-color: #fc0703;">
                    <div class="card-header with-border" style="background-color: #fc0703; color: white;">
                        <h6 class="card-title">Kemungkinan Lain :</h6>
                    </div>
                    <div class="card-body">
                        <?php 
                        
                        while ($h= mysqli_fetch_array($gejala)) {  
                            $idpenyakitt = $h['idgangguan'];
                            $gejalaa     = mysqli_query($con," SELECT diagnosa.idgejala,gejala, cfuser * cf as cfgejala FROM diagnosa 
                                        JOIN pengetahuan on diagnosa.idgejala = pengetahuan.idgejala 
                                        JOIN gejala on pengetahuan.idgejala = gejala.idgejala 
                                        JOIN gangguan on pengetahuan.idgangguan = gangguan.idgangguan 
                                        WHERE cfuser > 0 AND kode_diagnosa = '$kode' AND pengetahuan.idgangguan = '$idpenyakitt' ");

                            
                            $data = [];
                            $i = 1;
                            //masukan data CF Hipotesa tiap gejala ke kedalam array
                            while ($g = mysqli_fetch_array($gejalaa)) {
                                $data[$i++] = $g['cfgejala'];
                            }
                            // var_dump($data); die();
                            $akhirr = 0;
                            //jika jumlah gejala berdasarkan penyakit hanya 1 maka nilai CF Hipotesa yang digunakan
                            if (mysqli_num_rows($gejalaa) == 1) {
                               $akhir = $data[1];
                            }
                            //jika jumlah gejala berdasarkan penyakit hanya 2 maka rumusnya jadi /CF(A) = CF(1) + CF(2) * [ 1 – CF(1) ]
                            elseif (mysqli_num_rows($gejalaa) == 2) {
                                $akhir = $data[1] + $data[2] * ( 1 - $data[1] );
                            }
                            //jika jumlah gejala berdasarkan penyakit hanya 2 maka rumusnya jadi /CF(A) = CF(1) + CF(2) * [ 1 – CF(1) ] //CF(B) = CF(3) + CF(A) * [ 1 – CF(3) ]
                            elseif (mysqli_num_rows($gejalaa) == 3) {
                                $cfa    = $data[1] + $data[2] * ( 1 - $data[1] );
                                $akhir  = $data[3] + $cfa * (1 - $data[3]);
                            }
                            else {
                                //rumus cf combine (jika gejala yang dipilih minimal 3 keatas)
                                //CF(A) = CF(1) + CF(2) * [ 1 – CF(1) ]
                                //CF(B) = CF(3) + CF(A) * [ 1 – CF(3) ] dst
                                $cfa    = $data[1] + $data[2] * ( 1 - $data[1] );
                                $cfb    = $data[3] + $cfa * (1 - $data[3]);
                                $y      = $cfb;
                                for ($i=4; $i < count($data)+1; $i++) { 
                                    $z = $data[$i] + $y * (1 - $data[$i]);
                                    $y = $z;
                                }

                                $akhir = $y;
                            }

                            $sakit = ['idgangguan' => $h['idgangguan'],'nama_gangguan'=>$h['nama_gangguan'],'jenis'=>$h['jenis'], 'akhir' => $akhir]; 
                            array_push($hasil, $sakit); 
                             ?>
                             
                             <?php }
                            uasort($hasil, function ($item, $compare) {
                                return $item['akhir'] <= $compare['akhir']; 
                            });

                            
                            foreach($hasil as $key => $a){ ?>
                                <span><i class='fa fa-caret-square-right'></i> 
                                    <?=ucfirst($a['nama_gangguan'])?> ( <?=ucfirst($a['jenis'])?> ) / <?=number_format($a['akhir'] * 100,2)?>% ( <?=number_format($a['akhir'],4)?> ) 
                                </span><br>
                            <?php }

                         ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <?php if ($_GET['diagnosa'] == 'simpan') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Diagnosis Berhasil Di Proses !',
                })
            </script>
        <?php } ?>