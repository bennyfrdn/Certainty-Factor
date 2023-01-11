<?php 

include "config/koneksi.php";
include "config/fungsi.php";

if (isset($_POST['submit'])) {
    $nama       = $_POST['nama'];
    $username   = $_POST['username'];
    $nohp       = $_POST['nohp'];
    $password   = $_POST['password'];
    $kode       = $_POST['kode'];

    if ($kode == $_SESSION["code"]) {
        
        $cekemailuser   = mysqli_query($con," SELECT * FROM user where username = '$username' ");
        
        $cekemailadmin   = mysqli_query($con," SELECT * FROM admin where username = '$username' ");
        
        $cekemailpakar   = mysqli_query($con," SELECT * FROM pakar where username = '$username' ");
        
        $ceknohpuser   = mysqli_query($con," SELECT * FROM user where nohp = '$nohp' ");

        $_SESSION['inpnama']    = $nama;
        $_SESSION['inpnohp']    = $nohp;
        $_SESSION['inpemail']   = $username;
        $_SESSION['inppwd']     = $password;

        // die(var_dump($_SESSION));

        if (mysqli_num_rows($cekemailuser) > 0) {
            header('location:registrasi.php?s=error');
            return redirect()->back()->withInput();

        }elseif(mysqli_num_rows($cekemailadmin) > 0) {
            header('location:registrasi.php?s=error');
            return redirect()->back()->withInput();

        }elseif(mysqli_num_rows($cekemailpakar) > 0) {
            header('location:registrasi.php?s=error');
            return redirect()->back()->withInput();
            
        }elseif(mysqli_num_rows($ceknohpuser) > 0){
            header('location:registrasi.php?s=nohp');
            return redirect()->back()->withInput();

        }else{
            unset ($_SESSION["inpnama"]);
            unset ($_SESSION["inpnohp"]);
            unset ($_SESSION["inpemail"]);
            unset ($_SESSION["inppwd"]);
            mysqli_query($con," INSERT INTO user values ('','$nama','$nohp','$username','$password','nonaktif') ");
            header('location:login.php?s=reg');
        }
    }
    else
    {
        $_SESSION['inpnama']    = $nama;
        $_SESSION['inpnohp']    = $nohp;
        $_SESSION['inpemail']   = $username;
        $_SESSION['inppwd']     = $password;
        header('location:registrasi.php?s=captcha');
    }
 
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="style/img/dokter.png">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?=$namaapp?></title>
        <link href="style/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        
    </head>
     <body class style="background-image: url(style/img/sawit.png) ;background-size: 2000px;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                                    <div class="card-body text-center">
                                        <form method="post">
                                            <br>
                                              <img class="br-100" width="200px" src="style/img/dokter.png" >
                                            <h3 class="text-center">Halaman Registrasi<br><?=$namaapp?></h3><br>

                                              <div class="alert alert-success alert-dismissible fade show" role="alert">Silahkan masukkan data diri anda disini!</a>
                                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" required="" value="<?=isset($_SESSION['inpnama'])?$_SESSION['inpnama']:''?>" name="nama" placeholder="Masukan nama lengkap">
                                                <label for="inputEmail">Masukan Nama Lengkap</label>
                                            </div>

                                             <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" required="" value="<?=isset($_SESSION['inpemail'])?$_SESSION['inpemail']:''?>" name="username" placeholder="Masukan Email">
                                                <label for="inputEmail">Masukan Email</label>
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="number" required="" value="<?=isset($_SESSION['inpnohp'])?$_SESSION['inpnohp']:''?>" name="nohp" placeholder="Masukan nomer handphone">
                                                <label for="inputEmail">Masukan Nomor Handphone</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" minlength="8" name="password" value="<?=isset($_SESSION['inppwd'])?$_SESSION['inppwd']:''?>" required="" type="password" placeholder="Password" />
                                                <label for="inputPassword">Masukan Password</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <img src="config/captcha.php" alt="gambar" />
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input autocomplete="off" class="form-control" name="kode" placeholder="kode captcha" required="" maxlength="5"/>
                                                <label for="inputPassword">Kode Captcha</label>
                                            </div>
                                            <button name="submit" class="btn btn-success btn-block" type="submit">Register</button>
                                            <br>
                                            <br>
                                            <p class="small">Lupa password ? <a href="reset.php">Klik disini </a><br>
                                                Sudah memiliki akun ? <a href="login.php">Login</a></p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="style/js/scripts.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <?php if ($_GET['s'] == 'error') { ?>
            <script>
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Email yang anda masukkan sudah terdaftar!',
                })
            </script>
        <?php } ?>

         <?php if ($_GET['s'] == 'nohp') { ?>
            <script>
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Nomer handphone yang anda masukkan sudah terdaftar!',
                })
            </script>
        <?php } ?>
        
        <?php if ($_GET['s'] == 'captcha') { ?>
            <script>
                Swal.fire({
                  icon: 'error',
                  title: 'Oops...',
                  text: 'Captcha yang anda masukan salah!',
                })
            </script>
        <?php } ?>

    </body>
</html>