<?php 
if (isset($_GET['a'])) {
    $id = $_GET['id'];
    mysqli_query($con," DELETE from penyakit where idpenyakit = '$id' ");
    echo "<script>
            alert('Data berhasil dihapus');
            window.location.href='?p=penyakit';
            </script>";
}?>

<main>
    <div class="container-fluid px-4">
        <br>
        <h3>Data Penyakit</h3>
        <div class="card">
            <div class="card-header">
                <a style="color: white;" href="?p=penyakit_form&a=tambah" class=" btn btn-success btn-sm">Tambah Data</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped table-hover text-center" id="datatablesSimple">
                    <thead>
                        <th style="text-align: center;" width="1%">No</th>
                        <th style="text-align: center;">Jenis</th>
                        <th style="text-align: center;">Nama Penyakit</th>
                        <th style="text-align: center;">Detail Penyakit</th>
                        <th style="text-align: center;">Saran</th>
                        <th style="text-align: center;">Opsi</th>
                    </thead>
                    <tbody>
                        <?php 
                        $sql    = mysqli_query($con," SELECT * FROM penyakit ");
                        $no     = 1;
                        while ($d = mysqli_fetch_array($sql)) { ?>
                             <tr>
                                <td><?=$no++?></td>
                                <td><?=ucwords($d['jenis'])?></td>
                                <td><?=ucwords($d['nama_penyakit'])?></td>
                                <td><?=substr($d['desk_penyakit'], 4,80)?>...</td>
                                <td><?=substr($d['saran'], 4,80)?>...</td>
                                <td>
                                    <a style="color:white" class="btn btn-info btn-sm" href='?p=penyakit_form&a=update&id=<?=$d['idpenyakit']?>'><span class="fa fa-edit"></span> </a>
                                    <a onclick="return confirm('apakah anda yakin ?')" style="color:white" class="btn btn-danger btn-sm" href='?p=penyakit&a=delete&id=<?=$d['idpenyakit']?>'><span class="fa fa-trash"></span> </a>
                                </td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
