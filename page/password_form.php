<?php

if (isset($_SESSION['nama']) == 0) {
    header('location:index.php');
    }

if (isset($_POST['simpan'])) {
    $id             = $_SESSION['id'];
    $level          = $_SESSION['level'];
    $password       = $_POST['password'];
    $passwordlama   = $_POST['passwordlama'];

    if ($level == 'user') {
        $cek            = mysqli_query($con," SELECT * FROM user where iduser = '$id' and password = '$passwordlama' ");
        if (mysqli_num_rows($cek) <= 0 ) {
                echo "<script> 
                window.location.href='?p=resetpwd&&password=error';
                </script>";
        }
        else
        {
            mysqli_query($con," UPDATE user set password = '$password' where iduser = '$id' ");
                echo "<script>
                window.location.href='?p=resetpwd&&password=ubah';
                </script>";
        }
    }
    elseif ($level = 'admin') {
        $cek            = mysqli_query($con," SELECT * FROM admin where idadmin = '$id' and password = '$passwordlama' ");
        if (mysqli_num_rows($cek) <= 0 ) {
                echo "<script>
                window.location.href='?p=resetpwd&&password=error';
                </script>";
        }
        else
        {
            mysqli_query($con," UPDATE admin set password = '$password' where idadmin = '$id' ");
                echo "<script>
                window.location.href='?p=resetpwd&&password=ubah';
                </script>";
        }
    }
    else
    {
        echo "<script>
                alert('Silahka login dulu!');
                window.location.href='login.php';
                </script>";
    }
    
}
?>

<main>
    <div class="container-fluid px-4">
        <br>
        <h3>Ubah Password</h3>
        <hr>
        <form method="post" action="">
        <div class="card">
            <div class="card-body row">
                <div class="col-md-3">Masukan Password Lama</div>
                <div class="col-md-6"><input type="text" name="passwordlama" class="form-control" required="" ></div>
            </div>
            <div class="card-body row">
                <div class="col-md-3">Masukan Password Baru</div>
                <div class="col-md-6"><input type="text" name="password" class="form-control" required="" ></div>
            </div>
            <div class="card-footer">
                <a href="index.php" class="btn btn-danger btn-sm">Kembali</a>
                <button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</main>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <?php if ($_GET['password'] == 'ubah') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Password Berhasil diubah',
                })
            </script>
        <?php } ?>

        <?php if ($_GET['password'] == 'error') { ?>
            <script>
                 Swal.fire({
                  icon: 'error',
                  text: 'Ops password lama yang anda masukan salah!',
                })
            </script>
        <?php } ?>


