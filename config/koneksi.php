<?php
date_default_timezone_set('Asia/Jakarta');
error_reporting(0);
    
    session_start();
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "kelapasawit";

    $con = mysqli_connect($server, $username, $password, $database);
    if (mysqli_connect_errno()) {
    echo "Koneksi gagal: " . mysqli_connect_error($con);
    exit();
  }

    $namaapp      = 'Dokter sawit v.1.0';
    $authorapp    = 'Beni Frandian';
    $tahunapp     = '2022';
    $univapp      = 'Universitas Islam Negeri Sumatera Utara';

?> 



