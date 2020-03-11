<div class="modal-content" >
    <!--Header-->
    <div class="modal-header" style="background-color:#36c6d3">
        <p class="heading lead col-md-8">View Nilai Indikator Tercapai</p>
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
                        </tr>
                    </thead>
                    <tbody>     
                    <?php foreach($progress as $n){ ?>    
                        <tr>
                            <td class="text-center"><?= $n{'persentase_awal'} == null ? 'Kurang Dari '.$n{'persentase_akhir'} : ($n{'persentase_akhir'} == null ? 'Lebih Dari '. $n{'persentase_awal'} : $n{'persentase_awal'}.' - '.$n{'persentase_akhir'})  ?> </td>
                            <td class="text-center" style="background:#<?= $n{'persentase_indikator'} ?>;"></td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--Footer-->
</div>





               