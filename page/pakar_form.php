 <?php

 if (isset($_SESSION['nama']) == 0) {
    header('location:index.php');
    }

 if (isset($_POST['simpan'])) {
    if ($_GET['a'] == 'tambah') {
        $nama       = $_POST['nama'];
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $nohp       = $_POST['nohp'];

        //cek dulu apakah di dalam table admin sudah ada username yang sama, kalo ada tampilkan pesan error
        $cekemailadmin     = mysqli_query($con," SELECT * FROM admin where username = '$username' ");
        $cekemailpakar     = mysqli_query($con," SELECT * FROM pakar where username = '$username' ");
        $cekemailuser      = mysqli_query($con," SELECT * FROM user where username = '$username' ");
        $ceknohpuser       = mysqli_query($con," SELECT * FROM user where nohp = '$nohp' ");
        $ceknohppakar      = mysqli_query($con," SELECT * FROM pakar where nohp = '$nohp' ");
        
        
        if (mysqli_num_rows($cekemailadmin) > 0) {
            
        echo "<script>
        window.location.href='?p=pakar_form&a=tambah&&s=email';
        </script>";

        }elseif(mysqli_num_rows($cekemailpakar) > 0) {

        echo "<script>
        window.location.href='?p=pakar_form&a=tambah&&s=email';
        </script>";

        }elseif(mysqli_num_rows($cekemailuser) > 0) {

        echo "<script>
        window.location.href='?p=pakar_form&a=tambah&&s=email';
        </script>";


        }elseif(mysqli_num_rows($ceknohppakar) > 0) {

        echo "<script>
        window.location.href='?p=pakar_form&a=tambah&&s=nohp';
        </script>";


        }elseif(mysqli_num_rows($ceknohpuser) > 0) {

        echo "<script>
        window.location.href='?p=pakar_form&a=tambah&&s=nohp';
        </script>";



        }else{
        //kalau sudah dicek dan kemudian tidak ada username yang sama, maka input data nya
        mysqli_query($con," INSERT INTO pakar values ('','$nama','$username','$password','$nohp') ");

            echo "<script>
            window.location.href='?p=pakar&&s=simpan';
            </script>"; 
    }
    }
}
?>
<main>
    <div class="container-fluid px-4">
        <br>
        <h3><?=ucfirst($_GET['a'])?> Data Pakar</h3>
        <form method="post" action="">
        <div class="card">
            <div class="card-body row">
                <div class="col-md-2">Nama Lengkap</div>
                <div class="col-md-10"><input id="inputEmail" type="text"  name="nama" class="form-control" required="" ></div><br><br>

                <div class="col-md-2">Email</div>
                <div class="col-md-10"><input id="inputEmail" type="email" required="" name="username" class="form-control" required="" ></div><br><br>

                <div class="col-md-2">No Handphone</div>
                <div class="col-md-10"><input id="inputEmail" type="text" required="" name="nohp" class="form-control" required="" ></div><br><br>

                <div class="col-md-2">Password</div>
                <div class="col-md-10"><input type="password" minlength="8" name="password" class="form-control" required="" ></div>
                </div>
                
            <div class="card-footer">
                <a href="?p=admin" class="btn btn-danger btn-sm">Kembali</a>
                <button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan</button>
            </div>
            
        </div>
        </form>
    </div>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <?php if ($_GET['s'] == 'email') { ?>
            <script>
                 Swal.fire({
                  icon: 'error',
                  text: 'Email yang anda masukkan sudah terdaftar, silahkan masukkan email yang berbeda!',
                })
            </script>
        <?php } ?>


        <?php if ($_GET['s'] == 'nohp') { ?>
            <script>
                 Swal.fire({
                  icon: 'error',
                  text: 'Nomor handphone yang anda masukkan sudah terdaftar, silahkan masukkan no yang berbeda!',
                })
            </script>
        <?php } ?>
</main>

