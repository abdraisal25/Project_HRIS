<style>
.modal-lg {
    max-width: 100% !improtant;
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
                                    <h2>Daftar User Scoring Board Item Key Performance Indicator</h2>
                                </div>
                                <!-- <div class="col-md-3">
                                    <div class="pull-right tooltip-show">
                                        <button data-toggle="modal" data-target="#modal" data-menu="add" class="btn btn-primary rounded" style="width:100%"><i class="fa fa-plus"></i> Tambah</button>
                                    </div>
                                </div> -->
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
                                                    <tr>
                                                        <td><?= $no ?></td> 
                                                        <td><?= $n{'departement_nama'}?></td>
                                                        <td><?= $n{'jabatan_nama'}?></td>
                                                        <td><?= $n{'user_nama'}?></td>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center">
                                                                <a href="<?= base_url() ?>kpi/individu/<?= $n{'user_nama'} ?>/<?= encrypt_url($n{'id_user'})?>"><button class="btn btn-default rounded btn-block" title="Item KPI"><i class="fa fa-star-o"></i> List of Scoring</button></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php $no++;} ?>
                                                </tbody>
                                                <?php if(!empty($corporate)){ ?>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="5" class="text-center">
                                                            <a href="<?= base_url() ?>kpi/individu/<?= $this->session->userdata('nama_user') ?>/<?= encrypt_url($this->session->userdata('id_user'))?>"><button class="btn btn-success rounded btn-block btn-lg" title="Item KPI" style="color:#000"><i class="fa fa-user"></i>  List of My Key Performance Indicator Items</button></a>
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
<script>
    $(document).ready(function() {
        $('#datatable').dataTable();
    });
</script>
