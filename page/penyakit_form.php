<?php 
if (isset($_POST['simpan'])) {
    if ($_GET['a'] == 'tambah') { 
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
                window.location.href='?p=penyakit';
                </script>";
        }else{
            $xx = $rand.'_'.$filename;
            move_uploaded_file($_FILES['foto']['tmp_name'], 'style/img/'.$rand.'_'.$filename);
            mysqli_query($con," INSERT into penyakit values ('','$nama_penyakit','$desk_penyakit','$saran_penyakit','$xx','$jenis') ");
            echo "<script>
                alert('Data berhasil disimpan');
                window.location.href='?p=penyakit';
                </script>";
        }

        
        
    }
    else
    {
        $id             = $_GET['id'];
        $nama_penyakit  = $_POST['nama_penyakit'];
        $desk_penyakit  = $_POST['desk_penyakit'];
        $saran_penyakit = $_POST['saran_penyakit'];
        $jenis          = $_POST['jenis'];
        
        $rand = rand();
        $ekstensi =  array('png','jpg','jpeg','gif');
        $filename = strtolower($_FILES['foto']['name']);
        $ukuran = $_FILES['foto']['size'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if ($filename != null) {
            if(!in_array($ext,$ekstensi) ) {
                echo "<script>
                    alert('Foto gagal diupload, silakan cek kembali foto anda!');
                    window.location.href='?p=penyakit';
                    </script>";
            }else{
                $xx = $rand.'_'.$filename;
                move_uploaded_file($_FILES['foto']['tmp_name'], 'style/img/'.$rand.'_'.$filename);
                mysqli_query($con," UPDATE penyakit set nama_penyakit = '$nama_penyakit',desk_penyakit = '$desk_penyakit', saran = '$saran_penyakit', gambar = '$xx', jenis = '$jenis' where idpenyakit = '$id' ");
                echo "<script>
                    alert('Data berhasil disimpan');
                    window.location.href='?p=penyakit';
                    </script>";
            }
        }
        else
        {
            mysqli_query($con," UPDATE penyakit set nama_penyakit = '$nama_penyakit',desk_penyakit = '$desk_penyakit', saran = '$saran_penyakit', jenis = '$jenis' where idpenyakit = '$id' ");
            echo "<script>
                    alert('Data berhasil disimpan');
                    window.location.href='?p=penyakit';
                    </script>";
        }
        
        
    }
}
elseif ($_GET['a'] == 'update') {
    $id     = $_GET['id'];
    $sql    = mysqli_query($con," SELECT * FROM penyakit where idpenyakit = '$id' ");
    $d      = mysqli_fetch_assoc($sql); 
}
?>
<main>
    <div class="container-fluid px-4">
        <br>
        <h3><?=ucfirst($_GET['a'])?> Data Penyakit</h3>
        <form method="post" action="" enctype="multipart/form-data">
        <div class="card">
            <div class="card-body row">
                <div class="col-md-2">Jenis</div>
                <div class="col-md-10"><select name="jenis" class="form-control" required="">
                        <option value="">Pilih Jenis</option>
                        <option <?php if (!empty($d) and  $d['jenis'] =='penyakit') { echo "selected"; }?> value="penyakit">Penyakit</option>
                        <option <?php if (!empty($d) and  $d['jenis'] =='hama') { echo "selected"; }?> value="hama">Hama</option>
                    </select> </div><br><br>
                <div class="col-md-2">Gambar Penyakit</div>
                <div class="col-md-10"><input type="file" value="<?=empty($d)?'required':''?>" name="foto" class="form-control"  ></div><br><br>
                <div class="col-md-2">Nama Penyakit</div>
                <div class="col-md-10"><input type="text" value="<?=empty($d)?'':$d['nama_penyakit']?>" name="nama_penyakit" class="form-control" required="" ></div><br><br>
                <div class="col-md-2">Deskripsi Penyakit</div>
                <div class="col-md-10"><textarea class="ckeditor" id="ckeditor" name="desk_penyakit"><?=empty($d)?'':$d['desk_penyakit']?></textarea></div><br><br><div class="col-md-2">Saran Penyakit</div>
                <div class="col-md-10"><textarea class="ckeditor" id="ckeditor" name="saran_penyakit"><?=empty($d)?'':$d['saran']?></textarea></div><br><br>
            </div>
            <div class="card-footer">
                <a href="" class="btn btn-danger btn-sm">Kembali</a>
                <button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</main>