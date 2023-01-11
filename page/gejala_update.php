<?php 

if (isset($_SESSION['nama']) == 0) {
    header('location:index.php');
    }
if (isset($_POST['simpan'])) {
    if ($_GET['b'] == 'tambah') { 
         $kode_gejala    = kode_gejala();
        $gejala         = $_POST['gejala'];
        mysqli_query($con," INSERT into gejala values ('$kode_gejala','$gejala') ");
        echo "<script>
                window.location.href='?p=gejala';
                </script>";
    }
    else
    {
        $id     = $_GET['id'];
        $gejala = $_POST['gejala'];
        mysqli_query($con," UPDATE gejala set gejala = '$gejala' where idgejala = '$id' ");
       echo "<script>
                window.location.href='?p=gejala&&gejala=update';
                </script>";
    }
}
elseif ($_GET['b'] == 'update') {
    $id     = $_GET['id'];
    $sql    = mysqli_query($con," SELECT * FROM gejala where idgejala = '$id' ");
    $d      = mysqli_fetch_assoc($sql); 
}
?>

<main>
    <div class="container-fluid px-4">
        <br>
        <h3><?=ucwords($_GET['b'])?> Data Gejala</h3>
        <form method="post" action="">
        <div class="card">

            <div class="card-body row">

                <div class="col-md-2">Kode Gejala</div>
                <div class="col-md-10"><input type="text" value="<?=empty($d)?'':$d['idgejala']?>" name="idgejala" class="form-control" required="" readonly></div><br><br>
            

                <div class="col-md-2">Nama Gejala</div>
                <div class="col-md-10"><input type="text" value="<?=empty($d)?'':$d['gejala']?>" name="gejala" class="form-control" required="" ></div>

            </div>
            
            <div class="card-footer">
                <a href="?p=gejala" class="btn btn-danger btn-sm">Kembali</a>
                <button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</main>

