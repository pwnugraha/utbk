<!-- Begin Page Content -->

<div class="container-fluid mb-4">
    <div class="row mb-4 menu-statistik">
        <div class="col-lg-12 ">
            <button id="activity" class="text-hitam mr-3 btn menu-statistik-active">Activity Progress</button>
            <button id="history" class="text-hitam btn">History</button>
        </div>
    </div>

    <div class="row activity">
        <div class="col text-center">
            <div class="text-biru h4 mb-5"> Nilai tryout kamu sedang kami proses <br> silahkan cek lagi ditanggal <b> 27 </b> ya </div>
            <img src="<?= base_url('asset/User/img/statistik2.svg') ?>" width="45%" class="img-fluid" alt="">
        </div>
    </div>

    <!-- Activity -->
    <!-- <div class="row mb-5 activity">
        <div class="col-lg-8">
            <div class="card shadow welcome border-0 mb-3" style="border-radius: 1em;">
                <div class="card-body">
                    <div class="h5 text-hitam">Tryout Performance</div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>
        <div class="col-xl-1"></div>
        <div class="col-lg-3">
            <div class="card shadow" style="background-color: #2D62ED; border-radius: 2em;">
                <div class="card-body text-light border-0">
                    <img src="<?= base_url('asset/user/') ?>img/file.png" alt="">
                    <div class="h1 mb-0">Disc 15%</div>
                    <div class="mb-4">6x tryout</div>
                    <div class="text-right">
                        <a href="#" class="text-light">
                            <b>Beli sekarang</b>
                            <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-up-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="background-color: rgba(216, 216, 216, 0.514); padding: 10px; border-radius: 50%">
                                <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-5 activity">
        <div class="col-lg-4">
            <div class="card shadow mb-4" style="border-radius: 1em;">
                <div class="card-body">
                    <div class="h5 text-hitam">
                        <table width="100%">
                            <tr>
                                <td>Rata-rata nilai permapel TKA</td>
                                <td class="text-right">
                                    <a href="" class="text-dark">
                                        <img src="<?= base_url('asset/user/') ?>img/menu-3.png" class="img-fluid">
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <hr>

                    <div class="range-mk">
                        <table width="100%">
                            <tr>
                                <td class="text-hitam">Sejarah</td>
                                <td class="text-right pr-3"><small>700.25</small></td>
                            </tr>
                        </table>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="700" aria-valuemin="0" aria-valuemax="1000"></div>
                        </div>
                    </div>

                    <div class="range-mk">
                        <table width="100%">
                            <tr>
                                <td class="text-hitam">Geografi</td>
                                <td class="text-right pr-3"><small>620.25</small></td>
                            </tr>
                        </table>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="700" aria-valuemin="0" aria-valuemax="1000"></div>
                        </div>
                    </div>

                    <div class="range-mk">
                        <table width="100%">
                            <tr>
                                <td class="text-hitam">Ekonomi</td>
                                <td class="text-right pr-3"><small>550.00</small></td>
                            </tr>
                        </table>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="700" aria-valuemin="0" aria-valuemax="1000"></div>
                        </div>
                    </div>

                    <div class="range-mk">
                        <table width="100%">
                            <tr>
                                <td class="text-hitam">Sosiologi</td>
                                <td class="text-right pr-3"><small>427.36</small></td>
                            </tr>
                        </table>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="700" aria-valuemin="0" aria-valuemax="1000"></div>
                        </div>
                    </div>

                    <div class="range-mk">
                        <table width="100%">
                            <tr>
                                <td class="text-hitam">Matematika Soshum</td>
                                <td class="text-right pr-3"><small>322.00</small></td>
                            </tr>
                        </table>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="700" aria-valuemin="0" aria-valuemax="1000"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4" style="border-radius: 1em;">
                <div class="card-body">
                    <div class="h5 text-hitam">
                        <table width="100%">
                            <tr>
                                <td>Rata-rata nilai permapel TPS</td>
                                <td class="text-right">
                                    <a href="" class="text-dark">
                                        <img src="<?= base_url('asset/user/') ?>img/menu-3.png" class="img-fluid">
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <hr>

                    <div class="range-mk">
                        <table width="100%">
                            <tr>
                                <td class="text-hitam">Penalaran Umum</td>
                                <td class="text-right pr-3"><small>700.25</small></td>
                            </tr>
                        </table>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="700" aria-valuemin="0" aria-valuemax="1000"></div>
                        </div>
                    </div>

                    <div class="range-mk">
                        <table width="100%">
                            <tr>
                                <td class="text-hitam">Pemahaman bacaan</td>
                                <td class="text-right pr-3"><small>620.25</small></td>
                            </tr>
                        </table>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="700" aria-valuemin="0" aria-valuemax="1000"></div>
                        </div>
                    </div>

                    <div class="range-mk">
                        <table width="100%">
                            <tr>
                                <td class="text-hitam">Pengetahuan Umum</td>
                                <td class="text-right pr-3"><small>550.00</small></td>
                            </tr>
                        </table>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="700" aria-valuemin="0" aria-valuemax="1000"></div>
                        </div>
                    </div>

                    <div class="range-mk">
                        <table width="100%">
                            <tr>
                                <td class="text-hitam">Pengetahuan Kuantitatif</td>
                                <td class="text-right pr-3"><small>427.36</small></td>
                            </tr>
                        </table>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 40%" aria-valuenow="700" aria-valuemin="0" aria-valuemax="1000"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-xl-1"></div>
        <div class="col-md-12 col-lg-3">
            <div class="card shadow text-light mb-2" style="background-color: #182F64; border-radius: 1em;">
                <div class="card-body">
                    <div class="table-responsive">
                        <table width="100%">
                            <tr>
                                <td width="30%">
                                    <canvas id="chartProgress" height="50" width="100"></canvas>
                                </td>
                                <td class="pl-3">
                                    <div class="h3 mb-0">
                                        <table width="100%">
                                            <tr>
                                                <td>UGM</td>
                                                <td class="text-right"><img src="img/menu-3-putih.png" alt=""></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="mb-4">Fakultas Ekonomi</div>
                                    <div class="h3">6.312</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card shadow text-light" style="background-color: #182F64; border-radius: 1em;">
                <div class="card-body">
                    <div class="table-responsive">

                        <table width="100%">
                            <tr>
                                <td width="30%">
                                    <canvas id="chartProgress2" height="50" width="100"></canvas>
                                </td>
                                <td class="pl-3">
                                    <div class="h3 mb-0">
                                        <table width="100%">
                                            <tr>
                                                <td>UNS</td>
                                                <td class="text-right"><img src="img/menu-3-putih.png" alt=""></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="mb-4">Akuntansi</div>
                                    <div class="h3">10.312</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div> -->

