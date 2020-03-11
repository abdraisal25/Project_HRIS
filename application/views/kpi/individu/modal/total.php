<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">View Nilai Key Performance Indicator</p>
        <button type="button" class="col-md-4 close" style="text-align:right" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true" class="white-text">&times;</span>
        </button>
    </div>
    <!--Header-->
    
    <!--Body-->
    <div class="modal-body" style="background-color:#333"> 
                 
                        <div class="row">
                            <div class="bsc-tbl-cls">
                                <table class="table table-cl table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="text-align:center">Range</th>
                                            <th style="text-align:center">Terminologi</th>
                                            <th style="text-align:center">Kategori</th>
                                        </tr>
                                    </thead>
                                    <tbody>     
                                    <?php foreach($total as $n){ ?>    
                                        <tr>
                                            <td class="text-center"><?= $n{'indikator_awal'} == null ? 'Kurang Dari '.$n{'indikator_akhir'} : ($n{'indikator_akhir'} == null ? 'Lebih Dari '. $n{'indikator_awal'} : $n{'indikator_awal'}.' - '.$n{'indikator_akhir'})  ?> </td>
                                            <td class="text-center" style="background:<?= $n{'indikator_terminologi'} ?>"></td>
                                            <td class="text-center"><?= $n{'indikator_nama'} ?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    <!--Footer-->
</div>





               