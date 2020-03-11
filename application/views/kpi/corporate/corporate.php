<style>
.modal-lg {
    max-width: 80% !improtant;
}
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
                                <div class="col-md-12">
                                    <h2>Daftar User Item Key Performance Indicator</h2>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">                       
                                        <div class="panel-body">
                                            <table id="datatable" class="table table-striped dt-responsive nowrap">
                                                <thead>
                                                    <tr>
                                                        <th style=" width:5%; text-align:center">No.</th>
                                                        <th style=" width:20%; text-align:center">Departement</th>
                                                        <th style=" width:20%; text-align:center">Jabatan</th>
                                                        <th style=" width:35%; text-align:center">Nama</th>
                                                        <th style=" width:20%; text-align:center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                    $no = 1;
                                                    foreach($member_user as $n){
                                                ?>
                                                <?php if($n{'id_jabatan'} != $this->session->userdata('jabatan')[0]{'parent_id'}){ ?>
                                                    <tr>
                                                        <td><?= $no ?></td> 
                                                        <td><?= $n{'departement_nama'}?></td>
                                                        <td><?= $n{'jabatan_nama'}?></td>
                                                        <td><?= $n{'user_nama'}?></td>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center">
                                                                <a href="<?= base_url() ?>kpi/corporate/<?= $n{'user_nama'} ?>/<?= encrypt_url($n{'id_user'})?>"><button class="btn btn-default rounded btn-block" title="Item KPI"><i class="fa fa-user"></i> List Item Key Performance</button></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                                    <?php $no++;} ?>
                                                </tbody>
                                                <?php if(!empty($corporate)){ ?>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="5" class="text-center">
                                                            <a href="<?= base_url() ?>kpi/corporate/<?= $this->session->userdata('nama_user') ?>/<?= encrypt_url($this->session->userdata('id_user'))?>"><button class="btn btn-success rounded btn-block btn-lg" title="Item KPI" style="color:#000"><i class="fa fa-user"></i>  List of My Key Performance Indicator Items</button></a>
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                                <?php }?>
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
        <div class="modal-dialog modal-lg" id="fetched-data-add">
            
        </div>
    </div>

<script>
    $(document).ready(function() {
        $('#datatable').dataTable({
            "searching": false,
            "ordering": false,
            "info": false,
            "paging": false,
            "pageLength": 20
        });
        
        $('#modal').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            var menu = $(e.relatedTarget).data('menu');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : "get",
                url : '<?php echo base_url() ?>kpi/corporate/action/modal',
                data :  {id : rowid, menu : menu},
                success : function(data){
                    $('#fetched-data-add').html(data);//menampilkan data ke dalam modal
                }
            });
        });
    });
</script>
