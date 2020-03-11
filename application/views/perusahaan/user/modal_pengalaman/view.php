<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">Data Detail Pengalaman Kerja</p>
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
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Gaji Perbulan</label>
                            <div class="col-lg-9 contorl-label" style="font-weight:bold">: <?php echo $n{'pengalaman_gaji'}?></div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Nama Atasan</label>
                            <div class="col-lg-9 contorl-label" style="font-weight:bold">: <?php echo $n{'pengalaman_atasan'}?></div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Jabatan Atasan</label>
                            <div class="col-lg-9 contorl-label" style="font-weight:bold">: <?php echo $n{'pengalaman_jabatan_atasan'}?></div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Alasan Berhenti</label>
                            <div class="col-lg-9 contorl-label" style="font-weight:bold">: <?php echo $n{'pengalaman_berhenti'}?></div>
                        </div>
                    </div>
                <?php } ?>
            </form>
        </div>
    </div>
    <!--Footer-->
</div>