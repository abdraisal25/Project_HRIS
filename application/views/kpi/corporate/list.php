<style>
.select2-container--default .select2-selection--single{
    background-color : #1b1a26;
    color : #fff;
    border : 1;  
}
.select2-container--default .select2-selection--single .select2-selection__rendered{
    color : #fff;
  text-align: center;

}
.select2-container--default .select2-selection--single .select2-selection__placeholder{
    color : #fff;   
}
.select2-results__option--highlighted,
.select2-results__option:hover{
	background:#36c6d3 !important;
}
.select2-results{
    background-color : #fff;
}
.select2-dropdown {
    color : #000;
    text-align: center;
}
.select2-container.select2-container-disabled .select2-choice {
  background-color: #ddd;
  border-color: #a8a8a8;
}
</style>
<!--start main content-->
<section id="main-content">
    <div class="space-30"></div>
        <div class="container">
        <div class="notif-data" data-notif="<?= $this->session->flashdata('notif') ?>"></div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel">
                        <div class="panel-body">
                            <div class="row mail-header">
                                <div class="col-md-10">
                                    <h2>Daftar Item Key Performance Indicator dari <?= $nama ?></h2>
                                </div>
                                    <?php if($level == 0) {?>
                                <div class="col-md-1">
                                    <div class="pull-right tooltip-show" id="penalty">
                                        <button data-toggle="modal" data-id="<?= $id_user ?>" data-nama="<?= $nama ?>" data-target="#modal" data-menu="sanksi" class="btn btn-danger rounded"  <?= $sanksi != NULL || $data == NULL ? 'disabled':''?> style="width:100%"><i class="fa fa-exclamation-triangle"></i> Sanksi</button>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="pull-right tooltip-show">
                                        <button data-toggle="modal" data-id="<?= $id_user ?>" data-nama="<?= $nama ?>" data-target="#modal" data-menu="add" <?= $bobot == 100 ? 'disabled' : '' ?> class="btn btn-primary rounded" style="width:100%"><i class="fa fa-plus"></i> Tambah</button>
                                    </div>
                                </div>
                                    <?php }?>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">                       
                                        <div class="panel-body">
                                            <table id="datatable" class="table table-striped dt-responsive nowrap">
                                                <thead>
                                                    <tr>
                                                        <th colspan="8" style="text-align:center;font-size:20px">
                                                            <select class="js-example-basic-single" required id="periode" style="width:25%">
                                                                <?php foreach($date as $g): ?>
                                                                <option value="<?= $g{'periode'} ?>"><?= $g{'periode'} ?></option>
                                                                <?php endforeach ; ?>
                                                            </select>
                                                        </th>
                                                        <!-- <th style="text-align:center; font-size:30px;" colspan="8"><?= $level == 0 ? date('F Y', strtotime('+1 month', strtotime(date('F Y')))) : date('F Y') ?></th> -->
                                                    </tr>
                                                    <tr>
                                                        <th style=" width:5%; text-align:center">#</th>
                                                        <th style=" width:13%; text-align:center">Kategori</th>
                                                        <th style="text-align:center">Isi Item KPI</th>
                                                        <th style=" width:10%; text-align:center">Target</th>
                                                        <th style="text-align:center">Bobot</th>
                                                        <th style=" width:10%; text-align:center">Tercapai</th>
                                                        <th style=" width:10%; text-align:center"></th>
                                                        <th style=" width:10%; text-align:center"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="month">
                                                    <?php
                                                        $no = 1;
                                                        foreach($data as $n){
                                                    ?>
                                                    <tr style="text-align:center">
                                                        <td><?= $no ?></td> 
                                                        <td><?= $n{'kategori_nama'}?></td>
                                                        <td><?= $n{'corporate_nama'}?></td>
                                                        <td><?= $n{'corporate_target'}?> <?= $n{'corporate_satuan'}?></td>
                                                        <td><?= $n{'corporate_bobot'}?></td>
                                                        <?php if($level == 1){ ?>
                                                            <td style="text-align: center"><a href="#" data-id="<?= $id_user ?>" data-nama="<?= $nama ?>" data-corporate="<?= $n{'key_corporate'} ?>" data-toggle="modal" data-target="#modal" data-menu="progress" title="Update Progress"><i class="fa fa-plus"></i> <?= $n{'corporate_tercapai'} == NULL ? 'Belum Terisi' : $n{'corporate_tercapai'} ?></a></td>
                                                        <?php }else if($level == 0){ ?>
                                                            <td><?= $n{'corporate_tercapai'} ?></td>
                                                        <?php }?>
                                                        <td>
                                                            <div class="ui-buttons" style="text-align:center" >       
                                                                    <button class="btn btn-primary btn-circle btn-icon" data-corporate="<?= $n{'key_corporate'} ?>" data-menu="view" data-target="#modal" data-toggle="modal" title="View Detail"><i class="fa fa-eye"></i></button>
                                                                <?php if($level == 0){ ?>
                                                                    <button class="btn btn-primary btn-circle btn-icon" data-id="<?= $id_user ?>" data-nama="<?= $nama ?>" data-corporate="<?= $n{'key_corporate'} ?>" data-menu="delete" data-target="#modal" data-toggle="modal" title="Hapus"><i class="fa fa-trash"></i></button>
                                                                <?php } ?>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <a href="<?= base_url() ?>kpi/corporate/progress/<?= encrypt_url($n{'key_corporate'})?>"><button class="btn btn-default rounded btn-block">View Progress <i class="fa fa-arrow-right"></i></button></a>        
                                                        </td>
                                                    </tr>
                                                    <?php $no++;} ?>
                                                </tbody>
                                                <tfoot>
                                                    <?php if($bobot != 0){ ?>
                                                    <tr style="text-align:center" id="bobot">
                                                        <td colspan="4"><strong style="font-size:14px">Total</strong></td>
                                                        <td><?= $bobot ?></td>
                                                        <td colspan="3"></td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php if(!empty($sanksi)) { ?>
                                                    <tr style="background-color:#bb2124" id="note">
                                                        <th colspan="6" style="color:black;">
                                                            <strong style="font-size:20px">PERINGATAN !!!</strong> Terkena Penalty <strong style="font-size:20px"><?= $sanksi[0]{'sanksi_nama'}?></strong> Pengurangan Point Sebesar <strong style="font-size:20px"><?= $sanksi[0]{'sanksi_nilai'}?> Point <a href="#" style="color:black" data-sanksi="<?= $sanksi[0]{'id_sanksi'} ?>" data-toggle="modal" data-target="#modal" data-menu="view_sanksi" title="View Sanksi"><i class="fa fa-question-circle"></i></a></strong>
                                                        </th>
                                                        <th style="color:black;">
                                                        <?php if($level == 0){ ?>
                                                            <div class="ui-buttons" style="text-align:center" >       
                                                                <button class="btn btn-primary btn-circle btn-icon" data-id="<?= $id_user ?>" data-nama="<?= $nama ?>" data-sanksi="<?= $sanksi[0]{'id_sanksi'} ?>" data-menu="delete_sanksi" data-target="#modal" data-toggle="modal" title="Hapus"><i class="fa fa-trash"></i></button>
                                                            </div>
                                                        <?php } ?>
                                                        </th>
                                                        <th></th>
                                                    </tr>
                                                    <?php } ?>
                                                    <tr id="tasklist">
                                                        <th colspan="8">
                                                            <a href="<?= base_url() ?>kpi/tasklist/<?= $nama ?>/<?= encrypt_url($id_user) ?>"><button class="btn btn-success rounded btn-block btn-lg" <?= $data == NULL ? 'disabled':''?> title="Item KPI" style="color:#000"><i class="fa fa-user"></i>  List of Tasklist Items</button></a>
                                                        </th>
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
        $('#periode').select2({});
        $('#datatable').dataTable({
            "sDom": '<"row view-filter"<"col-sm-12"<"pull-left"i><"pull-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"p>>>',
            "searching": false,
            "ordering": false,
            "info": false,
            "paging": false,
            "pageLength": 20
        });
        
        $('#modal').on('show.bs.modal', function (e) {
            var rowid = <?= json_encode($id_user) ?>;
            var menu = $(e.relatedTarget).data('menu');
            var corporate = $(e.relatedTarget).data('corporate');
            var nama = <?= json_encode($nama) ?>;
            var sanksi = $(e.relatedTarget).data('sanksi');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : "get",
                url : "<?php echo base_url() ?>kpi/corporate/action/modal",
                data :  {id : rowid, menu : menu, corporate : corporate, nama : nama, sanksi :sanksi},
                success : function(data){
                    $('#fetched-data-add').html(data);//menampilkan data ke dalam modal
                }
            });
        });
        
        $(document).on('select2:select','#periode', function (e) {
            var user = <?= json_encode($id_user) ?>;
            var periode = e.params.data.id;
            $.ajax({
                type: "get",
                url : "<?= base_url() ?>kpi/corporate/action/month",
                data : {user : user, periode : periode},
                success : function(response){
                    let data = JSON.parse(response);
                    console.log(data)
                    var html = '';
                    var no  = 0;
                    if(data.data == ''){
                        html +=
                        `<tr style="text-align:center">`
                            +`<td colspan="8">Data Tidak Ada</td>`
                        +`</tr>`;
                    }else{
                        $.each(data.data, function(i,n){
                        no++;
                        html +=
                        `<tr style="text-align:center">`
                            +`<td style=" width:5%;">`+no+`</td>` 
                            +`<td style=" width:15%;">`+n.kategori_nama+`</td>`
                            +`<td>`+n.corporate_nama+`</td>`
                            +`<td>`+n.corporate_target+` `+n.corporate_satuan+`</td>`
                            +`<td>`+n.corporate_bobot+`</td>`;

                            if(data.level == 1){
                                html += `<td style="text-align: center"><a href="#" data-corporate="`+n.key_corporate+`" data-toggle="modal" data-target="#modal" data-menu="progress" title="Update Progress"><i class="fa fa-plus"></i> `+n.corporate_tercapai+`</a></td>`;
                            }else if(data.level == 0){
                                html += `<td>`+n.corporate_tercapai+`</td>`;
                            }
                            html +=
                            `<td>`
                                +`<div class="ui-buttons" style="text-align:center" >`
                                    +`<button class="btn btn-primary btn-circle btn-icon" data-corporate="`+n.key_corporate+`" data-menu="view" data-target="#modal" data-toggle="modal" title="View Detail"><i class="fa fa-eye"></i></button>`;
                                    if(data.level == 0){
                                        html += `<button class="btn btn-primary btn-circle btn-icon" data-corporate="`+n.key_corporate+`" data-menu="delete" data-target="#modal" data-toggle="modal" title="Hapus"><i class="fa fa-trash"></i></button>`;
                                    }
                            html +=
                                `</div>`
                            +`</td>`
                            +`<td>`
                                +`<a href="<?= base_url() ?>kpi/corporate/progress/`+data.link[i]+`"><button class="btn btn-default rounded btn-block">View Progress <i class="fa fa-arrow-right"></i></button></a>`
                            +`</td>`
                        +`</tr>`;
                        })
                    }
                    if(data.bobot == ''){
                        $('#bobot').hide();
                    }else{
                        $('#bobot').show();
                        $('#bobot').html(
                                        `<td colspan="4"><strong style="font-size:14px">Total</strong></td>
                                        <td>`+data.bobot+`</td>
                                        <td colspan="3"></td>`
                        );
                    }
                    if(data.output == 1){
                        $('#note').show();
                        $('#tasklist').show();
                        $('#penalty').show();
                    }else{
                        $('#note').hide();
                        $('#tasklist').hide();
                        $('#penalty').hide();
                    }      
                    $('#month').html(html);
                }  
            })
        });
    });


</script>

