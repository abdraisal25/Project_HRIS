<!--start main content-->
<section id="main-content">
    <div class="space-30"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row mail-header">
                                <div class="col-md-11">
                                    <h2>Daftar Progress Item Tasklist</h2>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">                       
                                        <div class="panel-body">
                                        <?php if(empty($data)) {?>
                                                <br>
                                                <h3 style="text-align:center; color:yellow">Belum Terisi</h3>
                                            <?php }else{?>
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th style=" width:5%; text-align:center">No.</th>
                                                            <th style=" width:15%; text-align:center">Tanggal</th>
                                                            <th style="width:45%; text-align:center">Progress</th>
                                                            <th style="width:25%; text-align:center">Keterangan</th>
                                                            <th style="width:15%; text-align:center">Create By</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $no =1;
                                                        foreach($data as $n) {
                                                    ?>
                                                        <tr style="text-align:center">
                                                            <td><?= $no ?></td>
                                                            <td><?= $n{'progress_date'}?></td>
                                                            <td><?= $n{'progress_tasklist'}?></td>
                                                            <td><?= $n{'progress_catatan'}?></td>
                                                            <td><?= $n{'progress_create_by'}?></td>
                                                        </tr>
                                                        <?php $no++;} ?>
                                                    </tbody>
                                                </table>
                                            <?php } ?>
                                        </div><!--panel body end-->
                                    </div>
                                </div>
                            </div><!--row end-->
                        </div>
                    </div>
                </div><!--col-md-12 end-->
            </div><!--row end-->
        </div><!--container end-->


