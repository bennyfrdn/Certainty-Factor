<?php 

include "config/koneksi.php";
include "config/fungsi.php";

if (isset($_POST['submit'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $level      = $_POST['level'];
    
 
    $sqlpakar = mysqli_query($con," SELECT * FROM pakar where username = '$username' and password = '$password' ");
    $jmlpakar   = mysqli_num_rows($sqlpakar);
    $sqladmin = mysqli_query($con," SELECT * FROM admin where username = '$username' and password = '$password' ");
    $jmladmin   = mysqli_num_rows($sqladmin);


    if ($jmlpakar > 0) {
        $user = mysqli_fetch_assoc($sqlpakar);
        $_SESSION['nama']   = $user['nama'];
        $_SESSION['id']     = $user['idpakar'];
        $_SESSION['login']  = 'true';
        $_SESSION['level']  = 'pakar'; 
        header('location:index.php?s=loginsukses');
    
    }elseif ($jmladmin > 0){
        $user = mysqli_fetch_assoc($sqladmin);
        $_SESSION['nama']   = $user['nama'];
        $_SESSION['id']     = $user['idadmin'];
        $_SESSION['login']  = 'true';
        $_SESSION['level']  = 'admin';    
        header('location:index.php?s=loginsukses');

    }else{
        $sqllogin = mysqli_query($con," SELECT * FROM user where username = '$username' and password = '$password' ");
        $jmlsql   = mysqli_num_rows($sqllogin);
        if ($jmlsql > 0) {
            $user = mysqli_fetch_assoc($sqllogin);

            if ($user['status'] == 'aktif') {
                $_SESSION['nama']   = $user['nama'];
                $_SESSION['id']     = $user['iduser'];
                $_SESSION['login']  = 'true';
                $_SESSION['level']  = 'user';
                header('location:index.php?s=loginsukses');
            }
            else
            {
                header('location:login.php?s=nonaktif');
            }
        }
        else
        {
            header('location:login.php?s=error');
        }
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
    <body class style="background-image: url(style/img/sawit.png) ; background-size: 1600px;"   >
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
                                            <h3 class="text-center">Halaman Login<br><?=$namaapp?></h3><br>


                                            <div class="alert alert-success alert-dismissible fade show" role="alert">Selamat datang, agar dapat melakukan diagnosis silahkan masukkan akun anda!</a>
                                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" required="" name="username" placeholder="Masukan Email">
                                                <label for="inputEmail">Masukan email</label>
                                            </div>

                                            <script type="text/javascript">
                                                
                                            function myFunction() {
                                            var x = document.getElementById("inputPassword");
                                             if (x.type === "password") {
                                            x.type = "text";
                                            } else {
                                                x.type = "password";
                                                }
                                            }
                                            </script>

                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="password" required="" minlength="8" type="password" placeholder="Password" />
                                                <label for="inputPassword">Masukan Password</label>
                                            <!-- An element to toggle between password visibility -->

                                           
                                            </div>

                                            <div style="float: left;">
                                                 <input type="checkbox" onclick="myFunction()">&nbsp;Lihat Password
                                            </div>

                                            <br>
                                            <br>

                                            <button name="submit" class="btn btn-primary btn-block" type="submit">LOGIN</button>
                                            <br>
                                            <br>
                                            <p class="small">Lupa password ? <a href="reset.php">klik disini </a><br>
                                                                Belum memiliki akun ? <a href="registrasi.php">Daftar</a></p>
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
                Swal.fire(
                  'Ops!',
                  'Username / Password salah!',
                  'error'
                )
            </script>

        <?php } ?>
        <?php if ($_GET['s'] == 'nonaktif') { ?>
            <script>
                Swal.fire(
                  'Ops!',
                  'Akun anda belum di aktifkan, Silahkan tunggu di approve oleh admin!',
                  'error'
                )
            </script>

        <?php } ?>
        <?php if ($_GET['s'] == 'reg') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  title: 'Berhasil...',
                  text: 'Silahkan menunggu akun anda dikatifkan oleh admin!',
                })
            </script>

        <?php } ?>
        <?php if ($_GET['s'] == 'reset') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  title: 'Berhasil...',
                  text: 'Silahkan login dengan informasi login yang dikirimkan ke email anda!',
                })
            </script>

        <?php } ?>
    </body>
</html>