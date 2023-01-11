<?php 

if (isset($_SESSION['nama']) == 0) {
    header('location:index.php');
    }

if (isset($_GET['a'])) {
    $id = $_GET['id'];
    mysqli_query($con," DELETE from gangguan where idgangguan = '$id' ");
    echo "<script>
            window.location.href='?p=gangguan&&gangguan=hapus';
            </script>";
}
?>

<main>
    <div class="container-fluid px-4">
        <br>
        <h3>Data Penyakit dan Hama</h3>
        <hr>
        <div class="card">
            <div class="card-header">
                <a style="color: white;" href="?p=gangguan_form&a=tambah" class=" btn btn-success btn-sm">Tambah Penyakit dan Hama</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-hover text-center" id="datatablesSimple">
                    <thead>
                        <th style="text-align: center;" width="1%">No</th>
                        <th style="text-align: center;">Kode</th>
                        <th style="text-align: center;">Jenis</th>
                        <th style="text-align: center;">Nama Penyakit / Hama</th>
                        <th style="text-align: center;">Detail Penyakit</th>
                        <th style="text-align: center;">Saran</th>
                        <th style="text-align: center;">Opsi</th>
                    </thead>
                    <tbody>
                        <?php 
                        $sql    = mysqli_query($con," SELECT * FROM gangguan ");
                        $no     = 1;
                        while ($d = mysqli_fetch_array($sql)) { ?>
                             <tr>
                                <td><?=$no++?></td>
                                <td><?=ucwords($d['idgangguan'])?></td>
                                <td><?=ucwords($d['jenis'])?></td>
                                <td><h6><?=ucwords($d['nama_gangguan'])?><h6></td>
                                <td><?=substr($d['desk_gangguan'],0,200)?>...</td>
                                <td><?=substr($d['saran'],0,40)?>...</td>
                                <td>
                                    <a style="color:white" class="btn btn-info btn-sm" href='?p=gangguan_update&b=update&id=<?=$d['idgangguan']?>'><span class="fa fa-edit"></span> </a>

                                    <a onclick="return confirm('apakah anda yakin ?')" style="color:white" class="btn btn-danger btn-sm" href='?p=gangguan&a=delete&id=<?=$d['idgangguan']?>'><span class="fa fa-trash"></span> </a>
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

        <?php if ($_GET['gangguan'] == 'hapus') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Gangguan Berhasil Dihapus!',
                })
            </script>
        <?php } ?>

        <?php if ($_GET['gangguan'] == 'simpan') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Gangguan Berhasil Disimpan!',
                })
            </script>
        <?php } ?>

        <?php if ($_GET['gangguan'] == 'update') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Gangguan Berhasil Diupdate!',
                })
            </script>
        <?php } ?>
