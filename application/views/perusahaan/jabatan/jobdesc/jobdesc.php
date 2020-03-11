<style>
    #accordion .panel {
    border-radius: 0;
    border: 0;
    margin-top: 0px;
  }
  #accordion a {
    display: block;
    padding: 10px 15px;
    border-bottom: 1px solid #fff;
    text-decoration: none;
  }
  #accordion .panel-heading a.collapsed:hover{
    background-color: #36c6d3;
    color: white;
    transition: all 0.2s ease-in;
  }
  #accordion .panel-heading a.collapsed:hover::before,
  #accordion .panel-heading a.collapsed:focus::before {
    color: white;
  }
  #accordion .panel-heading {
    padding: 0;
    border-radius: 0px;
    text-align: center;
  }
  #accordion .panel-heading a:not(.collapsed) {
    color: white;
    /* background-color: #36c6d3; */
    transition: all 0.2s ease-in;
  }
  
  /* Add Indicator fontawesome icon to the left */
  #accordion .panel-heading .accordion-toggle::before {
    font-family: 'FontAwesome';
    content: '\f00d';
    float: left;
    color: white;
    font-weight: lighter;
    transform: rotate(0deg);
    transition: all 0.2s ease-in;
  }
  #accordion .panel-heading .accordion-toggle.collapsed::before {
    color: #444;
    transform: rotate(-135deg);
    transition: all 0.2s ease-in;
  }
</style>