</div>

<!-- HISTORY -->
<div class="row mb-5 history hide-content">
    <div class="col-lg-8">
        <div class="card shadow welcome border-0 mb-4" style="border-radius: 1em;">
            <div class="card-body">
                <div class="h5 text-hitam mb-4">History Tryout</div>
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr class="text-hitam">
                                <th>ID Tryout</th>
                                <th>Nama Tryout</th>
                                <th>Tanggal Sesi</th>
                                <th>Jam Sesi</th>
                                <th>Mengikuti Tryout Pada</th>
                                <th>Nilai</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($exam_history)) :
                                foreach ($exam_history as $i) :
                            ?>
                                    <tr>
                                        <td><?= $i['id'] ?></td>
                                        <td><?= $i['name'] ?></td>
                                        <td><?= date('d', strtotime($i['start_date'])) . ' - ' . date('d', strtotime($i['end_date'])) . ' ' . get_month(date('n', strtotime($i['end_date']))) . ' ' . date('Y', strtotime($i['end_date'])) ?></td>
                                        <td><?= date('H:i', strtotime($i['start_time'])) . ' - ' . date('H:i', strtotime($i['end_time'])) ?></td>
                                        <td><?= date('d', strtotime($i['date'])) . ' ' . get_month(date('n', strtotime($i['date']))) . ' ' . date('Y', strtotime($i['date'])) . ' - ' . date('H:i', strtotime($i['date'])) ?></td>
                                        <td><?= ($i['score'] == NULL) ? '-' : $i['score'] ?></td>
                                        <td><img src="img/menu-3.png" class="img-fluid" alt=""></td>
                                    </tr>
                            <?php endforeach;
                            endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- <div class="card shadow welcome border-0" style="border-radius: 1em;">
            <div class="card-body">
                <div class="h5 text-hitam">Orders</div>
                <div class="table-responsive">
                    <table class="table table-sm table-hover">
                        <thead>
                            <tr class="text-hitam">
                                <th>ID Tryout</th>
                                <th>Nama Tryout</th>
                                <th>Date</th>
                                <th>Score</th>
                                <th>Status</th>
                                <th>Konsultasi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>003452</td>
                                <td>Tryout Soshum</td>
                                <td>22 June 2020</td>
                                <td>581.000</td>
                                <td>Complete</td>
                                <td>IN332942</td>
                                <td><img src="img/menu-3.png" class="img-fluid" alt=""></td>
                            </tr>
                            <tr>
                                <td>003452</td>
                                <td>Tryout Soshum</td>
                                <td>22 June 2020</td>
                                <td>581.000</td>
                                <td>Complete</td>
                                <td>IN332942</td>
                                <td><img src="img/menu-3.png" class="img-fluid" alt=""></td>
                            </tr>
                            <tr>
                                <td>003452</td>
                                <td>Tryout Soshum</td>
                                <td>22 June 2020</td>
                                <td>581.000</td>
                                <td>Complete</td>
                                <td>IN332942</td>
                                <td><img src="img/menu-3.png" class="img-fluid" alt=""></td>
                            </tr>
                            <tr>
                                <td>003452</td>
                                <td>Tryout Soshum</td>
                                <td>22 June 2020</td>
                                <td>581.000</td>
                                <td>Complete</td>
                                <td>IN332942</td>
                                <td><img src="img/menu-3.png" class="img-fluid" alt=""></td>
                            </tr>
                            <tr>
                                <td>003452</td>
                                <td>Tryout Soshum</td>
                                <td>22 June 2020</td>
                                <td>581.000</td>
                                <td>Complete</td>
                                <td>IN332942</td>
                                <td><img src="img/menu-3.png" class="img-fluid" alt=""></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div> -->
    </div>
    <div class="col-lg-1"></div>
    <div class="col-lg-2 col-xl-3">
        <div class="card shadow" style="background-color: #2D62ED; border-radius: 2em;">
            <div class="card-body text-light border-0">
                <img src="<?= base_url('asset/user/') ?>img/file.png" alt="">
                <div class="h1 mb-0">Disc 15%</div>
                <div class="mb-4">6x tryout</div>
                <div class="text-right">
                    <a href="#" class="text-light">
                        <b>Beli sekarang</b>
                        <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-up-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="background-color: rgba(216, 216, 216, 0.514); padding: 10px; border-radius: 50%">
                            <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Akhir Activity -->


