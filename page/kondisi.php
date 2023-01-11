<?php 

if (isset($_SESSION['nama']) == 0) {
    header('location:index.php');
    }

if (isset($_GET['a'])) {
    $id = $_GET['id'];
    mysqli_query($con," DELETE from kondisi where idkondisi = '$id' ");
    echo "<script>
            window.location.href='?p=kondisi&&kondisi=hapus';
            </script>";
}
?>

<main>
    <div class="container-fluid px-4">
        <br>
        <h3>Data Bobot</h3>
        <hr>
        <div class="card">
            <div class="card-header">
                <a style="color: white;" href="?p=kondisi_form&a=tambah" class=" btn btn-success btn-sm">Tambah Bobot</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-hover text-center" id="datatablesSimple">
                    <thead>
                        <th style="text-align: center;" width="1%">No</th>
                        <th style="text-align: center;">Kondisi</th>
                        <th style="text-align: center;">CFuser</th>
                        <th style="text-align: center;">Opsi</th>
                    </thead>
                    <tbody>
                        
                        <?php 
                        //diurutkan berdasarkan ascending ( terkecil ke yang terbesar )
                        $sql    = mysqli_query($con," SELECT * FROM kondisi ORDER BY cfuser ASC; ");
                        $no     = 1;
                        while ($d = mysqli_fetch_array($sql)) { ?>
                             <tr>
                                <td><?=$no++?></td>
                                <td><?=ucwords($d['kondisi'])?></td>
                                <td><?=$d['cfuser']?></td>
                                <td>
                                    <a style="color:white" class="btn btn-info btn-sm" href='?p=kondisi_form&a=update&id=<?=$d['idkondisi']?>'><span class="fa fa-edit"></span> </a>
                                    <a onclick="return confirm('apakah anda yakin ?')" style="color:white" class="btn btn-danger btn-sm" href='?p=kondisi&a=delete&id=<?=$d['idkondisi']?>'><span class="fa fa-trash"></span> </a>
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

        <?php if ($_GET['kondisi'] == 'hapus') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Bobot Berhasil Dihapus!',
                })
            </script>
        <?php } ?>

        <?php if ($_GET['kondisi'] == 'simpan') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Bobot Berhasil Disimpan!',
                })
            </script>
        <?php } ?>

        <?php if ($_GET['kondisi'] == 'update') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Data Bobot Berhasil Diupdate!',
                })
            </script>
        <?php } ?>



    

