<?php 

if (isset($_SESSION['nama']) == 0) {
    header('location:index.php');
    }

if (isset($_GET['a'])) {
    $id = $_GET['id'];
    mysqli_query($con," DELETE from hasil where kode = '$id' ");
    mysqli_query($con," DELETE from diagnosa where kode_diagnosa = '$id' ");
     echo "<script>
            window.location.href='?p=pemeriksaan&&pemeriksaan=hapus';
            </script>";
}
?>

<main>

    <div class="container-fluid px-4">
        <br>
        <h3>Data Hasil Pemeriksaan</h3>
        <hr>
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-hover text-center" id="datatablesSimple">
                    <thead>
                        <th style="text-align: center;" width="1%">No</th>
                        <th style="text-align: center;">Nama User</th>
                        <th style="text-align: center;">Waktu Pemeriksaan</th>
                        <th style="text-align: center;">Hasil Diagnosis</th>
                        <th style="text-align: center;">Persentase</th>
                        <th style="text-align: center;">Opsi</th>
                    </thead>
                    <tbody>

                        <?php 
                        $iduser = $_SESSION['id'];
                        $level  = $_SESSION['level'];
                        if ($level == 'user') { $where = "WHERE hasil.iduser = '$iduser'"; }
                        else{ $where = ''; }
                        $sql    = mysqli_query($con," SELECT * FROM hasil 
                                                        JOIN gangguan on hasil.idgangguan = gangguan.idgangguan
                                                        JOIN user on hasil.iduser = user.iduser
                                                        ".$where."
                                                         ");
                        $no     = 1;
                        while ($d = mysqli_fetch_array($sql)) { ?>
                             <tr>
                                <td><?=$no++?></td>
                                <td><?=$d['nama']?></td>
                                <td><?=date('H:i A',strtotime($d['waktu']))?>, <?=tanggal(date('Y-m-d',strtotime($d['waktu'])))?></td>
                                <td><?=ucwords($d['nama_gangguan'])?></td>
                                <td><?=number_format($d['hasil']*100,2)?>% </td>
                                <td>
                                    <a style="color:white" class="btn btn-info btn-sm" href='?p=detail&id=<?=$d['kode']?>'><span class="fa fa-eye"></span> </a>
                                    
                                    <a onclick="return confirm('apakah anda yakin ?')" style="color:white" class="btn btn-danger btn-sm" href='?p=pemeriksaan&a=delete&id=<?=$d['kode']?>'><span class="fa fa-trash"></span> </a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</main>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <?php if ($_GET['pemeriksaan'] == 'hapus') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Pemeriksaan Berhasil Dihapus!',
                })
            </script>
        <?php } ?>


