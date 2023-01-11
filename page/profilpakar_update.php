 <?php
 //code untuk update biodata level user 
 if (isset($_SESSION['nama']) == 0) {
    header('location:index.php');
    }

 if (isset($_POST['simpan'])) {
    if ($_GET['b'] == 'tambah') {
        $nama       = $_POST['nama'];
        $nohp       = $_POST['nohp'];
        $cekadmin   = mysqli_query($con," SELECT * FROM pakar where nohp = '$nohp' ");

        if (mysqli_num_rows($cekadmin) > 0) {
        echo "<script>
             alert('np yang anda masukkan sudah terdaftar, silahkan masukkan no yang berbeda');
                window.location.href='?p=admin_form';
                </script>";
    }else{
         mysqli_query($con," INSERT INTO pakar values ('','$nama','$nohp') ");
        echo "<script>
             alert('Data user berhasil disimpan');
                window.location.href='?p=page';
                </script>";  }
}else 
    {
        $id         = $_SESSION['id'];
        $nama       = $_POST['nama'];
        $username   = $_POST['username'];
        $nohp       = $_POST['nohp'];

        mysqli_query($con," UPDATE pakar set nama = '$nama', username = '$username', nohp = '$nohp' where idpakar = '$id' ");
        
        echo "<script>
                window.location.href='?p=profilpakar_update&&pakar=update';
                </script>";
    }
    
}elseif ($_GET['b'] == 'update') {
    $id     = $_SESSION['id'];
    $sql    = mysqli_query($con," SELECT * FROM pakar where idpakar = '$id' ");
    $d      = mysqli_fetch_assoc($sql); 

}
?>
<main>
    <div class="container-fluid px-4">
        <br>
        <h3><?=ucfirst($_GET['b'])?> Data Diri</h3>
        <form method="post" action="">
        <div class="card">
            <div class="card-body row">
                <div class="col-md-2">Nama Lengkap</div>
                <div class="col-md-10"><input id="inputEmail" type="text" value="<?=empty($d)?'':$d['nama']?>" name="nama" class="form-control" required="" ></div><br><br>

                <div class="col-md-2">Email</div>
                <div class="col-md-10"><input id="inputEmail" type="text" value="<?=empty($d)?'':$d['username']?>" name="username" class="form-control" required="" ></div><br><br>

                <div class="col-md-2">Nohp</div>
                <div class="col-md-10"><input id="inputEmail" type="number" required="" value="<?=empty($d)?'':$d['nohp']?>" name="nohp" class="form-control" required="" ></div><br><br>
                
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

        <?php if ($_GET['pakar'] == 'update') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Diri Berhasil Di Update!',
                })
            </script>
        <?php } ?>


