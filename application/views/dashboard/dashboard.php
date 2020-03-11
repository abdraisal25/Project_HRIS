<!--start main content-->
<section id="main-content">
    <div class="space-30"></div>
        <div class="container">
            <!--widget box row-->
            <div class="row">
                <div class="col-sm-4 col-md-4 margin-b-30">
                    <a href="<?= base_url() ?>kpi/corporate/<?= $this->session->userdata('nama_user') ?>/<?= encrypt_url($this->session->userdata('id_user'))?>">
                    <div class="statistic-widget-box bg-success">
                        <i class="fa fa-list-alt"></i>
                        <div class="content overflow-hidden">
                            <h1><?= $corporate ?></h1>
                            <p>Item KPI</p>
                        </div>
                    </div><!--statistic box end-->
                    </a>
                </div><!--col end-->
                <div class="col-sm-4 col-md-4 margin-b-30">
                    <a href="<?= base_url() ?>kpi/tasklist/<?= $this->session->userdata('nama_user') ?>/<?= encrypt_url($this->session->userdata('id_user'))?>">
                    <div class="statistic-widget-box bg-info">
                        <i class="fa fa-tasks"></i>
                        <div class="content overflow-hidden">
                            <h1><?= $tasklist ?></h1>
                            <p>Pending Tasklist</p>
                        </div>
                    </div><!--statistic box end-->
                    </a>
                </div><!--col end-->
                <div class="col-sm-4 col-md-4 margin-b-30">
                    <a href="<?= base_url() ?>kpi/individu/<?= $this->session->userdata('nama_user') ?>/<?= encrypt_url($this->session->userdata('id_user'))?>">
                    <div class="statistic-widget-box bg-warning">
                        <i class="fa fa-star"></i>
                        <div class="content overflow-hidden">
                            <h1><?= $score['total']{'total'} ?></h1>
                            <p>Score</p>
                        </div>
                    </div><!--statistic box end-->
                    </a>
                </div><!--col end-->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <header class="panel-heading">  
                            <div class="panel-actions">
                                <a href="javascript:void(0)" class="panel-action panel-action-toggle" data-panel-toggle=""></a>                                   
                                <a href="javascript:void(0)" class="panel-action panel-action-dismiss" data-panel-dismiss=""></a>
                            </div>
                            <h1 class="panel-title">Grafik Score KPI pada <?= date('Y')?></h1>
                        </header>
                        <div class="panel-body">
                            <canvas id="myChart" height="100px"></canvas>
                        </div><!--end panel body-->
                    </div><!--end panel-->
                </div><!--end col 6-->
            </div><!--row end-->
        </div><!--end container-->

        <script>
    $(document).ready(function() {
        var data = <?= json_encode($data) ?>;
      
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'line',

            // The data for our dataset
            data: {
                labels: ['Januari','Februari','Maret','April','Mei','Juni','July','Agustus','September','Oktober','November','Desember'],
                datasets: [{
                    label: 'Scoring',
                    backgroundColor: 'rgba(54, 198, 211, 0.2)',
                    borderColor: 'rgb(34,187,51)',
                    pointBorderColor: 'rgb(34,187,51)',
                    pointHoverBorderColor: 'rgb(34,187,51)',
                    // data:[data[0]['history_January'],data[0]['history_February'],data[0]['history_March']],
                    data: [data[0]['history_January'],data[0]['history_February'],data[0]['history_March'],data[0]['history_April'],data[0]['history_May'],data[0]['history_June'],data[0]['history_July'],data[0]['history_August'],data[0]['history_September'],data[0]['history_October'],data[0]['history_November'],data[0]['history_December']],
                    borderWidth: 1.5
                }]
            },

            options: {
                responsive: true,
                scales: {
                    xAxes: [{
                        // display: true,
                        scaleLabel: {
                            display: true,
                            labelString: data[0]['history_tahun']
                        }
                    }],
                    yAxes: [{
                        // display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Scroring'
                        }
                    }]
                }
            }
        });
    });
</script>