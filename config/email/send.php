<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include librari phpmailer
include('Exception.php');
include('PHPMailer.php');
include('SMTP.php');
include "../koneksi.php";
 $email  = $_POST['username'];
$cek    = mysqli_query($con, " SELECT * FROM user where username = '$email' ");
if (mysqli_num_rows($cek) > 0) {
    $data               = mysqli_fetch_assoc($cek);
    $email_pengirim     = 'benifrandian459@gmail.com'; // Isikan dengan email pengirim. pastikan sudah mengaktifkan less secure
    $nama_pengirim      = $namaapp; // Isikan dengan nama pengirim
    $email_penerima     = $email; // Ambil email penerima dari inputan form
    $subjek             = 'Reset Password'; // Ambil subjek dari inputan form

    $mail               = new PHPMailer;
    $mail->isSMTP();

    $mail->Host         = 'smtp.gmail.com';
    $mail->Username     = $email_pengirim; // Email Pengirim
    $mail->Password     = 'anaklanangbandal'; // Isikan dengan Password email pengirim
    $mail->Port         = 465;
    $mail->SMTPAuth     = true;
    $mail->SMTPSecure   = 'ssl';
    // $mail->SMTPDebug = 2; // Aktifkan untuk melakukan debugging

    $mail->setFrom($email_pengirim, $nama_pengirim);
    $mail->addAddress($email_penerima, '');
    $mail->isHTML(true); // Aktifkan jika isi emailnya berupa html

    $mail->Subject = $subjek;
    $mail->Body = 'Halo <b>'.ucwords($data['nama']).'</b>, Silahkan login akun anda dengan menggunakan username : <b>'.$email.'</b> dan password <b>'.$data['password'].'</b>';

    $send = $mail->send();

    if($send){ // Jika Email berhasil dikirim
        header('location:../../login.php?s=reset');
    }else{ // Jika Email gagal dikirim
        header('location:../../reset.php?s=gagal');
        // echo '<h1>ERROR<br /><small>Error while sending email: '.$mail->getError().'</small></h1>'; // Aktifkan untuk mengetahui error message
    }

}
else
{
    header('location:../../reset.php?s=eror');
    // echo "eror";
}






?>