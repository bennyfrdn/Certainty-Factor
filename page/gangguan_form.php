<?php 

if (isset($_SESSION['nama']) == 0) {
    header('location:index.php');
    }
    
if (isset($_POST['simpan'])) {
    if ($_GET['a'] == 'tambah') { 
        $kode_penyakit    = kode_penyakit();
        $nama_penyakit  = $_POST['nama_penyakit'];
        $desk_penyakit  = $_POST['desk_penyakit'];
        $saran_penyakit = $_POST['saran_penyakit'];
        $jenis          = $_POST['jenis'];

        $rand = rand();
        $ekstensi =  array('png','jpg','jpeg','gif');
        $filename = strtolower($_FILES['foto']['name']);
        $ukuran = $_FILES['foto']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
         
        if(!in_array($ext,$ekstensi) ) {
            
             echo "<script>
                alert('Foto gagal diupload, silakan cek kembali foto anda!');
                window.location.href='?p=gangguan';
                </script>";
        }else{
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], 'style/img/'.$rand.'_'.$filename);
            mysqli_query($con," INSERT into gangguan values ('$kode_penyakit','$nama_penyakit','$desk_penyakit','$saran_penyakit','$xx','$jenis') ");

           echo "<script>
                window.location.href='?p=gangguan&&gangguan=simpan';
                </script>";
        }
 
    }else{
                    echo "<script>
                    alert('Data gangguan disimpan');
                    window.location.href='?p=gangguan';
                    </script>";
    } 
}
?>
<main>
    <div class="container-fluid px-4">
        <br>
        <h3><?=ucfirst($_GET['a'])?> Data Penyakit dan Hama</h3>
        <form method="post" action="" enctype="multipart/form-data">
        <div class="card">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <h4><i class='icon fa fa-exclamation-triangle'></i>Petunjuk Pengisian Informasi Penyakit dan Hama !</h4>
            Silahkan isi informasi penyakit dan hama dengan mengisi jenis (Penyakit atau Hama), nama dari penyakit atau hama, deskripsi informasi, serta saran yang berisi bagaimana cara pencegahan dan pengendalian terhadap jenis penyakit atau hama yang dibahas<br><br>
    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
                <div class="card-body row">

                <div class="col-md-2">Kode</div>
                <div class="col-md-10"><input type="text" name="idpenyakit" class="form-control" value="<?php echo $kode_penyakit = kode_penyakit(); ?>" required="" readonly ></div><br><br>

          
                <div class="col-md-2">Jenis</div>

                <div class="col-md-10"><select name="jenis" class="form-control" required="">
                        <option value="">- Pilih Jenis</option>

                        <option <?php if (!empty($d) and  $d['jenis'] =='penyakit') { echo "selected"; }?> value="penyakit">Penyakit</option>
                        <option <?php if (!empty($d) and  $d['jenis'] =='hama') { echo "selected"; }?> value="hama">Hama</option>
                    </select> </div><br><br>

                <div class="col-md-2">Gambar Penyakit</div>
                <div class="col-md-10"><input type="file" name="foto" class="form-control" required="required"  ></div><br><br>

                <div class="col-md-2">Nama Penyakit</div>
                <div class="col-md-10"><input type="text" name="nama_penyakit" class="form-control" required="" ></div><br><br>

                <div class="col-md-2">Deskripsi Penyakit</div>
                <div class="col-md-10"><textarea class="ckeditor" id="desk_penyakit" name="desk_penyakit"><?=empty($d)?'':$d['desk_penyakit']?></textarea></div>
                <br><br>

                <div class="col-md-2">Saran Penyakit</div>
                <div class="col-md-10"><textarea required="" class="ckeditor" id="ckeditor" name="saran_penyakit"><?=empty($d)?'':$d['saran']?></textarea></div><br><br>
                
            </div>
            <div class="card-footer">
                <a href="?p=penyakit" class="btn btn-danger btn-sm">Kembali</a>
                <button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</main>