<section id="main-content">
    <div class="space-30"></div>
        <div class="container">
        <div class="row">
        <div class="col-sm-12">
            <div class="panel">
                <div class="panel-body">
                    <div class="row mail-header">
                        <div class="col-md-6">
                            <h2>Description Job Of <?= $nama ?> </h2>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="accordion" class="panel-group">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#tujuan" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">Tujuan</a>
                                        </h4>
                                    </div>
                                    <div id="tujuan" class="panel-collapse collapse">
                                        <table class="table table-hover">
                                            <tbody>
                                            <?php if(empty($data['tujuan'])) {?>
                                                <tr style="text-align:center">
                                                    <td>Belum Terisi</td>
                                                </tr>
                                            <?php }else{?>
                                            <?php
                                                foreach($data['tujuan'] as $n){
                                            ?>
                                                <tr style="text-align: center">
                                                    <!-- <th scope="row">1</th> -->
                                                    <td><?= $n{'jobdesc_tujuan'} ?></td>
                                                    <?php if(empty($this->session->userdata('jabatan'))){ ?>
                                                    <td width="100px">
                                                        <div class="ui-buttons" style="text-align:center">
                                                            <!-- <button class="btn btn-primary btn-circle btn-icon" data-id="<?= $n{'id_tujuan'} ?>" data-key="<?= $key ?>" data-nama="<?= $nama ?>" data-jobdesc="Tujuan" data-menu="edit" data-target="#modal" data-toggle="modal" title="Edit"><i class="fa fa-edit"></i></button> -->
                                                            <button class="btn btn-primary btn-circle btn-icon" data-id="<?= $n{'id_tujuan'} ?>" data-key="<?= $key ?>" data-nama="<?= $nama ?>" data-jobdesc="Tujuan" data-menu="delete" data-target="#modal" data-toggle="modal" title="Delete"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </td>
                                                    <?php } ?> 
                                                </tr>
                                                <?php } ?> 
                                            </tbody>
                                            <?php if(empty($this->session->userdata('jabatan'))){ ?>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="2" class="text-center">
                                                        <button class="btn btn-info rounded btn-block btn-lg" data-key="<?= $key ?>" data-nama="<?= $nama ?>" data-jobdesc="Tujuan" data-menu="add" data-target="#modal" data-toggle="modal" title="Tambah Tujuan"><i class="fa fa-plus"></i> Tambah</button>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                            <?php } ?>
                                            <?php }?>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#umum" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">Tanggung Jawab Umum</a>
                                        </h4>
                                    </div>
                                    <div id="umum" class="panel-collapse collapse">
                                        <table class="table table-hover">
                                            <tbody>
                                            <?php if(empty($data['umum'])) { ?>
                                                <tr style="text-align:center">
                                                    <td>Belum Terisi</td>
                                                </tr>
                                            <?php }else{ ?>
                                            <?php
                                                $no=1;
                                                foreach($data['umum'] as $n){
                                            ?>
                                                <tr style="text-align:center">
                                                    <td width="30px"><?= $no ?></td>
                                                    <td><?= $n{'umum_tj'} ?></td>
                                                    <?php if(empty($this->session->userdata('jabatan'))){ ?>
                                                    <td width="100px">
                                                        <div class="ui-buttons" style="text-align:center">
                                                            <button class="btn btn-primary btn-circle btn-icon" data-id="<?= $n{'id_umum'} ?>" data-key="<?= $key ?>" data-nama="<?= $nama ?>" data-jobdesc="umum" data-menu="delete" data-target="#modal" data-toggle="modal" title="Delete"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </td>
                                                    <?php } ?>
                                                </tr>
                                                <?php $no++;} ?>
                                            <?php }?>
                                            </tbody>
                                            <?php if(empty($this->session->userdata('jabatan'))){ ?>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3" class="text-center">
                                                        <button class="btn btn-info rounded btn-block btn-lg" data-jabatan="<?= $id_jabatan[0]{'id_jabatan'} ?>" data-key="<?= $key ?>" data-nama="<?= $nama ?>" data-jobdesc="umum" data-menu="add" data-target="#modal" data-toggle="modal" title="Tambah TanggungJawab Umum"><i class="fa fa-plus"></i> Tambah</button>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#khusus" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">Tanggung Jawab Khusus</a>
                                        </h4>
                                    </div>
                                    <div id="khusus" class="panel-collapse collapse">
                                        <table class="table table-hover">
                                            <tbody>
                                            <tbody>
                                            <?php if(empty($data['khusus'])) { ?>
                                                <tr style="text-align:center">
                                                    <td>Belum Terisi</td>
                                                </tr>
                                            <?php }else{ ?>
                                            <?php
                                                $no=1;
                                                foreach($data['khusus'] as $n){
                                            ?>
                                                <tr>
                                                    <td width="30px"><?= $no ?></td>
                                                    <td><?= $n{'khusus_tj'} ?></td>
                                                    <td width="200px">Skala : <?= $n{'khusus_skala'} ?></td>
                                                    <?php if(empty($this->session->userdata('jabatan'))){ ?>
                                                    <td width="100px">
                                                        <div class="ui-buttons" style="text-align:center">
                                                            <button class="btn btn-primary btn-circle btn-icon" data-key="<?= $key ?>" data-nama="<?= $nama ?>" data-id="<?= $n{'id_khusus'} ?>" data-jobdesc="khusus" data-menu="delete" data-target="#modal" data-toggle="modal" title="Delete"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </td>
                                                    <?php } ?>
                                                </tr> 
                                                <?php $no++;} ?>
                                                <?php } ?>
                                            </tbody>
                                            <?php if(empty($this->session->userdata('jabatan'))){ ?>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="4" class="text-center">
                                                        <button class="btn btn-info rounded btn-block btn-lg" data-key="<?= $key ?>" data-nama="<?= $nama ?>" data-jobdesc="khusus" data-menu="add" data-target="#modal" data-toggle="modal" title="Tambah TanggungJawab Umum"><i class="fa fa-plus"></i> Tambah</button>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#wewenang" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">Wewenang</a>
                                        </h4>
                                    </div>
                                    <div id="wewenang" class="panel-collapse collapse">
                                        <table class="table table-hover">
                                            <tbody>
                                            <tbody>
                                            <?php if(empty($data['wewenang'])) { ?>
                                                <tr style="text-align:center">
                                                    <td>Belum Terisi</td>
                                                </tr>
                                            <?php }else{ ?>
                                            <?php
                                                foreach($data['wewenang'] as $n){
                                            ?>
                                                <tr>
                                                    <!-- <th scope="row">1</th> -->
                                                    <td><?= $n{'jobdesc_wewenang'} ?></td>
                                                    <?php if(empty($this->session->userdata('jabatan'))){ ?>
                                                    <td width="100px">
                                                        <div class="ui-buttons" style="text-align:center">
                                                            <!-- <button class="btn btn-primary btn-circle btn-icon" data-key="<?= $key ?>" data-nama="<?= $nama ?>" data-id="<?= $n{'id_wewenang'} ?>" data-jobdesc="Wewenang" data-menu="edit" data-target="#modal" data-toggle="modal" title="Edit"><i class="fa fa-edit"></i></button> -->
                                                            <button class="btn btn-primary btn-circle btn-icon" data-key="<?= $key ?>" data-nama="<?= $nama ?>" data-id="<?= $n{'id_wewenang'} ?>" data-jobdesc="Wewenang" data-menu="delete" data-target="#modal" data-toggle="modal" title="Delete"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </td>
                                                    <?php } ?>
                                                </tr>
                                                <?php } ?> 
                                                <?php } ?>
                                            </tbody>
                                            <?php if(empty($this->session->userdata('jabatan'))){ ?>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="2" class="text-center">
                                                        <button class="btn btn-info rounded btn-block btn-lg" data-key="<?= $key ?>" data-nama="<?= $nama ?>" data-jobdesc="Wewenang" data-menu="add" data-target="#modal" data-toggle="modal" title="Tambah Wewenang"><i class="fa fa-plus"></i> Tambah</button>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#hasil" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">Hasil Kerja</a>
                                        </h4>
                                    </div>
                                    <div id="hasil" class="panel-collapse collapse">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th style=" width:30px; text-align:center">#</th>
                                                    <th style=" width:300px; text-align:center">Hasil Kerja</th>
                                                    <th style=" width:200px; text-align:center">Periode</th>
                                                    <th style=" width:200px; text-align:center">Tujuan</th>
                                                    <th style=" width:200px; text-align:center">Reported</th>
                                                    <?php if(empty($this->session->userdata('jabatan'))){ ?>
                                                    <th width="100px"></th>
                                                    <?php } ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <tbody>
                                            <?php if(empty($data['hasil'])) { ?>
                                                <tr style="text-align:center">
                                                    <td colspan="6">Belum Terisi</td>
                                                </tr>
                                            <?php }else{ ?>
                                            <?php
                                                $no = 1;
                                                foreach($data['hasil'] as $n) {
                                            ?>
                                                <tr>
                                                    <td><?= $no ?></td>
                                                    <td><?= $n{'hasil_judul'} ?></td>
                                                    <td><?= $n{'hasil_periode'} ?></td>
                                                    <td><?= $n{'hasil_tujuan'} ?></td>
                                                    <td><?= $n{'hasil_report'} ?></td>
                                                    <?php if(empty($this->session->userdata('jabatan'))){ ?>
                                                    <td>
                                                        <div class="ui-buttons" style="text-align:center">
                                                            <button class="btn btn-primary btn-circle btn-icon" data-key="<?= $key ?>" data-nama="<?= $nama ?>" data-id="<?= $n{'id_hasil'} ?>" data-jobdesc="hasil" data-menu="edit" data-target="#modal" data-toggle="modal" title="Edit"><i class="fa fa-edit"></i></button>
                                                            <button class="btn btn-primary btn-circle btn-icon" data-key="<?= $key ?>" data-nama="<?= $nama ?>" data-id="<?= $n{'id_hasil'} ?>" data-jobdesc="hasil" data-menu="delete" data-target="#modal" data-toggle="modal" title="Delete"><i class="fa fa-trash"></i></button>
                                                        </div>
                                                    </td>
                                                    <?php } ?>
                                                </tr>
                                                <?php $no++;} ?>
                                                <?php } ?>
                                            </tbody>
                                            <?php if(empty($this->session->userdata('jabatan'))){ ?>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="6" class="text-center">
                                                        <button class="btn btn-info rounded btn-block btn-lg" data-key="<?= $key ?>" data-nama="<?= $nama ?>" data-jobdesc="hasil" data-menu="add" data-target="#modal" data-toggle="modal" title="Tambah Hasil Kerja"><i class="fa fa-plus"></i> Tambah</button>
                                                    </th>
                                                </tr>
                                            </tfoot>
                                            <?php } ?>
                                        </table>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="#kualifikasi" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">Kualifikasi</a>
                                        </h4>
                                    </div>
                                    <div id="kualifikasi" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <p>Energistically drive standardized communities through user friendly results. Phosfluorescently initiate superior technologies vis-a-vis low-risk high-yield solutions. Objectively facilitate clicks-and-mortar partnerships vis-a-vis superior partnerships. Continually generate long-term high-impact methodologies via wireless leadership. Holisticly seize resource maximizing solutions via user friendly outsourcing.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--row end-->
                </div>
            </div>
        </div><!--col-md-12 end-->
    </div>
    <!--row end-->
        </div><!--container end-->

    <div class="modal fade animated rubberBand" id="modal" role="dialog"  aria-labelledby="myModalLabel">
        <div class="modal-dialog modals-large" style="max-width:600px;" id="fetched-data-add">
            
        </div>
    </div>

<script>
    $(document).ready(function() {
        $('#datatable').dataTable();

        $('#modal').on('show.bs.modal', function (e) {
        var jabatan = $(e.relatedTarget).data('jabatan');
        var nama = $(e.relatedTarget).data('nama');
        var rowid = $(e.relatedTarget).data('id');
        var key = $(e.relatedTarget).data('key');
        var menu = $(e.relatedTarget).data('menu');
        var jobdesc = $(e.relatedTarget).data('jobdesc');
        //menggunakan fungsi ajax untuk pengambilan data
        $.ajax({
            type : "get",
            url : '<?php echo base_url() ?>perusahaan/jabatan/jobdesc/action/modal_jobdesc',
            data :  {id : rowid, menu : menu, jobdesc : jobdesc, key : key, nama : nama, jabatan : jabatan},
            success : function(data){
                $('#fetched-data-add').html(data);//menampilkan data ke dalam modal
            }
        });
    });
    });


</script>