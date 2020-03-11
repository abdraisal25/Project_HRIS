<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">View Detail Sanksi</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
        <form class="class-horizontal style-form">
            <?php foreach($sanksi_member as $n) { ?>
            <div class="row form-group">
                <h3 style="text-align: center">Catatan</h3>
                <p style="text-align: center"><?= $n{'sanksi_catatan'} == NULL ? 'Tidak Ada Catatan': $n{'sanksi_catatan'} ?></p>
            </div>
            <div class="row form-group">
                <h3 style="text-align: center">Keterangan Sanksi</h3>
                <p style="text-align: center"><?= $n{'sanksi_keterangan'} ?></p>
            </div>
            <?php } ?>
        </form>
        </div>
    </div>
    <!--Footer-->
</div>