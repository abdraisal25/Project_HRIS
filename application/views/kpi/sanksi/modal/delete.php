<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">Hapus Master Data Sanksi</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
        <form class="class-horizontal style-form" action="<?php echo site_url(). 'kpi/sanksi/action/delete' ?>" method="post">
            <?php foreach($data as $n) { ?>
            <div class="row form-group">
                <p style="text-align: center">Apakah anda ingin mengahapus Master Data Sanksi Tersebut</p>
            </div>
            <div class="modal-footer justify-content-center">
                <input type="hidden" name="id" value="<?php echo $n{'id_sanksi'}?>">
                <button type="submit" name="simpan" class="btn btn-danger rounded btn-lg btn-block"><i class="fa fa-check"></i> Hapus</button>
            </div>
            <?php } ?>
        </form>
        </div>
    </div>
    <!--Footer-->
</div>