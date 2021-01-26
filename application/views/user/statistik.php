<!-- Begin Page Content -->

<div class="container-fluid mb-4">
    <div class="row mb-4 menu-statistik">
        <div class="col-lg-12 ">
            <button id="activity" class="text-hitam mr-3 btn menu-statistik-active">Activity Progress</button>
            <button id="history" class="text-hitam btn">History</button>
        </div>
    </div>

    <div class="row activity d-none">
        <div class="col text-center">
            <div class="text-biru h4 mb-5"> Nilai tryout kamu sedang kami proses <br> silahkan cek lagi ditanggal <b> 27 </b> ya </div>
            <img src="<?= base_url('asset/user/img/statistik2.svg') ?>" width="45%" class="img-fluid" alt="">
        </div>
    </div>

    <!-- Activity -->
    <div class="row mb-5 activity">
        <div class="col-lg-8">
            <div class="card shadow welcome border-0 mb-3" style="border-radius: 1em;">
                <div class="card-body">
                    <div class="h5 text-hitam">Tryout Performance</div>
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-4 text-center">
            <div class="card shadow bg-warning border-0" style="border-radius: 1em;">
                <div class="card-body">
                    <div class="text-biru h5 mb-5"> Nilai tryout kamu sedang kami proses silahkan cek lagi ditanggal <b> 27 </b> ya </div>
                    <img src="<?= base_url('asset/user/img/statistik2.svg') ?>" width="90%" class="img-fluid" alt="">
                </div>
            </div>
        </div>

        <div class="col-xl-1 d-none"></div>
        <div class="col-lg-3 d-none">
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
    <div class="row">
        <div class="col-lg-12">
            <?= form_open('usr/statistik', ['class' => 'form-inline']) ?>
            <label style="padding-right: 10px;"><strong>Nilai Tryout Bulan</strong></label>
            <div class="form-group">
                <select name="exam_score_item" class="form-control mb-2 mr-sm-2">
                    <option value="12" <?= $exam_month == 12 ? 'selected' : '' ?>>Desember</option>
                    <option value="1" <?= $exam_month == 1 ? 'selected' : '' ?>>Januari</option>
                    <option value="2" <?= $exam_month == 2 ? 'selected' : '' ?>>Februari</option>
                    <option value="3" <?= $exam_month == 3 ? 'selected' : '' ?>>Maret</option>
                    <option value="4" <?= $exam_month == 4 ? 'selected' : '' ?>>April</option>
                    <option value="5" <?= $exam_month == 5 ? 'selected' : '' ?>>Mei</option>
                    <option value="6" <?= $exam_month == 6 ? 'selected' : '' ?>>Juni</option>
                    <option value="7" <?= $exam_month == 7 ? 'selected' : '' ?>>Juli</option>
                    <option value="8" <?= $exam_month == 8 ? 'selected' : '' ?>>Agustus</option>
                    <option value="9" <?= $exam_month == 9 ? 'selected' : '' ?>>September</option>
                    <option value="10" <?= $exam_month == 10 ? 'selected' : '' ?>>Oktober</option>
                    <option value="11" <?= $exam_month == 11 ? 'selected' : '' ?>>November</option>
                </select>
            </div>
            <button type="submit" class="btn btn-mulai-ptn mb-2">Tampilkan</button>

            <?= form_close() ?>
        </div>

    </div>

    <div class="row mb-5 activity mt-2">
        <div class="col-lg-4">
            <div class="card shadow mb-4" style="border-radius: 1em;">
                <div class="card-body">
                    <div class="h5 text-hitam">
                        <table width="100%">
                            <tr>
                                <td>Nilai permapel TKA</td>
                                <td class="text-right">
                                    <a href="" class="text-dark">
                                        <img src="<?= base_url('asset/user/') ?>img/menu-3.png" class="img-fluid">
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <hr>
                    <?php
                    if (!empty($utbk_score)) :
                        foreach ($utbk_score as $v) :
                            if ($v['category'] == 'saintek' || $v['category'] == 'soshum') :
                    ?>
                                <div class="range-mk">
                                    <table width="100%">
                                        <tr>
                                            <td class="text-hitam"><?= ucwords($v['subject']) ?></td>
                                            <td class="text-right pr-3"><small><?= $v['score'] ?></small></td>
                                        </tr>
                                    </table>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: <?= $score_limit[$v['kategori_soal_id']]['max'] > 0 ? $v['score'] / $score_limit[$v['kategori_soal_id']]['max'] * 100 : 0 ?>%" aria-valuenow="<?= $v['score'] ?>" aria-valuemin="<?= $score_limit[$v['kategori_soal_id']]['min'] ?>" aria-valuemax="<?= $score_limit[$v['kategori_soal_id']]['max'] ?>"></div>
                                    </div>
                                </div>

                    <?php
                            endif;
                        endforeach;
                    endif; ?>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card shadow mb-4" style="border-radius: 1em;">
                <div class="card-body">
                    <div class="h5 text-hitam">
                        <table width="100%">
                            <tr>
                                <td>Nilai permapel TPS</td>
                                <td class="text-right">
                                    <a href="" class="text-dark">
                                        <img src="<?= base_url('asset/user/') ?>img/menu-3.png" class="img-fluid">
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <hr>

                    <?php
                    if (!empty($utbk_score)) :
                        foreach ($utbk_score as $v) :
                            if ($v['category'] == 'tps') :
                    ?>
                                <div class="range-mk">
                                    <table width="100%">
                                        <tr>
                                            <td class="text-hitam"><?= ucwords($v['subject']) ?></td>
                                            <td class="text-right pr-3"><small><?= $v['score'] ?></small></td>
                                        </tr>
                                    </table>
                                    <div class="progress">
                                        <div class="progress-bar" role="progressbar" style="width: <?= $score_limit[$v['kategori_soal_id']]['max'] > 0 ? $v['score'] / $score_limit[$v['kategori_soal_id']]['max'] * 100 : 0 ?>%" aria-valuenow="<?= $v['score'] ?>" aria-valuemin="<?= $score_limit[$v['kategori_soal_id']]['min'] ?>" aria-valuemax="<?= $score_limit[$v['kategori_soal_id']]['max'] ?>"></div>
                                    </div>
                                </div>

                    <?php
                            endif;
                        endforeach;
                    endif; ?>
                </div>
            </div>
        </div>

        <!-- <div class="col-xl-1"></div> -->
        <div class="col-md-12 col-lg-4">
            <div class="card shadow text-light mb-2" style="background-color: #182F64; border-radius: 1em;">
                <div class="card-body">
                    <div class="table-responsive">
                        <table width="100%">
                            <tr>
                                <!-- <td width="30%">
                                    <canvas id="chartProgress" height="50" width="100"></canvas>
                                </td> -->
                                <td class="pl-3">
                                    <div class="h3 mb-0">
                                        <table width="100%">
                                            <tr>
                                                <td><?= $ptn1['nama'] ?></td>
                                                <td class="text-right"><img src="img/menu-3-putih.png" alt=""></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="mb-4">Pilihan Pertama</div>
                                    <div class="h4"><?= $ptn1['jurusan'] ?></div>
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
                                <!-- <td width="30%">
                                    <canvas id="chartProgress2" height="50" width="100"></canvas>
                                </td> -->
                                <td class="pl-3">
                                    <div class="h3 mb-0">
                                        <table width="100%">
                                            <tr>
                                                <td><?= $ptn2['nama'] ?></td>
                                                <td class="text-right"><img src="img/menu-3-putih.png" alt=""></td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="mb-4">Pilihan Kedua</div>
                                    <div class="h4"><?= $ptn2['jurusan'] ?></div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>

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
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($exam_history)) :
                                    $no = 0;
                                    foreach ($exam_history as $i) :
                                ?>
                                        <tr>
                                            <td><?= $i['id'] ?></td>
                                            <td><?= $i['name'] ?></td>
                                            <td><?= date('d', strtotime($i['start_date'])) . ' - ' . date('d', strtotime($i['end_date'])) . ' ' . get_month(date('n', strtotime($i['end_date']))) . ' ' . date('Y', strtotime($i['end_date'])) ?></td>
                                            <td><?= date('H:i', strtotime($i['start_time'])) . ' - ' . date('H:i', strtotime($i['end_time'])) ?></td>
                                            <td><?= date('d', strtotime($i['date'])) . ' ' . get_month(date('n', strtotime($i['date']))) . ' ' . date('Y', strtotime($i['date'])) . ' - ' . date('H:i', strtotime($i['date'])) ?></td>
                                            <td><a href="<?= site_url('usr/pembahasan/' . $i['exam_id'] . '/' . $i['category']) ?>">Pembahasan</a></td>
                                        </tr>
                                <?php $no++;
                                    endforeach;
                                endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card shadow welcome border-0" style="border-radius: 1em;">
                <div class="card-body">
                    <div class="h5 text-hitam">Orders</div>
                    <div class="table-responsive">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr class="text-hitam">
                                    <th>ID Order</th>
                                    <th>Nama Produk</th>
                                    <th>Tanggal</th>
                                    <th>Harga</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($orders)) :
                                    foreach ($orders as $i) :
                                ?>
                                        <tr>
                                            <td><?= $i['id'] ?></td>
                                            <td><?= $i['quantity'] . ' Tiket ' . $i['product_name'] ?></td>
                                            <td><?= date('d', strtotime($i['created'])) . ' ' . get_month(date('n', strtotime($i['created']))) . ' ' . date('Y', strtotime($i['created'])) ?></td>
                                            <td><?= number_format($i['price'], 0, '', '.') ?></td>
                                            <td><?= $i['status'] == 0 ? 'Diproses' : 'Complete' ?></td>
                                            <td><a href="<?= site_url('usr/transaction/' . $i['id']) ?>">Detail</a></td>
                                        </tr>
                                <?php endforeach;
                                endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-1"></div>
        <div class="col-lg-2 col-xl-3 d-none">
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
            labels: ['Dec', 'Jan', 'Feb', 'Mar', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov'],
            datasets: [{
                label: 'Performance',
                data: [<?= $chart_data ?>],
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

    var persen1 = 0;
    var persen2 = 0;

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