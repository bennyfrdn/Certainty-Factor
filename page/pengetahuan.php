<?php

if (isset($_SESSION['nama']) == 0) {
    header('location:index.php');
    }

if (isset($_GET['a'])) {
    $id = $_GET['id'];
    mysqli_query($con," DELETE from pengetahuan where idpengetahuan = '$id' ");

    echo "<script>
            window.location.href='?p=pengetahuan&&pengetahuan=hapus';
            </script>";
}
?>

<main>
    <div class="container-fluid px-4">
        <br>
        <h3>Data Basis Pengetahuan</h3>
        <hr>
        <div class="card">

            <div class="card-header">
                <a style="color: white;" href="?p=pengetahuan_form&a=tambah" class=" btn btn-success btn-sm">Tambah Basis Pengetahuan</a>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-hover text-center" id="datatablesSimple">
                    <thead>
                        <th style="text-align: center;" width="1%">No</th>
                        <th style="text-align: center;">Nama Gangguan</th>
                        <th style="text-align: center;">Gejala</th>
                        <th style="text-align: center;">CFRule(Pakar)</th>
                        <th style="text-align: center;">Opsi</th>
                    </thead>
                    <tbody>
                        <?php 
                        $sql    = mysqli_query($con," SELECT * FROM pengetahuan 
                                                        JOIN gangguan on pengetahuan.idgangguan = gangguan.idgangguan
                                                        JOIN gejala on pengetahuan.idgejala = gejala.idgejala
                                                         ");
                        $no     = 1;
                        while ($d = mysqli_fetch_array($sql)) { ?>
                             <tr>
                                <td><?=$no++?></td>
                                <td><?=ucwords($d['nama_gangguan'])?></td>
                                <td><?=$d['gejala']?>[<?=$d['idgejala']?>]</td>
                                <td><?=$d['cf']?></td>
                                <td>
                                    <a style="color:white" class="btn btn-info btn-sm" href='?p=pengetahuan_form&a=update&id=<?=$d['idpengetahuan']?>'><span class="fa fa-edit"></span> </a>

                                    <a onclick="return confirm('apakah anda yakin ?')" style="color:white" class="btn btn-danger btn-sm" href='?p=pengetahuan&a=delete&id=<?=$d['idpengetahuan']?>'><span class="fa fa-trash"></span> </a>
                                    
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

        <?php if ($_GET['pengetahuan'] == 'hapus') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Basis Pengetahuan Berhasil Dihapus!',
                })
            </script>
        <?php } ?>

        <?php if ($_GET['pengetahuan'] == 'simpan') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Basis Pengetahuan Berhasil Disimpan!',
                })
            </script>
        <?php } ?>

        <?php if ($_GET['pengetahuan'] == 'update') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Basis Pengetahuan Berhasil Diupdate!',
                })
            </script>
        <?php } ?>


