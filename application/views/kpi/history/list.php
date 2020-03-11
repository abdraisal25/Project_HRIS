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
                                    <h2>Daftar Riwayat Penilaian Key Performance Indicator dari <?= $nama ?></h2>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="panel">                       
                                        <div class="panel-body">
                                            <table class="table table-striped dt-responsive nowrap">
                                                <thead>
                                                    <tr style="text-align:center">
                                                        <th>Tahun</th>
                                                        <th>Januari</th>
                                                        <th>Februari</th>
                                                        <th>Maret</th>
                                                        <th>April</th>
                                                        <th>Mei</th>
                                                        <th>Juni</th>
                                                        <th>July</th>
                                                        <th>Agustus</th>
                                                        <th>September</th>
                                                        <th>Oktober</th>
                                                        <th>November</th>
                                                        <th>Desember</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php foreach($data as $n){ ?>
                                                    <tr style="text-align:center; font-size:16px">
                                                        <td> <a href="<?= base_url() ?>kpi/history/graph/<?= $nama ?>&<?= $n{'history_tahun'} ?>/<?= encrypt_url($id_user) ?>"><i class="fa fa-line-chart fa-sm"> <?= $n{'history_tahun'} ?></i></a></td>
                                                        <td><a href="<?= base_url() ?>kpi/history/<?= $nama ?>/<?= encrypt_url($id_user) ?>/<?= 'January '.$n{'history_tahun'} ?>"><?= $n{'history_January'} ?></a></td>
                                                        <td><a href="<?= base_url() ?>kpi/history/<?= $nama ?>/<?= encrypt_url($id_user) ?>/<?= 'February '.$n{'history_tahun'} ?>"><?= $n{'history_February'} ?></a></td>
                                                        <td><a href="<?= base_url() ?>kpi/history/<?= $nama ?>/<?= encrypt_url($id_user) ?>/<?= 'March '.$n{'history_tahun'} ?>"><?= $n{'history_March'} ?></a></td>
                                                        <td><a href="<?= base_url() ?>kpi/history/<?= $nama ?>/<?= encrypt_url($id_user) ?>/<?= 'April '.$n{'history_tahun'} ?>"><?= $n{'history_April'} ?></a></td>
                                                        <td><a href="<?= base_url() ?>kpi/history/<?= $nama ?>/<?= encrypt_url($id_user) ?>/<?= 'May '.$n{'history_tahun'} ?>"><?= $n{'history_May'} ?></a></td>
                                                        <td><a href="<?= base_url() ?>kpi/history/<?= $nama ?>/<?= encrypt_url($id_user) ?>/<?= 'June '.$n{'history_tahun'} ?>"><?= $n{'history_June'} ?></a></td>
                                                        <td><a href="<?= base_url() ?>kpi/history/<?= $nama ?>/<?= encrypt_url($id_user) ?>/<?= 'July '.$n{'history_tahun'} ?>"><?= $n{'history_July'} ?></a></td>
                                                        <td><a href="<?= base_url() ?>kpi/history/<?= $nama ?>/<?= encrypt_url($id_user) ?>/<?= 'August '.$n{'history_tahun'} ?>"><?= $n{'history_August'} ?></a></td>
                                                        <td><a href="<?= base_url() ?>kpi/history/<?= $nama ?>/<?= encrypt_url($id_user) ?>/<?= 'September '.$n{'history_tahun'} ?>"><?= $n{'history_September'} ?></a></td>
                                                        <td><a href="<?= base_url() ?>kpi/history/<?= $nama ?>/<?= encrypt_url($id_user) ?>/<?= 'October '.$n{'history_tahun'} ?>"><?= $n{'history_October'} ?></a></td>
                                                        <td><a href="<?= base_url() ?>kpi/history/<?= $nama ?>/<?= encrypt_url($id_user) ?>/<?= 'November '.$n{'history_tahun'} ?>"><?= $n{'history_November'} ?></a></td>
                                                        <td><a href="<?= base_url() ?>kpi/history/<?= $nama ?>/<?= encrypt_url($id_user) ?>/<?= 'Decemeber '.$n{'history_tahun'} ?>"><?= $n{'history_December'} ?></a></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
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
        $('#datatable').dataTable({
            "paging":   false,
            "ordering": false,
            "info":     false,
            "searching": false
        });
    });
</script>

