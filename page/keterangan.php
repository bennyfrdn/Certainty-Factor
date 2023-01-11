<main>
            
    <div class="container-fluid px-4">
    <br>
    <h2 class='text text-success'>Keterangan</h2>
    <hr>
    <div class="row">
            <?php 
            $sql    = mysqli_query($con," SELECT * FROM gangguan ");
            $no     = 1;
            while ($d = mysqli_fetch_array($sql)) { ?>
            <div class="col-xl-4 col-md-6">
                <div class="card mb-4" style="border:0px; ">
                    <img style="border: 5px solid #cfcfcf;  box-shadow: 7px 7px; width="100%" height="200" src="style/img/<?=$d['gambar']?>" alt="">
                        <br>

                    <span style="background: #28A745; color: #fff;padding: 6px; font-size: 15px; text-align: center;"><h6><?=ucwords($d['nama_gangguan'])?></h6></span>
                    
                    <span style="background: #6C757D; color: #fff;padding: 6px; font-size: 14px; text-align: center;"> <?=ucwords($d['jenis'])?> </span>
                        <br>
                    
                   <div class="row justify-content-center">
                        <a class="btn btn-success col-md-3 btn-sm" data-bs-toggle="modal" data-bs-target="#modal<?php echo $d['idgangguan']; ?>"><i class="far fa-eye" aria-hidden="true"></i> Detail</a>
                    </div>


<div class="modal fade" id="modal<?php echo $d['idgangguan'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" ><i class="fas fa-bookmark"></i> Detail Untuk <?php echo $d[nama_gangguan]; ?> </h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close" style="opacity: .99;color: #fff;">&times;</button>
            </div>
            <div class="modal-body" style="text-align: justify;text-justify: inter-word;">
              <h4>Deskripsi</h4>
              <p><?php echo $d[desk_gangguan]; ?></p>
              <h4>Saran</h4>
              <p><?php echo $d[saran]; ?></p>

            </div>
            <div class="modal-footer"><button class="btn btn-danger" type="button" data-bs-dismiss="modal">Close</button></div>
        </div>
    </div>
</div>


<script type="text/javascript">
    //- Large modal
button.btn.btn-primary(type='button', data-bs-toggle='modal', data-bs-target='#modal<?php echo $d['idgangguan']; ?>') Large
.modal.fade#exampleModalLg(tabindex='-1', role='dialog', aria-labelledby='myLargeModalLabel', aria-hidden='true')
    .modal-dialog.modal-lg(role='document')
        .modal-content
            .modal-header
                h5.modal-title Large Modal
                button.btn-close(type='button', data-bs-dismiss='modal', aria-label='Close')
            .modal-body
                p This is an example of a large modal.
            .modal-footer
                button.btn.btn-primary(type='button', data-bs-dismiss='modal') Close
</script>       

                </div>
                <hr>
            </div>
            <?php } ?>
        </div>
    </div>
</main>