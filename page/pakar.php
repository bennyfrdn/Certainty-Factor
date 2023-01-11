<?php

if (isset($_SESSION['nama']) == 0) {
    header('location:index.php');
    }

if (isset($_GET['a'])) {
    $id = $_GET['id'];
    
    mysqli_query($con," DELETE from pakar where idpakar = '$id' ");
    
       echo "<script>
            window.location.href='?p=pakar&&s=hapus';
            </script>";
}
?>     
<main>
    <div class="container-fluid px-4">
        <br>
        <h3>Data Pakar</h3>
        <hr>
        <div class="card">
            <div class="card-header">
                <a style="color: white;" href="?p=pakar_form&a=tambah" class=" btn btn-success btn-sm">Tambah Pakar</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-hover text-center" id="datatablesSimple">
                    <thead>
                        <th style="text-align: center;" width="1%">No</th>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;">Email</th>
                        <th style="text-align: center;">Opsi</th>
                    </thead>
                    <tbody>
                        
                        <?php 
                        $sql    = mysqli_query($con," SELECT * FROM pakar ");
                        $no     = 1;
                        while ($d = mysqli_fetch_array($sql)) { ?>
                             <tr>
                                <td><?=$no++?></td>
                                <td><?=ucwords($d['nama'])?></td>
                                <td><?=$d['username']?></td>
                                <td>
                                    <a style="color:white" class="btn btn-info btn-sm" href='?p=pakar_update&b=update&id=<?=$d['idpakar']?>'><span class="fa fa-edit"></span> </a>
                                    <a onclick="return confirm('apakah anda yakin ?')" style="color:white" class="btn btn-danger btn-sm" href='?p=pakar&a=delete&id=<?=$d['idpakar']?>'><span class="fa fa-trash"></span> </a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <?php if ($_GET['s'] == 'hapus') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Pakar Berhasil Dihapus!',
                })
            </script>
        <?php } ?>

        <?php if ($_GET['s'] == 'simpan') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Pakar Berhasil Disimpan!',
                })
            </script>
        <?php } ?>

        <?php if ($_GET['s'] == 'update') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Pakar Berhasil Diupdate!',
                })
            </script>
        <?php } ?>

      

</main>


