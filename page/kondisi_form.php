 <?php

 if (isset($_SESSION['nama']) == 0) {
    header('location:index.php');
    }

 if (isset($_POST['simpan'])) {
    if ($_GET['a'] == 'tambah') {
        $kondisi    = $_POST['kondisi'];
        $cfuser     = $_POST['cfuser'];

        mysqli_query($con," INSERT INTO kondisi values ('','$kondisi','$cfuser') ");
        echo "<script>
                window.location.href='?p=kondisi&&kondisi=simpan';
                </script>"; 
    }else{

        $id         = $_GET['id'];
        $kondisi    = $_POST['kondisi'];
        $cfuser     = $_POST['cfuser'];
        
        mysqli_query($con," UPDATE kondisi set kondisi = '$kondisi', cfuser = '$cfuser' where idkondisi = '$id' ");
        echo "<script>
                window.location.href='?p=kondisi&&kondisi=update';
                </script>";
    }
    
}elseif ($_GET['a'] == 'update') {
    $id     = $_GET['id'];
    $sql    = mysqli_query($con," SELECT * FROM kondisi where idkondisi = '$id' ");
    $d      = mysqli_fetch_assoc($sql); 
}
?>

<main>
    <div class="container-fluid px-4">
        <br>
        <h3><?=ucfirst($_GET['a'])?> Data Bobot Certainty Factor</h3>
        <form method="post" action="">

        <div class="card">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4><i class='icon fa fa-exclamation-triangle'></i>Petunjuk Pengisian Bobot !</h4>
        Silahkan isi nilai bobot dengan rentang nilai 0 - 1, disetiap nilai yang di inputkan disertakan dengan deskripsi kondisi pada nilai tersebut, nilai pada bobot ini digunakan oleh pakar ketika mengisi bobot keyakinan pada tiap gejala di dalam menu basis pengetahuan dan bobot ini juga digunakan oleh user pada saat konsultasi<br>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

                <div class="card-body row">
                <div class="col-md-2">Kondisi</div>
                <div class="col-md-10"><input id="inputEmail" type="text" value="<?=empty($d)?'':$d['kondisi']?>" name="kondisi" class="form-control" required="" >
                </div><br><br>

                <div class="col-md-2">Nilai</div>
                <div class="col-md-10"><input id="inputEmail" min="0" step="1" type="float" required="" value="<?=empty($d)?'':$d['cfuser']?>" name="cfuser" class="form-control" required="" >
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

