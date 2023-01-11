<?php 
if (isset($_POST['simpan'])) {
    if ($_GET['a'] == 'tambah') {
        $nama       = $_POST['nama'];
        $username   = $_POST['username'];
        $password   = $_POST['password'];

        mysqli_query($con," INSERT INTO admin values ('','$nama','$username','$password') ");
        echo "<script>
                alert('Data berhasil disimpan');
                window.location.href='?p=admin';
                </script>";
    }
    else
    {
        $id         = $_GET['id'];
        $nama       = $_POST['nama'];
        $username   = $_POST['username'];
        $password   = $_POST['password'];
        mysqli_query($con," UPDATE admin set nama = '$nama', username = '$username', password = '$password' where idadmin = '$id' ");
        echo "<script>
                alert('Data berhasil disimpan');
                window.location.href='?p=admin';
                </script>";
    }
    
}elseif ($_GET['a'] == 'update') {
    $id     = $_GET['id'];
    $sql    = mysqli_query($con," SELECT * FROM admin where idadmin = '$id' ");
    $d      = mysqli_fetch_assoc($sql); 
}
?>
<main>
    <div class="container-fluid px-4">
        <br>
        <h3><?=ucfirst($_GET['a'])?> Data Admin</h3>
        <form method="post" action="">
        <div class="card">
            <div class="card-body row">
                <div class="col-md-2">Nama Lengkap</div>
                <div class="col-md-10"><input type="text" value="<?=empty($d)?'':$d['nama']?>" name="nama" class="form-control" required="" ></div><br><br>
                <div class="col-md-2">Username</div>
                <div class="col-md-10"><input type="text" value="<?=empty($d)?'':$d['username']?>" name="username" class="form-control" required="" ></div><br><br>
                <div class="col-md-2">Password</div>
                <div class="col-md-10"><input type="text" value="<?=empty($d)?'':$d['password']?>" name="password" class="form-control" required="" ></div>
            </div>
            <div class="card-footer">
                <a href="?p=admin" class="btn btn-danger btn-sm">Kembali</a>
                <button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</main>