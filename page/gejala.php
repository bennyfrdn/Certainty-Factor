<?php 

if (isset($_SESSION['nama']) == 0) {
    header('location:index.php');
    }

if (isset($_GET['a'])) {
    $id = $_GET['id'];
    mysqli_query($con," DELETE from gejala where idgejala = '$id' ");
    echo "<script>
            window.location.href='?p=gejala&&gejala=hapus';
            </script>";
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" href="style/img/dokter.png">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?=$namaapp?></title>
        <link href="style/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

<main>
    <div class="container-fluid px-4">
        <br>
        <h3>Data Gejala</h3>
        <hr>
        <div class="card">
            <div class="card-header">
                <a style="color: white;" href="?p=gejala_form&a=tambah" class=" btn btn-success btn-sm">Tambah Gejala</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-hover text-center" id="datatablesSimple">
                    <thead>
                        <th style="text-align: center;" width="1%">No</th>
                        <th style="text-align: center;">Kode</th>
                        <th style="text-align: center;">Nama Gejala</th>
                        <th style="text-align: center;">Opsi</th>
                    </thead>
                    <tbody>
                        <?php 
                        $sql    = mysqli_query($con," SELECT * FROM gejala ");
                        $no     = 1;
                        while ($d = mysqli_fetch_array($sql)) { ?>
                             <tr>
                                <td><?=$no++?></td>
                                <td><?=$d['idgejala']?></td>
                                <td><?=$d['gejala']?></td>
                                <td>
                                    <a style="color:white" class="btn btn-info btn-sm" href='?p=gejala_update&b=update&id=<?=$d['idgejala']?>'><span class="fa fa-edit"></span> </a>
                                
                                    <a onclick="return confirm('apakah anda yakin ?')" style="color:white" class="btn btn-danger btn-sm" href='?p=gejala&a=delete&id=<?=$d['idgejala']?>'><span class="fa fa-trash"></span> </a>
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

        <?php if ($_GET['gejala'] == 'hapus') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Gejala Berhasil Dihapus!',
                })
            </script>
        <?php } ?>

        <?php if ($_GET['gejala'] == 'simpan') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Gejala Berhasil Disimpan!',
                })
            </script>
        <?php } ?>

        <?php if ($_GET['gejala'] == 'update') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Gejala Berhasil Diupdate!',
                })
            </script>
        <?php } ?>


