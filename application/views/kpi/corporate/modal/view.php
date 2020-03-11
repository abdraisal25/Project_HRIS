<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">View Detail</p>
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
                <p style="text-align: center"><?= $n{'corporate_keterangan'} ?></p>
            </div>
            <div class="row form-group">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Create At</label>
                    <div class="col-lg-9 contorl-label" style="font-weight:bold">: <?php echo $n{'corporate_create_by'}?></div>
                </div>
            </div>
            <div class="row form-group">
                <div class="form-group">
                    <label class="col-lg-3 control-label">Create By</label>
                    <div class="col-lg-9 contorl-label" style="font-weight:bold">: <?php echo $n{'corporate_create_at'}?></div>
                </div>
            </div>
            <div class="row form-group" id="nilai">
                <div class="form-group">
                    <div class="bsc-tbl-cls">
                        <table class="table table-cl table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center" colspan="10" style="background-color:#5bc0de"><strong style="font-size:20px"><?= $n{'nilai_jenis'} ?></strong></th>
                                </tr>
                                <tr style="color:#1A1C19">
                                    <th class="text-center" style="background-color:#FF0000">4</th>
                                    <th class="text-center" style="background-color:#FF0000">5</th>
                                    <th class="text-center" style="background-color:#FF0000">6</th>
                                    <th class="text-center" style="background-color:#F0FF00">7</th>
                                    <th class="text-center" style="background-color:#F0FF00">8</th>
                                    <th class="text-center" style="background-color:#F0FF00">9</th>
                                    <th class="text-center" style="background-color:#15FF00">10</th>
                                    <th class="text-center" style="background-color:#15FF00">11</th>
                                    <th class="text-center" style="background-color:#15FF00">12</th>
                                    <th class="text-center" style="background-color:#15FF00">13</th>
                                </tr>
                            </thead>
                            <tbody>                                    
                                <tr>
                                    <td class="text-center"><?= $n{'nilai_4'} ?></td>
                                    <td class="text-center"><?= $n{'nilai_5'} ?></td>
                                    <td class="text-center"><?= $n{'nilai_6'} ?></td>
                                    <td class="text-center"><?= $n{'nilai_7'} ?></td>
                                    <td class="text-center"><?= $n{'nilai_8'} ?></td>
                                    <td class="text-center"><?= $n{'nilai_9'} ?></td>
                                    <td class="text-center"><?= $n{'nilai_10'} ?></td>
                                    <td class="text-center"><?= $n{'nilai_11'} ?></td>
                                    <td class="text-center"><?= $n{'nilai_12'} ?></td>
                                    <td class="text-center"><?= $n{'nilai_13'} ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <h3 style="text-align: center">TIPS!!!</h3>
                <p style="text-align: center"><strong style="font-size:20px"><?= $tips ?></strong></p>
            </div>
            <?php } ?>
        </form>
        </div>
    </div>
    <!--Footer-->
</div>