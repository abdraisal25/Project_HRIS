<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-11">Update Progress Item Key Performance Indicator</p>
        <button type="button" class="col-md-1 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
            <form class="class-horizontal style-form" action="<?php echo site_url(). 'kpi/corporate/action/progress' ?>" method="post" enctype="multipart/form-data">
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Data Tercapai</label>
                        <div class="col-lg-10">
                            <input type="text" required name="tercapai" placeholder="Masukan Data Pencapaian" class="form-control num">
                            <input type="hidden" required name="corporate" value="<?= $key ?>">
                            <input type="hidden" required name="nama" value="<?= $nama ?>">
                            <input type="hidden" value="<?= $id_user ?>" required name="user">

                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Keterangan</label>
                        <div class="col-lg-10">
                            <textarea name="keterangan" nama="keterangan" cols="88" rows="3" placeholder="Masukan Keterangan"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="submit" name="simpan" class="btn btn-primary rounded btn-lg btn-block"><i class="fa fa-check"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!--Footer-->
</div>
<script>
$(document).ready(function() {
    $(document).on('keydown','.num', function(e){
        -1!==$
        .inArray(e.keyCode,[46,8,9,27,13,110,190,189]) || /65|67|86|88/
        .test(e.keyCode) && (!0 === e.ctrlKey || !0 === e.metaKey)
        || 35 <= e.keyCode && 40 >= e.keyCode || (e.shiftKey|| 48 > e.keyCode || 57 < e.keyCode)
        && (96 > e.keyCode || 105 < e.keyCode) && e.preventDefault()
    });
});
</script>