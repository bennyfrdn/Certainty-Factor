<?php 

if (isset($_SESSION['nama']) == 0) {
    header('location:index.php');
    }
if (isset($_POST['simpan'])) {
    if ($_GET['a'] == 'tambah') { 
        
        $kode_gejala    = kode_gejala();
        $gejala         = $_POST['gejala'];
        mysqli_query($con," INSERT into gejala values ('$kode_gejala','$gejala') ");
        echo "<script>
                window.location.href='?p=gejala&&gejala=simpan';
                </script>";
    }
    else{
      echo "<script>
                alert('Data gejala gagal disimpan');
                window.location.href='?p=gejala';
                </script>";
    }
    }
?>

<main>
    <div class="container-fluid px-4">
        <br>
        <h3><?=ucwords($_GET['a'])?> Data Gejala</h3>
        <form method="post" action="">
        <div class="card">

            <div class="card-body row">
                <div class="col-md-2">Kode Gejala</div>
                <div class="col-md-10"><input type="text"name="gejala" class="form-control" value="<?php echo $kode_gejala = kode_gejala(); ?>" required="" readonly ></div><br><br>

                <div class="col-md-2">Nama Gejala</div>
                <div class="col-md-10"><input type="text"name="gejala" class="form-control" required="" ></div> 
            </div>

            <div class="card-footer">
                <a href="?p=gejala" class="btn btn-danger btn-sm">Kembali</a>
                <button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </div>
        </form>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <?php if ($_GET['insert'] == 'reg') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Gejala Berhasil Dihapus!',
                })
            </script>
        <?php } ?>

</main>


