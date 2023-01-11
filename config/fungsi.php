<?php 

//jumlah gejala
$sql  			= mysqli_query($con," SELECT COUNT(idgejala) as jumlah from gejala ");
$jgejala 		= mysqli_fetch_assoc($sql); 

//jumlah penyakit dan hama
$sql  			= mysqli_query($con," SELECT COUNT(idgangguan) as jumlah from gangguan ");
$jpenyakit 		= mysqli_fetch_assoc($sql); 

//jumlah basis pengetahuan
$sql  			= mysqli_query($con," SELECT COUNT(idpengetahuan) as jumlah from pengetahuan ");
$jpengetahuan 	= mysqli_fetch_assoc($sql); 

//jumlah admin
$sql  			= mysqli_query($con," SELECT COUNT(idpakar) as jumlah from pakar ");
$jpakar 		= mysqli_fetch_assoc($sql); 

function kode_gejala()
{
    $con = mysqli_connect('localhost', 'root', '', 'spksawit');
    $q   = mysqli_query($con,"SELECT MAX(RIGHT(idgejala,3)) AS kd_max FROM gejala ");
    $kd  = "";
    if(mysqli_num_rows($q) > 0){
        while($k = mysqli_fetch_array($q)){
            $tmp = ((int)$k['kd_max'])+1;
            $kd = sprintf("%03s", $tmp);
        }
    }else{
        $kd = "001";
    }
    return 'GJ'.$kd;
}

function kode_penyakit()
{
    $con = mysqli_connect('localhost', 'root', '', 'spksawit');
    $q   = mysqli_query($con,"SELECT MAX(RIGHT(idgangguan,3)) AS kd_max FROM gangguan ");
    $kd  = "";
    if(mysqli_num_rows($q) > 0){
        while($k = mysqli_fetch_array($q)){
            $tmp = ((int)$k['kd_max'])+1;
            $kd = sprintf("%03s", $tmp);
        }
    }else{
        $kd = "001";
    }
    return 'D'.$kd;
}

function tanggal($tanggal){
    $bulan = array (
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);
 
    return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

function bulan($bln){
    $bulan = $bln;
    Switch ($bulan){
        case 1 : $bulan="Januari";
            Break;
        case 2 : $bulan="Februari";
            Break;
        case 3 : $bulan="Maret";
            Break;
        case 4 : $bulan="April";
            Break;
        case 5 : $bulan="Mei";
            Break;
        case 6 : $bulan="Juni";
            Break;
        case 7 : $bulan="Juli";
            Break;
        case 8 : $bulan="Agustus";
            Break;
        case 9 : $bulan="September";
            Break;
        case 10 : $bulan="Oktober";
            Break;
        case 11 : $bulan="November";
            Break;
        case 12 : $bulan="Desember";
            Break;
    }
    return $bulan;
}