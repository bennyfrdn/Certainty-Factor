<main>
    <div class="container-fluid px-4">
        <br>
        <div class="row justify-content-center">
            <?php 
            $id     = $_GET['id'];
            $sql    = mysqli_query($con," SELECT * FROM penyakit where idpenyakit = '$id' ");
            $d      = mysqli_fetch_assoc($sql);
            ?>
            <div class="col-xl-4 col-md-6">
                <div class="card mb-4" style="border:0px; ">
                    <img style="border-radius: 3px;" width="100%" src="style/img/<?=$d['gambar']?>" alt="">
                    <br>
                    <span style="border-radius: 3px;background: #34495e;color: #fff;padding: 9px; font-size: 17px; text-align: center;"><?=ucwords($d['nama_penyakit'])?> ( <?=ucwords($d['jenis'])?> )</span>
                </div>
            </div>
            <div class="col-xl-8 col-md-6">
                <div class="card" style="border-color: #03bafc;">
                    <div class="card-header with-border" style="background-color: #03bafc; color: white;">
                        <h6 class="card-title">Detail Penyakit</h6>
                    </div>
                    <div class="card-body">
                        <?=ucfirst($d['desk_penyakit'])?>
                    </div>
                </div>
                <br>
                <div class="card" style="border-color: #fcba03;">
                    <div class="card-header with-border" style="background-color: #fcba03; color: white;">
                        <h6 class="card-title">Saran Penyakit</h6>
                    </div>
                    <div class="card-body">
                        <?=ucfirst($d['saran'])?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>