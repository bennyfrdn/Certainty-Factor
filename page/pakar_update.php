 <?php 

if (isset($_SESSION['nama']) == 0) {
    header('location:index.php');
    }
    
if (isset($_POST['simpan'])) {
    
    if ($_GET['b'] == 'tambah') {
        $nama       = $_POST['nama'];
        $username   = $_POST['username'];
        $password   = $_POST['password'];
       
        $cekadmin   = mysqli_query($con," SELECT * FROM admin where username = '$username' ");
        if (mysqli_num_rows($cekadmin) > 0) {
         echo "<script>
               window.location.href='?p=admin_update&&s=error';
                </script>";
    }else{
         mysqli_query($con," INSERT INTO admin values ('','$nama','$username','$password') ");
        echo "<script>
             alert('Data admin berhasil disimpan');
                window.location.href='?p=admin';
                </script>"; 
    }
}else{
        $id         = $_GET['id'];
        $nama       = $_POST['nama'];
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        $nohp       = $_POST['nohp'];
        
        mysqli_query($con," UPDATE pakar set nama = '$nama', username = '$username', password = '$password', nohp = '$nohp' where idpakar = '$id' ");
        
        echo "<script>
                window.location.href='?p=pakar&&s=update';
                </script>";
    }
    
}elseif ($_GET['b'] == 'update') {
    $id     = $_GET['id'];
    $sql    = mysqli_query($con," SELECT * FROM pakar where idpakar = '$id' ");
    $d      = mysqli_fetch_assoc($sql); 
}
?>

<main>
    <div class="container-fluid px-4">
        <br>
        <h3><?=ucfirst($_GET['b'])?> Data Pakar</h3>
        <form method="post" action="">
        <div class="card">
            <div class="card-body row">
                <div class="col-md-2">Nama Lengkap</div>
                <div class="col-md-10"><input id="inputEmail" type="text" value="<?=empty($d)?'':$d['nama']?>" name="nama" class="form-control" required="" >
                </div><br><br>

                <div class="col-md-2">Email</div>
                <div class="col-md-10"><input id="inputEmail" type="email" required="" value="<?=empty($d)?'':$d['username']?>" name="username" class="form-control" required="" >
                </div><br><br>

                <div class="col-md-2">Password</div>
                <div class="col-md-10"><input id="inputEmail" type="text" required="" value="<?=empty($d)?'':$d['password']?>" name="password" class="form-control" required="" >
                </div><br><br>

                <div class="col-md-2">Nohp</div>
                <div class="col-md-10"><input id="inputEmail" type="text" required="" value="<?=empty($d)?'':$d['nohp']?>" name="nohp" class="form-control" required="" >
                </div><br><br>
                
            </div>
            <div class="card-footer">
                <a href="?p=admin" class="btn btn-danger btn-sm">Kembali</a>
                <button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</main>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

      <?php if ($_GET['s'] == 'error') { ?>
            <script>
                 Swal.fire({
                  icon: 'error',
                  text: 'Email yang anda masukkan sudah terdaftar, silahkan masukkan email yang berbeda!',
                })
            </script>
        <?php } ?>
</main>

