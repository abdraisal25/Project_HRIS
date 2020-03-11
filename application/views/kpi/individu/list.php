<style>
   /* table {border-collapse:collapse; table-layout:fixed; width:310px;} */
   table td {word-wrap:break-word;}
</style>
<!--start main content-->
<section id="main-content">
    <div class="space-30"></div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row mail-header">
                                <div class="col-md-10">
                                    <h2>Daftar Scroring Key Performance Indicator dari <?= $nama ?></h2>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <h2><?= $output ?></h2>
                                    </div>
                                    <div class="panel">                       
                                        <div class="panel-body">
                                            <table id="datatable" class="table table-striped dt-responsive nowrap">
                                                <thead>
                                                    <tr style="text-align:center">
                                                        <td colspan="8" style="background:#22bb33"><strong style="font-size:16px; color:black;">Item Key Performance Indicator</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <th style=" width:5%; text-align:center">No</th>
                                                        <th style=" width:15%; text-align:center">Kategori</th>
                                                        <th style="text-align:center">Item KPI</th>
                                                        <th style=" width:10%; text-align:center">Bobot</th>
                                                        <th style="text-align:center">Target</th>
                                                        <th style=" width:10%; text-align:center">Tercapai</th>
                                                        <th style=" width:10%; text-align:center">Nilai</th>
                                                        <th></th>
                                                        <!-- <th style=" width:13%; text-align:center">Indicator <a href="#" style="color:white" data-toggle="modal" data-target="#modal" data-menu="progress"><i class="fa fa-question-circle fa-lg"></i></a></th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $no = 1;
                                                        foreach($data{'corporate'} as $n){
                                                    ?>
                                                    <tr style="text-align:center">
                                                        <td><?= $no ?></td> 
                                                        <td><?= $n{'kategori_nama'}?></td>
                                                        <td><a href="#" data-corporate="<?= $n{'key_corporate'} ?>" data-toggle="modal" data-target="#modal" data-menu="standart"><?= $n{'corporate_nama'}?> <i class="fa fa-eye fa-sm"></i></a></td>
                                                        <td><?= $n{'corporate_bobot'}?></td>
                                                        <td><?= $n{'corporate_target'}?></td>
                                                        <td><?= $n{'corporate_tercapai'} ?></td>
                                                        <td><strong style="font-size:16px; color:#22bb33;"><?= $n{'total'} ?></strong></td>
                                                        <td></td>
                                                        <!-- <td style="background:#<?= $n{'color'} ?>;"><strong style="color:black"><?= $n{'persentase'} ?> %</strong></td> -->
                                                    </tr>
                                                    <?php $no++;} ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr style="text-align:center">
                                                        <td colspan="8" style="background:#5bc0de"><strong style="font-size:16px; color:black;">Tasklist</strong></td>
                                                    </tr>
                                                    <?php if(empty($data{'tasklist'})){ ?>
                                                    <tr style="text-align:center">
                                                        <td colspan="8"><strong style="font-size:16px">Tidak Ada Tasklist</strong></td>
                                                    </tr>
                                                    <?php }else{ ?>
                                                    <tr style="text-align:center">
                                                        <td><strong>No.</strong></td>
                                                        <td colspan="5"><strong>Item Tasklist</strong></td>
                                                        <td><strong>Nilai</strong></td>
                                                        <td></td>
                                                    </tr>
                                                    <?php
                                                        $no = 1;
                                                        foreach($data{'tasklist'} as $n){
                                                    ?>
                                                    <tr>
                                                        <td style="text-align:center"><?= $no ?></td>
                                                        <td colspan="5"><?= $n{'tasklist_nama'} ?></td>
                                                        <td style="text-align:center"><strong style="font-size:16px; color:#5bc0de;"><?= $n{'tasklist_bobot'} ?></strong></td>
                                                        <td style="text-align:center"></td>
                                                    </tr>
                                                    <?php $no++;} ?>
                                                    <?php } ?>
                                                    <?php if(!empty($data{'sanksi'})){ ?>
                                                    <tr style="text-align:center">
                                                        <td colspan="8" style="background:#bb2124"><strong style="font-size:16px; color:black;">Sanksi</strong></td>
                                                    </tr> 
                                                    <tr style="text-align:center">
                                                        <td></td>
                                                        <td colspan="5"><strong>Item Pelanggaran atau Sanksi</strong></td>
                                                        <td><strong>Nilai</strong></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center"></td>
                                                        <td colspan="5"><?= $data{'sanksi'}[0]{'sanksi_nama'} ?></td>
                                                        <td style="text-align:center"><strong style="font-size:16px; color:#bb2124">- <?= $data{'sanksi'}[0]{'sanksi_nilai'} ?></strong></td>
                                                        <td style="text-align:center"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="text-align:center"></td>
                                                        <td colspan="5"><?= $data{'sanksi'}[0]{'sanksi_keterangan'} ?></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <?php } ?>
                                                    <tr style="text-align:center">
                                                        <td></td>
                                                        <td colspan="5"><strong style="font-size:18px">Total Nilai</strong> <a href="#" style="color:white" data-toggle="modal" data-target="#modal" data-menu="total"><i class="fa fa-question-circle fa-lg"></i></a></td>
                                                        <td style="background:<?= $data{'total'}{'warna'} ?>"><strong style="font-size:18px; color:black;"><?= $data{'total'}{'total'} ?></strong></td>
                                                        <td style="background:<?= $data{'total'}{'warna'} ?>"><strong style="font-size:18px; color:black;"><?= $data{'total'}{'terminologi'} ?></strong></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div><!--panel body end-->
                                    </div>
                                </div>
                            </div><!--row end-->
                        </div>
                    </div>
                </div><!--col-md-12 end-->
            </div><!--row end-->
        </div><!--container end-->

    <div class="modal fade animated rubberBand" id="modal" role="dialog"  aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" style="max-width:700px" id="fetched-data-add">
        
        </div>
    </div>

<script>
    $(document).ready(function() {
        $('#datatable').dataTable({
            "paging":   false,
            "ordering": false,
            "info":     false,
            "searching": false
        });

        $('#modal').on('show.bs.modal', function (e) {
            var corporate = $(e.relatedTarget).data('corporate');
            var menu = $(e.relatedTarget).data('menu');
            var fitur = $(e.relatedTarget).data('fitur');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : "get",
                url : '<?php echo base_url() ?>kpi/individu/action/modal',
                data :  {menu : menu,corporate : corporate, fitur : fitur},
                success : function(data){
                    $('#fetched-data-add').html(data);//menampilkan data ke dalam modal
                }
            });
        });
    });
</script>

