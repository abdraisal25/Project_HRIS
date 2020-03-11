<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">View Detail Tasklist</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
        <form class="class-horizontal style-form">
            <?php foreach($data as $n) { ?>
            <div class="row form-group">
                <h3 style="text-align: center">Catatan</h3>
                <p style="text-align: center"><?= $n{'tasklist_catatan'} ?></p>
            </div>
            <div class="row form-group">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Create At</label>
                    <div class="col-lg-9 contorl-label" style="font-weight:bold">: <?php echo $n{'tasklist_create_by'}?></div>
                </div>
            </div>
            <div class="row form-group">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Create By</label>
                    <div class="col-lg-9 contorl-label" style="font-weight:bold">: <?php echo $n{'tasklist_create_at'}?></div>
                </div>
            </div>
            <?php if($n{'tasklist_status'} == 'Selesai' ){ ?>
            <div class="row form-group">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Done</label>
                    <div class="col-lg-9 contorl-label" style="font-weight:bold">: <?php echo $n{'tasklist_done'}?></div>
                </div>
            </div>
            <?php } ?>
            <?php } ?>
        </form>
        </div>
    </div>
    <!--Footer-->
</div>