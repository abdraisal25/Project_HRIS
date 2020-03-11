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
                                    <h2>Daftar Progress Item Key Performance Indicator</h2>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="accordion" class="panel-group">
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a href="#grafik" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">Data Grafik Per Hari</a>
                                                </h4>
                                            </div>
                                            <div id="grafik" class="panel-collapse collapse">
                                            <canvas id="myChart" height="100px"></canvas>
                                            </div>
                                        </div>
                                        <!-- <div class="panel">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a href="#kumulatif" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion">Grafik Kumulatif</a>
                                                </h4>
                                            </div>
                                            <div id="kumulatif" class="panel-collapse collapse">
                                            <canvas id="kumulatif" height="100px"></canvas>
                                            </div>
                                        </div> -->
                                        <div class="panel">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">
                                                    <a href="#progress" class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion"> Progress Detail</a>
                                                </h4>
                                            </div>
                                            <div id="progress" class="panel-collapse collapse">
                                            <?php if(empty($data)) {?>
                                                <br>
                                                <h3 style="text-align:center; color:yellow">Belum Terisi</h3>
                                            <?php }else{?>
                                                <table class="table table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th style=" width:5%; text-align:center">No.</th>
                                                            <th style=" width:20%; text-align:center">Tanggal</th>
                                                            <th style="text-align:center">Tercapai</th>
                                                            <th style="text-align:center">Keterangan</th>
                                                            <th style="text-align:center">Create At</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                    $no =1;
                                                        foreach($data as $n) {
                                                    ?>
                                                        <tr style="text-align:center">
                                                            <td><?= $no ?></td>
                                                            <td><?= $n{'progress_create_at'}?></td>
                                                            <td><?= $n{'progress_tercapai'}?></td>
                                                            <td><?= $n{'progress_keterangan'}?></td>
                                                            <td><?= $n{'progress_create_by'}?></td>
                                                        </tr>
                                                        <?php $no++;} ?>
                                                    </tbody>
                                                </table>
                                                <?php } ?>    
                                            </div>
                                        </div>
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
        var graph = <?= json_encode($graph) ?>;
        console.log(graph)
        var tanggal = [];
        var nilai = [];
        var kumulatif = [];
        Object.keys(graph).forEach(e => {
            var n = graph[e];
            tanggal.push(n.tanggal || 0);
            nilai.push(n.progress_tercapai || 0);
            kumulatif.push(n.kumulatif || 0);
        });

        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'line',

            // The data for our dataset
            data: {
                labels: tanggal,
                datasets: [{
                    label: 'Pencapaian Target Per Hari',
                    backgroundColor: 'rgba(32, 230, 54, 0.2)',
                    borderColor: 'rgb(34,187,51)',
                    pointBorderColor: 'rgb(34,187,51)',
                    pointHoverBorderColor: 'rgb(34,187,51)',
                    data: nilai,
                    borderWidth: 1.5
                },{
                    label: 'Pencapaian Target Kumulatif',
                    backgroundColor: 'rgba(52, 212, 227, 0.2)',
                    borderColor: 'rgb(34, 187, 164)',
                    pointBorderColor: 'rgb(34, 167, 187)',
                    pointHoverBorderColor: 'rgb(34, 174, 187)',
                    data: kumulatif,
                    borderWidth: 1.5
                }]
            },

            // Configuration options go here
            options: {
                responsive: true,
                scales: {
                    xAxes: [{
                        // display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Periode'
                        }
                    }],
                    yAxes: [{
                        // display: true,
                        scaleLabel: {
                            display: true,
                            labelString: 'Target'
                        }
                    }]
                }
            }
        });
    });
</script>