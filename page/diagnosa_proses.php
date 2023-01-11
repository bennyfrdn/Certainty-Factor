<?php

include '../config/koneksi.php'; 
$no     = 1;
$html   = '';


//script untuk tampilan awal pada menu diagnosis
if ($_GET['aksi'] == 'awal') {
    $sql    = mysqli_query($con," SELECT * FROM gejala ");
    while ($d = mysqli_fetch_array($sql)) { 
        $gejala = $d['idgejala'];
        $sqll   = mysqli_query($con," SELECT * FROM kondisi ");
        $html   .= '
                    <tr>
                        <td>'.$no.'</td>
                        <td style="text-align:center">'.ucfirst($d['idgejala']).'</td>
                        <td style="text-align:center">Apakah '.ucfirst($d['gejala']).'?</td>
                        <td width="20%" class="opsi">

                            <input type="hidden" id="gejala'.$no.'" name="gejala[]" value="'.$d['idgejala'].'">
                            <select onchange="ganti(this.id, this.value)" style="  text-align-last:center;" id="'.$no.'" name="keyakinan[]" class="form-control">
                                <option>Pilih Jika Sesuai</option>
                                ';
                                
                                while ($k = mysqli_fetch_array($sqll)) { 
                                    $html   .= '<option value="'.$k['cfuser'].'">'.$k['kondisi'].'</option>';
                                }
                                
         $html   .= '                    
                            </select>

                        </td>
                    </tr>
                ';
    $no++;
    }

    echo $html;
}

//script untuk tampilan setelah isi bobot keyakinan agar bisa dinamis menyesuaikan relasi gejala yang ada
elseif ($_GET['aksi'] == 'ubah') {

    $kdgejala       = $_POST['kdgejala'];
    $isi            = $_POST['isi'];
    $kode           = $_POST['kode'];

    // cek dlu apakah sudah ada kode gejala dengan kode diagnosa tersebut didalam table diagnosa
    // jika belum maka masukan data yang dipilih, akan tetapi jika sudah ada maka lakukan update data pada table diagnosa
    $cek = mysqli_query($con," SELECT * FROM diagnosa where kode_diagnosa = '$kode' and idgejala = '$kdgejala' ");
    $jml = mysqli_num_rows($cek);
    if ($jml == 0) {
        mysqli_query($con," INSERT INTO diagnosa values ('','$kode','$kdgejala','$isi') ");
    }
    else
    {
        mysqli_query($con," UPDATE diagnosa set cfuser = '$isi' where kode_diagnosa = '$kode' and idgejala = '$kdgejala' ");
    }

    //setelah berhasil diinputkan, maka langkah selanjutnya menentukan gejala yang akan ditampilkan di pilihan diagnosa dari user
    //gejala yang ditampilkan merupakan gejala yang memiliki hubungan dengan gejala yang telah dipilih

    //mencari penyakit berdasarkan gejala yang sudah dipilih
    $sql = mysqli_query($con," SELECT diagnosa.*,gangguan.idgangguan,gangguan.nama_gangguan 
                                FROM `diagnosa` 
                                JOIN pengetahuan on diagnosa.idgejala = pengetahuan.idgejala
                                JOIN gangguan on pengetahuan.idgangguan = gangguan.idgangguan
                                where diagnosa.kode_diagnosa = '$kode' 
                                GROUP BY gangguan.idgangguan
                        ");
    

    //kemudian cari gejala yang berhubungan dengan penyakit yang sudah terseleksi, dan hasilnya masukan kedalam array
    $arraygejala = [];
    while ($s = mysqli_fetch_array($sql)) {
        $idpenyakit     = $s['idgangguan'];
        $sqlpenyakit    = mysqli_query($con," SELECT * FROM pengetahuan where idgangguan = '$idpenyakit'");
        while ($sp = mysqli_fetch_array($sqlpenyakit)) {
            array_push($arraygejala,$sp['idgejala']);
        }
    }
    

    //hilangkan gejala yang double yang ada dalam array
    $newarraygejala = array_unique($arraygejala);
    //buat ulang data array untuk mencegah data kosong pada array
    $arrayfix = [];
    for ($i=0; $i < count($arraygejala) ; $i++) { 
        if ($newarraygejala[$i] != '') {
            array_push($arrayfix, $newarraygejala[$i]);
        }
    }
    
    //tampilkan gejala yang sudah di seleksi
    for ($i=0; $i < count($arrayfix) ; $i++) { 
        $sqll       = mysqli_query($con," SELECT * FROM kondisi ");
        $kodegejala = $arrayfix[$i];

        //select data gejala berdasarkan kode gejalanya
        $sqlgejala  = mysqli_query($con," SELECT * FROM gejala where idgejala = '$kodegejala'");
        $datagejala = mysqli_fetch_assoc($sqlgejala);
        $html   .= '
                    <tr>
                        <td>'.$no.'</td>
                        <td style="text-align:center">'.ucfirst($kodegejala).'</td>
                        <td style="text-align:center">Apakah '.ucfirst($datagejala['gejala']).'?</td>
                        <td width="20%" class="opsi">

                            <input type="hidden" id="gejala'.$no.'" name="gejala[]" value="'.$datagejala['idgejala'].'">
                            <select onchange="ganti(this.id, this.value)" style="  text-align-last:center;" id="'.$no.'" name="keyakinan[]" class="form-control">
                                <option>Pilih Jika Sesuai</option>
                                ';
                                
                                //set value berdasarkan pilihan yang sudah tersimpan pada database
                                $sqluser  = mysqli_query($con," SELECT * FROM diagnosa where kode_diagnosa = '$kode' and idgejala = '$kodegejala' ");
                                $datauser = mysqli_fetch_assoc($sqluser);
                                while ($k = mysqli_fetch_array($sqll)) { 
                                    if ($k['cfuser'] == $datauser['cfuser']) { $sel = "selected"; 
                                }else{ 
                                    $sel = ''; }
                                    $html   .= '<option '.$sel.' value="'.$k['cfuser'].'">'.$k['kondisi'].'</option>';
                                }
                                
        $html   .= '                    
                            </select>

                        </td>
                    </tr>
                ';
    $no++;
    }
    echo $html;

   
}