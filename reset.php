<?php 
include "config/koneksi.php";
include "config/fungsi.php";
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
     <body class style="background-image: url(style/img/sawit.png) ; background-size: 1600px;">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5">
                                    <div class="card-body text-center">
                                        <form method="post" action="config/email/send.php">
                                            <br>
                                              <img class="br-100" width="200px" src="style/img/dokter.png" >
                                            <h3 class="text-center">Halaman Lupa Password<br><?=$namaapp?></h3><br>

                                              <div class="alert alert-danger alert-dismissible fade show" role="alert">Silahkan masukkan email anda disini untuk mengembalikan password yang lupa!</a>
                                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" required="" name="username" placeholder="Masukan Email">
                                                <label for="inputEmail">Masukan Email</label>
                                            </div>
                                            <button name="submit" class="btn btn-success btn-block" type="submit">Kirim</button>
                                            <br>
                                            <br>
                                            <p class="small">Sudah memiliki akun ? <a href="login.php">Login</a></p>
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
        
        <?php if ($_GET['s'] == 'eror') { ?>
            <script>
                Swal.fire(
                  'Ops!',
                  'Email tidak ditemukan!',
                  'error'
                )
            </script>
        <?php } ?>
        
        <?php if ($_GET['s'] == 'gagal') { ?>
            <script>
                Swal.fire(
                  'Ops!',
                  'Email gagal dikirim, silahkan ulangi beberapa saat lagi!',
                  'error'
                )
            </script>
        <?php } ?>
    </body>
</html>
