<?php 

if (isset($_SESSION['nama']) == 0) {
    header('location:index.php');
    }

$sqlgejala      = mysqli_query($con," SELECT * FROM gejala ");
$sqlpenyakit    = mysqli_query($con," SELECT * FROM gangguan ");
$sqlkondisi     = mysqli_query($con," SELECT * FROM kondisi");

if (isset($_POST['simpan'])) {
    if ($_GET['a'] == 'tambah') { 
        $gejala     = $_POST['gejala'];
        $penyakit   = $_POST['penyakit'];
        $cf         = $_POST['cf'];
        mysqli_query($con," INSERT into pengetahuan (idpengetahuan,idgangguan,idgejala,cf) values ('','$penyakit','$gejala','$cf') ");
        echo "<script>
                window.location.href='?p=pengetahuan&&pengetahuan=simpan';
                </script>";
    }
    else
    {
        $id     = $_GET['id'];
        $gejala     = $_POST['gejala'];
        $penyakit   = $_POST['penyakit'];
        $cf         = $_POST['cf'];
        mysqli_query($con," UPDATE pengetahuan set idgejala = '$gejala', idgangguan = '$penyakit', cf = '$cf' where idpengetahuan = '$id' ");
        echo "<script>
                window.location.href='?p=pengetahuan&&pengetahuan=update';
                </script>";
    }
}
elseif ($_GET['a'] == 'update') {
    $id     = $_GET['id'];
    $sql    = mysqli_query($con," SELECT * FROM pengetahuan where idpengetahuan = '$id' ");
    $dd     = mysqli_fetch_assoc($sql); 
}
?>

<main>
    <div class="container-fluid px-4">
        <br>
        <h3><?=ucwords($_GET['a'])?> Data Basis Pengetahuan</h3>
        <form method="post" action="">
        <div class="card">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <h4><i class='icon fa fa-exclamation-triangle'></i>Petunjuk Pengisian Pakar !</h4>
            Silahkan isi basis aturan atau inferensi pendiagnosaan penyakit dan hama dibawah ini, dengan cara pilih gejala yang sesuai dengan penyakit atau hama yang ada, dan berikan <b>nilai kepastian (CF)</b> dengan cakupan sebagai berikut:<br><br>
                <b>1.0</b> (Pasti)&nbsp;&nbsp;|&nbsp;&nbsp;<b>0.8</b> (Hampir Pasti)&nbsp;&nbsp;|<br>
                <b>0.6</b> (Kemungkinan Besar)&nbsp;&nbsp;|&nbsp;&nbsp;<b>0.4</b> (Mungkin)&nbsp;&nbsp;|<br>
                <b>0.2</b> (Tidak Tahu)&nbsp;&nbsp;|&nbsp;&nbsp;<b><br><br>
    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
            <div class="card-body row">
                <div class="col-md-2">Gejala (IF)</div>
                <div class="col-md-10">
                    <select name="gejala" class="form-control" required="">
                        <option value="">Pilih Gejala</option>
                        <?php while ($d = mysqli_fetch_array($sqlgejala)) { ?>
                            <option <?php if (!empty($dd) and $dd['idgejala'] == $d['idgejala']) { echo "selected"; }?> value="<?=$d['idgejala']?>"><?=ucwords($d['gejala'])?> | <?=ucwords($d['idgejala'])?></option>
                        <?php } ?>
                    </select> 
                </div><br><br>


                <div class="col-md-2">Penyakit/Hama (THEN)</div>
                <div class="col-md-10">
                    <select name="penyakit" class="form-control" required="">
                        <option value="">Pilih Nama Penyakit/Hama</option>
                        <?php while ($d = mysqli_fetch_array($sqlpenyakit)) { ?>
                            <option <?php if (!empty($dd) and $dd['idgangguan'] == $d['idgangguan']) { echo "selected"; }?> value="<?=$d['idgangguan']?>"><?=ucwords($d['nama_gangguan'])?> - (<?=ucwords($d['idgangguan'])?>)</option>
                        <?php } ?>
                    </select>
                </div><br><br>

                <div class="col-md-2">Nilai CFRule</div>
                <div class="col-md-10">
                    <select name="cf" class="form-control" required="">
                        <option value="">Pilih CFRule</option>
                        <?php while ($d = mysqli_fetch_array($sqlkondisi)) { ?>
                            <option <?php if (!empty($dd) and $dd['cf'] == $d['cfrule']) { echo "selected"; }?> value="<?=$d['cfuser']?>"><?=ucwords($d['kondisi'])?> (<?=ucwords($d['cfuser'])?>)</option>
                        <?php } ?>
                    </select> 
                </div><br><br>

            </div>
            <div class="card-footer">
                <a href="?p=pengetahuan" class="btn btn-danger btn-sm">Kembali</a>
                <button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </div>
        </form>
    </div>
</main>