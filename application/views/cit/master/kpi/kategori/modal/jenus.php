<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">Jenis Usaha Corporate</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333">
        <div class="form-panel">
        <form class="class-horizontal style-form">
        <?php foreach($jenus as $n){ ?>
            <button class="btn btn-primary rounded btn-block btn-lg" type="button" onclick="window.location.href='<?= base_url() ?>lubangenak/kpi/corporate/<?= encrypt_url($id) ?>&<?= encrypt_url($n{'id_jenus'}) ?>'" ><?= $n{'jenus_nama'} ?></button>
        <?php } ?>
        </form>
        </div>
    </div>
    <!--Footer-->
</div>