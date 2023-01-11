<?php 
if (isset($_GET['a'])) {
    $id = $_GET['id'];
    mysqli_query($con," DELETE from admin where idadmin = '$id' ");
    echo "<script>
            alert('Data berhasil dihapus');
            window.location.href='?p=admin';
            </script>";
}?>

<main>
    <div class="container-fluid px-4">
        <br>
        <h3>Data Admin</h3>
        <div class="card">
            <div class="card-header">
                <a style="color: white;" href="?p=admin_form&a=tambah" class=" btn btn-success btn-sm">Tambah Data</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-hover text-center" id="datatablesSimple">
                    <thead>
                        <th style="text-align: center;" width="1%">No</th>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;">Username</th>
                        <th style="text-align: center;">Opsi</th>
                    </thead>
                    <tbody>
                        <?php 
                        $sql    = mysqli_query($con," SELECT * FROM admin ");
                        $no     = 1;
                        while ($d = mysqli_fetch_array($sql)) { ?>
                             <tr>
                                <td><?=$no++?></td>
                                <td><?=ucwords($d['nama'])?></td>
                                <td><?=$d['username']?></td>
                                <td>
                                    <a style="color:white" class="btn btn-info btn-sm" href='?p=admin_form&a=update&id=<?=$d['idadmin']?>'><span class="fa fa-edit"></span> </a>
                                    <a onclick="return confirm('apakah anda yakin ?')" style="color:white" class="btn btn-danger btn-sm" href='?p=admin&a=delete&id=<?=$d['idadmin']?>'><span class="fa fa-trash"></span> </a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
