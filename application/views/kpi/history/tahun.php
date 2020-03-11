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
                                    <h2>Grafik Kinerja dari <?= $nama ?> (<?= $tahun ?>) </h2>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <canvas id="myChart" height="100px"></canvas>
                                </div>
                            </div><!--row end-->
                        </div>
                    </div>
                </div><!--col-md-12 end-->
            </div><!--row end-->
        </div><!--container end-->

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