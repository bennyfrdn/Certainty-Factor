<?php 

$kodes = 'DA'.$SESSION['id'].''.date('ymdhis');
 
if (isset($_SESSION['nama']) == 0) {
    header('location:index.php');
    }

if (isset($_POST['proses'])) {
    $kode       = $_POST['kode'];
    $kondisi    = $_POST['keyakinan'];
    $gejala     = $_POST['gejala']; 
    $iduser     = $_SESSION['id'];
    $waktu      = date('Y-m-d H:i:s');
    
     //cek pada table diagnosis dengen kode tersebut dan nilai cfrule > 0
    $cek = mysqli_query($con," SELECT gangguan.idgangguan FROM diagnosa 
                                JOIN pengetahuan on diagnosa.idgejala = pengetahuan.idgejala 
                                JOIN gejala on pengetahuan.idgejala = gejala.idgejala 
                                JOIN gangguan on pengetahuan.idgangguan = gangguan.idgangguan 
                                WHERE cfuser > 0 AND kode_diagnosa = '$kode' GROUP BY gangguan.idgangguan  ");
    
    //var_dump(mysqli_fetch_array($cek));
    //die();
    $arr    = [];
    $pos    = [];
    $hasil  = [];
    $sakit  = [];
    $posisi = 1;


    //cari gejala yang dipilih user berdasarkan penyakit yang sesuai (dikelompokan)
    while ($c = mysqli_fetch_array($cek)) {
        $idpenyakit = $c['idgangguan'];
        $gejala     = mysqli_query($con," SELECT diagnosa.idgejala,gejala, cfuser * cf as cfgejala FROM diagnosa JOIN pengetahuan on diagnosa.idgejala = pengetahuan.idgejala 
            JOIN gejala on pengetahuan.idgejala = gejala.idgejala 
            JOIN gangguan on pengetahuan.idgangguan = gangguan.idgangguan 
            WHERE cfuser > 0 AND kode_diagnosa = '$kode' AND pengetahuan.idgangguan = '$idpenyakit'");
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

        //masukan hasil perhitungan setiap penyakit kedalam array
        $sakit = ['idgangguan' => $idpenyakit, 'akhir' => $akhir]; 
            array_push($hasil, $sakit);

        }
        //cari nilai yang paling besar, untuk dijadikan penyakit utama
        uasort($hasil, function ($item, $compare) {
        return $item['akhir'] >= $compare['akhir']; 
        });

        $urutan = 1;
        foreach($hasil as $key => $a){
        $penyakitutama  = $a['idgangguan'];
        $hasilakhir     = $a['akhir'];
        }

   
    //masukan penyakit dengan nilai cfall terbesar sebagai penyakit utama
    mysqli_query($con," INSERT INTO hasil values ('$kode','$iduser','$penyakitutama','$hasilakhir','$waktu') ");
    echo "<script>
    
                window.location.href='?p=detail&id=".$kode."&&diagnosa=simpan';
                </script>";
}


?>

<main>
    <div class="container-fluid px-4">
        <br>
      
        <h3>Diagnosis Penyakit dan Hama</h3>
        <hr>
        <form method="post" action=""> 
        <div class="card">
            <div class="card-header">
                Kode Diagnosis : <b>#DA<?=$SESSION['id'].''.date('ymdhis');?></b>
                <input type="hidden" id="kode" name="kode" value="DA<?=$SESSION['id'].''.date('ymdhis')?>">
            </div>

            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                <h5 class="alert-heading"><i class='icon fa fa-exclamation-triangle'></i>Petunjuk cara melakukan diagnosis !</h5>
                Silahkan memilih gejala yang sesuai dengan kondisi pada pelepah dan daun pada tanaman kelapa sawit anda, anda dapat memilih kepastian kondisi pada tiap-tiap gejala yang ada pada bagian pelepah dan daun pada tanaman anda, </b> dengan cakupan sebagai berikut:<br><br>
                        <b>1.0</b> (Pasti)&nbsp;&nbsp;|&nbsp;&nbsp;<b>0.8</b> (Hampir Pasti)&nbsp;&nbsp;|<br>
                        <b>0.6</b> (Kemungkinan Besar)&nbsp;&nbsp;|&nbsp;&nbsp;<b>0.4</b> (Mungkin)&nbsp;&nbsp;|<br>
                        <b>0.2</b> (Tidak Yakin)&nbsp;&nbsp;|&nbsp;&nbsp;<br><br>
                jika anda sudah yakin, silahkan tekan tombol proses  (<i class='fa fa-search-plus'></i>)  di bawah untuk melihat hasil diagnosis. Output hasil diagnosis berupa persentase keyakinan terhadap serangan jenis penyakit ataupun hama yang terjadi beserta solusi penanganan</a>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>


            <div class="card-body table-responsive">
                  <table class="table table-bordered text-center table-striped" style="border-color: #9003fc;">
                    <thead style="background-color: #9003fc; color:white">
                        <th style="text-align: center;" width="1%">No</th>
                        <th style="text-align: center;" width="10%">Kode</th>
                        <th style="text-align: center;">Gejala</th>
                        <th style="text-align: center;">Tingkat Keyakinan</th>
                    </thead>
                    <tbody id="viewitem">
                        
                    </tbody>
                </table>
            </div>
            <div class="card-footer" style="text-align:right">
                <button type="submit" name="proses" class="btn btn-danger">
                    <i class='fa fa-search-plus'></i>Proses Diagnosis</button>
            </div>


        </div>
        </form>
    </div>
</main>