</div>

<!-- /.container-fluid -->

<script>
    $(document).ready(function() {

        $("#activity").click(function() {
            $(".history").addClass("hide-content");
            $(".activity").removeClass("hide-content");

            $("#activity").addClass("menu-statistik-active");
            $("#history").removeClass("menu-statistik-active");
        });

        $("#history").click(function() {
            $(".activity").addClass("hide-content");
            $(".history").removeClass("hide-content");

            $("#history").addClass("menu-statistik-active");
            $("#activity").removeClass("menu-statistik-active");
        });
    });



    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Performance',
                data: [5, 2, 7, 3, 9, 8, 5, 3, 4, 5, 6, 9],
                backgroundColor: [
                    'rgba(38, 85, 214,0.1)'
                ],
                borderColor: [
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)',
                    'rgba(240, 133, 33,1)'

                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

    var persen1 = 53.33;
    var persen2 = 89.77;

    var chartProgress = document.getElementById("chartProgress");
    if (chartProgress) {
        var myChartCircle = new Chart(chartProgress, {
            type: 'doughnut',
            data: {
                labels: ["", ""],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["rgba(240, 133, 33,1)", "rgba(255, 255, 255,1)"],
                    data: [persen1, 100 - persen1]
                }]
            },
            plugins: [{
                beforeDraw: function(chart) {
                    var width = chart.chart.width,
                        height = chart.chart.height,
                        ctx = chart.chart.ctx;

                    ctx.restore();
                    var fontSize = (height / 100).toFixed(2);
                    ctx.font = fontSize + "em sans-serif";
                    ctx.fillStyle = "rgba(255, 255, 255,1)";
                    ctx.textBaseline = "middle";

                    var text = persen1 + "%",
                        textX = Math.round((width - ctx.measureText(text).width) / 2),
                        textY = height / 2;

                    ctx.fillText(text, textX, textY);
                    ctx.save();
                }
            }],
            options: {
                legend: {
                    display: false,
                },
                responsive: true,
                maintainAspectRatio: false,
                cutoutPercentage: 80
            }
        });
    }

    var chartProgress = document.getElementById("chartProgress2");
    if (chartProgress) {
        var myChartCircle = new Chart(chartProgress, {
            type: 'doughnut',
            data: {
                labels: ["", ""],
                datasets: [{
                    label: "Population (millions)",
                    backgroundColor: ["rgba(240, 133, 33,1)", "rgba(255, 255, 255,1)"],
                    data: [persen2, 100 - persen2]
                }]
            },
            plugins: [{
                beforeDraw: function(chart) {
                    var width = chart.chart.width,
                        height = chart.chart.height,
                        ctx = chart.chart.ctx;

                    ctx.restore();
                    var fontSize = (height / 100).toFixed(2);
                    ctx.font = fontSize + "em sans-serif";
                    ctx.fillStyle = "rgba(255, 255, 255,1)";
                    ctx.textBaseline = "middle";

                    var text = persen2 + "%",
                        textX = Math.round((width - ctx.measureText(text).width) / 2),
                        textY = height / 2;

                    ctx.fillText(text, textX, textY);
                    ctx.save();
                }
            }],
            options: {
                legend: {
                    display: false,
                },
                responsive: true,
                maintainAspectRatio: false,
                cutoutPercentage: 80
            }
        });
    }
</script>

<?php
function get_month($month)
{
    switch ($month) {
        case 1:
            return 'Januari';
        case 2:
            return 'Februari';
        case 3:
            return 'Maret';
        case 4:
            return 'April';
        case 5:
            return 'Mei';
        case 6:
            return 'Juni';
        case 7:
            return 'Juli';
        case 8:
            return 'Agustus';
        case 9:
            return 'September';
        case 10:
            return 'Oktober';
        case 11:
            return 'November';
        case 12:
            return 'Desember';
        default:
            return '';
    }
}
?>