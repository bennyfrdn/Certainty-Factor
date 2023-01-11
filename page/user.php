<?php 

//halaman untuk approve akun user yang sudah register

if (isset($_SESSION['nama']) == 0) {
header('location:index.php');
}

if ($status = $_GET['b']) {
    $id = $_GET['id'];
    mysqli_query( $con," UPDATE user SET status = '$status' where iduser = '$id' " );
    echo "<script>
                window.location.href='?p=user&&user=update';
                </script>";
}

if (isset($_GET['a'])) {
    $id = $_GET['id'];
    mysqli_query($con," DELETE from user where iduser = '$id' ");
    echo "<script>
            window.location.href='?p=user&&user=hapus';
            </script>";
}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<main>

    <div class="container-fluid px-4">
        <br>
        <h3>Data User</h3>
        <hr>
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-hover text-center" id="datatablesSimple">
                    <thead>
                        <th style="text-align: center;" width="1%">No</th>
                        <th style="text-align: center;">Nama</th>
                        <th style="text-align: center;">Username</th>
                        <th style="text-align: center;">Nohp</th>
                        <th style="text-align: center;">Opsi</th>
                    </thead>
                    <tbody>

                        <?php 
                        $iduser = $_SESSION['id'];
                        $sql    = mysqli_query($con," SELECT * FROM user 
                                                         ");
                        $no     = 1;
                        while ($d = mysqli_fetch_array($sql)) { ?>
                             <tr>
                                <td><?=$no++?></td>
                                <td><?=ucwords($d['nama'])?></td>
                                <td><?=$d['username']?></td>
                                <td><?=$d['nohp']?></td>
                                <td>
                                    <?php if ($d['status'] == 'aktif') { ?>
                                        <a onclick="return confirm('apakah anda yakin ingin menonaktifkan user ini ?')" style="color:white" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="Akun ini sudah aktif" href='?p=user&b=nonaktif&id=<?=$d['iduser']?>'><span>Nonaktif</span> </a>
                                    <?php } ?>
                                    
                                    <?php if ($d['status'] != 'aktif') { ?>
                                        <a onclick="return confirm('apakah anda yakin ingin mengaktifkan user ini ?')" style="color:white" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Akun ini belum aktif" href='?p=user&b=aktif&id=<?=$d['iduser']?>'><span>Aktifkan</span> </a>
                                    <?php } ?>

                                     <a onclick="return confirm('apakah anda yakin ?')" style="color:white" class="btn btn-danger btn-sm" href='?p=user&a=delete&id=<?=$d['iduser']?>'><span class="fa fa-trash"></span> </a>
                                </td>
                            </tr>


                       <script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</main>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <?php if ($_GET['user'] == 'update') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Berhasil Update Data!',
                })
            </script>
        <?php } ?>

        <?php if ($_GET['user'] == 'hapus') { ?>
            <script>
                 Swal.fire({
                  icon: 'success',
                  text: 'Akun Pengguna Berhasil Dihapus!',
                })
            </script>
        <?php } ?>        
