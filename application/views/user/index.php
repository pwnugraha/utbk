<script>
    function ShowToggle(bulan, jml) {
        $("#down-" + bulan).toggleClass('d-none');
        $("#right-" + bulan).toggleClass('d-none');
        $('.list-sesi-' + bulan).removeClass("d-none");
        $('.list-sesi-' + bulan).toggle("slow", "linear");
        console.log('.list-sesi-' + bulan);
    }
</script>

<!-- Begin Page Content -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message_sa'); ?>"></div>

<?php if ($user_dashboard[3]['is_active'] == 1) : ?>
    <label id="notif-popup" name="<?= $user_dashboard[3]['isi'] ?>"></label>
<?php endif; ?>

<div class="container-fluid mb-5 pb-5">
    <div class="row">
        <div class="col-lg-9">
            <div class="card shadow welcome border-0 mb-3" style="border-radius: 2em;">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="h3 mb-5 text-hitam"><?= $user_dashboard[0]['isi'] ?>
                                    <span class="badge badge-light text-hitam">
                                        <?php if ($this->session->userdata('name')) {
                                            echo ucwords(strtolower($this->session->userdata('name')));
                                        } else {
                                            echo $this->session->userdata('username');
                                        }; ?>
                                    </span>
                                </div>
                                <div class="text-hitam"><?= $user_dashboard[1]['isi'] ?></div>
                                <ul>
                                    <?php foreach ($user_list_1 as $ul1) : ?>
                                        <li>
                                            <span class="text-hitam"> <?= $ul1['isi'] ?> </span>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <img src="<?= base_url('asset/user/img/') . $img[9]['isi'] ?>" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card shadow" style="background-color: #7D00B5; border-radius: 2em;">
                <div class="card-body text-light border-0">
                    <img src="<?= base_url('asset/user/') ?>img/paper-plane.png" alt="">
                    <div class="h2 mb-0">Free tiket</div>
                    <div class="mb-4">Coba pengalaman tryout</div>
                    <div class="text-right">
                        <a href="<?= site_url('exm/simulation') ?>" class="text-light" id="btn-simulation">
                            <b>Klik disini</b>
                            <svg width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-up-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="background-color: rgba(216, 216, 216, 0.514); padding: 10px; border-radius: 50%">
                                <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row my-3">
        <div class="col-lg-3 col-12 my-1">
            <div class="card shadow border-0" style="border-radius: 1em;">
                <div class="card-body">
                    <img src="<?= base_url('asset/user/') ?>img/tiket-kuning.png" class="img-fluid float-left mr-2">
                    <div class="text-hitam">
                        <div class="mb-0">Tryout TKA SAINTEK</div>
                        <div>
                            <?php
                            echo !empty($ticket) ? $ticket['tka_saintek'] : 0;
                            ?> tiket
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-12 my-1">
            <div class="card shadow border-0" style="border-radius: 1em;">
                <div class="card-body">
                    <img src="<?= base_url('asset/user/') ?>img/tiketmerah.png" class="img-fluid float-left mr-2">
                    <div class="text-hitam">
                        <div class="mb-0">Tryout TKA SOSHUM</div>
                        <div>
                            <?php
                            echo !empty($ticket) ? $ticket['tka_soshum'] : 0;
                            ?> tiket
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-12 my-1">
            <div class="card shadow border-0" style="border-radius: 1em;">
                <div class="card-body">
                    <img src="<?= base_url('asset/user/') ?>img/tiket-hijau.png" class="img-fluid float-left mr-2">
                    <div class="text-hitam">
                        <div class="mb-0">Tryout TKA CAMPURAN</div>
                        <div>
                            <?php
                            echo !empty($ticket) ? $ticket['tka_campuran'] : 0;
                            ?> tiket
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-12 my-1">
            <div class="card shadow border-0" style="border-radius: 1em;">
                <div class="card-body">
                    <img src="<?= base_url('asset/user/') ?>img/tiket-kuning.png" class="img-fluid float-left mr-2">
                    <div class="text-hitam">
                        <div class="mb-0">Tryout TPS</div>
                        <div>
                            <?php
                            echo !empty($ticket) ? $ticket['tps'] : 0;
                            ?> tiket
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-9">
            <div class="card shadow border-0" style="border-radius: 2em;">
                <div class="card-body px-0 jadwal">
                    <div class="h3 mb-4 text-hitam ml-4">Jadwal Tryout</div>
                    <?php
                    $user_ticket = $ticket['tka_saintek'] + $ticket['tka_soshum'] + $ticket['tka_campuran'] + $ticket['tps'];
                    if ($user_ticket < 1) {
                    ?>
                        <p class="text-center">Kamu tidak memiliki jadwal tryout</p>
                        <?php
                    } else {
                        if (!empty($tryout)) {
                        ?>
                            <?php $temp_bln = array_keys($tryout_schedule); ?>
                            <?php $nomor = 1; ?>
                            <?php $jml_bln = count($temp_bln); ?>
                            <?php foreach ($temp_bln as $tb) : ?>
                                <div class="mx-3 text-center head-sesi rounded my-1 pointer" onclick="ShowToggle(<?= $nomor ?>,<?= $jml_bln ?>)">
                                    <?= get_month($tb) ?>
                                    <svg id="right-<?= $nomor ?>" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-caret-right-fill icon-sesi-right" viewBox="0 0 16 16">
                                        <path d="M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                                    </svg>
                                    <svg id="down-<?= $nomor ?>" xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="currentColor" class="bi bi-caret-down-fill d-none" viewBox="0 0 16 16">
                                        <path d="M7.247 11.14L2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z" />
                                    </svg>
                                </div>
                                <div class="table-responsive px-3 list-sesi-<?= $nomor ?>">
                                    <table class="table table-sm mb-0">
                                        <thead>
                                            <tr class="border-0 text-dark">
                                                <th class="py-0">Nama Sesi</th>
                                                <th class="py-0">Bulan Sesi</th>
                                                <th class="py-0">Tanggal</th>
                                                <th class="py-0">Jam</th>
                                                <th class="py-0">Room Status</th>
                                                <th class="py-0"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($tryout as $i) : ?>
                                                <?php if ($i['active_month'] == $tb) : ?>
                                                    <?php if ($i['type'] == 1) : ?>
                                                        <tr>
                                                            <td><?= $i['name'] ?></td>
                                                            <td><?= get_month($i['active_month']) ?></td>
                                                            <td><?= date('d', strtotime($i['start_date'])) . ' - ' . date('d', strtotime($i['end_date'])) . ' ' . get_month(date('n', strtotime($i['end_date']))) . ' ' . date('Y', strtotime($i['end_date'])) ?></td>
                                                            <td><?= date('H:i', strtotime($i['start_time'])) . ' - ' . date('H:i', strtotime($i['end_time'])) ?></td>
                                                            <td><?= ($active_room[$i['active_month']]['tka_saintek'] < $i['quota']) ? $i['quota'] - $active_room[$i['active_month']]['tka_saintek'] . ' kursi kosong' : 'Room Full' ?></td>
                                                            <td class="text-right">
                                                                <a href="<?= base_url('exm/index/tka_saintek/' . $i['id']) ?>" class="btn py-0 px-3 btn-join-sesi">Join</a>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <?php if ($i['type'] == 2) : ?>
                                                        <tr>
                                                            <td><?= $i['name'] ?></td>
                                                            <td><?= get_month($i['active_month']) ?></td>
                                                            <td><?= date('d', strtotime($i['start_date'])) . ' - ' . date('d', strtotime($i['end_date'])) . ' ' . get_month(date('n', strtotime($i['end_date']))) . ' ' . date('Y', strtotime($i['end_date'])) ?></td>
                                                            <td><?= date('H:i', strtotime($i['start_time'])) . ' - ' . date('H:i', strtotime($i['end_time'])) ?></td>
                                                            <td><?= ($active_room[$i['active_month']]['tka_soshum'] < $i['quota']) ? $i['quota'] - $active_room[$i['active_month']]['tka_soshum'] . ' kursi kosong' : 'Room Full' ?></td>
                                                            <td class="text-right">
                                                                <a href="<?= base_url('exm/index/tka_soshum/' . $i['id']) ?>" class="btn py-0 px-3 btn-join-sesi">Join</a>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <?php if ($i['type'] == 3) : ?>
                                                        <tr>
                                                            <td><?= $i['name'] ?></td>
                                                            <td><?= get_month($i['active_month']) ?></td>
                                                            <td><?= date('d', strtotime($i['start_date'])) . ' - ' . date('d', strtotime($i['end_date'])) . ' ' . get_month(date('n', strtotime($i['end_date']))) . ' ' . date('Y', strtotime($i['end_date'])) ?></td>
                                                            <td><?= date('H:i', strtotime($i['start_time'])) . ' - ' . date('H:i', strtotime($i['end_time'])) ?></td>
                                                            <td><?= ($active_room[$i['active_month']]['tka_campuran'] < $i['quota']) ? $i['quota'] - $active_room[$i['active_month']]['tka_campuran'] . ' kursi kosong' : 'Room Full' ?></td>
                                                            <td class="text-right">
                                                                <a href="<?= base_url('exm/index/tka_campuran/' . $i['id']) ?>" class="btn py-0 px-3 btn-join-sesi">Join</a>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    <?php if ($i['type'] == 4) : ?>
                                                        <tr>
                                                            <td><?= $i['name'] ?></td>
                                                            <td><?= get_month($i['active_month']) ?></td>
                                                            <td><?= date('d', strtotime($i['start_date'])) . ' - ' . date('d', strtotime($i['end_date'])) . ' ' . get_month(date('n', strtotime($i['end_date']))) . ' ' . date('Y', strtotime($i['end_date'])) ?></td>
                                                            <td><?= date('H:i', strtotime($i['start_time'])) . ' - ' . date('H:i', strtotime($i['end_time'])) ?></td>
                                                            <td><?= ($active_room[$i['active_month']]['tps'] < $i['quota']) ? $i['quota'] - $active_room[$i['active_month']]['tps'] . ' kursi kosong' : 'Room Full' ?></td>
                                                            <td class="text-right">
                                                                <a href="<?= base_url('exm/index/tps/' . $i['id']) ?>" class="btn py-0 px-3 btn-join-sesi">Join</a>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php $nomor++; ?>
                            <?php endforeach; ?>
                    <?php
                        }
                    }
                    ?>
                    <div class="d-none">
                        <?php
                        $user_ticket = $ticket['tka_saintek'] + $ticket['tka_soshum'] + $ticket['tka_campuran'] + $ticket['tps'];
                        if ($user_ticket < 1) {
                        ?>
                            <p class="text-center">Kamu tidak memiliki jadwal tryout</p>
                            <?php
                        } else {
                            if (!empty($tryout)) {
                            ?>
                                <div class="table-responsive px-3">
                                    <table class="table table-sm">
                                        <thead>
                                            <tr class="border-0 text-hitam">
                                                <th class="py-2">Nama Sesi</th>
                                                <th class="py-2">Bulan Sesi</th>
                                                <th class="py-2">Tanggal</th>
                                                <th class="py-2">Jam</th>
                                                <th class="py-2">Room Status</th>
                                                <th class="py-2"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($tryout as $i) {
                                                if ($i['type'] == 1) {
                                            ?>
                                                    <tr>
                                                        <td><?= $i['name'] ?></td>
                                                        <td><?= get_month($i['active_month']) ?></td>
                                                        <td><?= date('d', strtotime($i['start_date'])) . ' - ' . date('d', strtotime($i['end_date'])) . ' ' . get_month(date('n', strtotime($i['end_date']))) . ' ' . date('Y', strtotime($i['end_date'])) ?></td>
                                                        <td><?= date('H:i', strtotime($i['start_time'])) . ' - ' . date('H:i', strtotime($i['end_time'])) ?></td>
                                                        <td><?= ($active_room[$i['active_month']]['tka_saintek'] < $i['quota']) ? $i['quota'] - $active_room[$i['active_month']]['tka_saintek'] . ' kursi kosong' : 'Room Full' ?></td>
                                                        <td>
                                                            <a href="<?= base_url('exm/index/tka_saintek/' . $i['id']) ?>" class="btn py-0 px-3 btn-join-sesi">Join</a>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                if ($i['type'] == 2) {
                                                ?>
                                                    <tr>
                                                        <td><?= $i['name'] ?></td>
                                                        <td><?= get_month($i['active_month']) ?></td>
                                                        <td><?= date('d', strtotime($i['start_date'])) . ' - ' . date('d', strtotime($i['end_date'])) . ' ' . get_month(date('n', strtotime($i['end_date']))) . ' ' . date('Y', strtotime($i['end_date'])) ?></td>
                                                        <td><?= date('H:i', strtotime($i['start_time'])) . ' - ' . date('H:i', strtotime($i['end_time'])) ?></td>
                                                        <td><?= ($active_room[$i['active_month']]['tka_soshum'] < $i['quota']) ? $i['quota'] - $active_room[$i['active_month']]['tka_soshum'] . ' kursi kosong' : 'Room Full' ?></td>
                                                        <td>
                                                            <a href="<?= base_url('exm/index/tka_soshum/' . $i['id']) ?>" class="btn py-0 px-3 btn-join-sesi">Join</a>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                if ($i['type'] == 3) {
                                                ?>
                                                    <tr>
                                                        <td><?= $i['name'] ?></td>
                                                        <td><?= get_month($i['active_month']) ?></td>
                                                        <td><?= date('d', strtotime($i['start_date'])) . ' - ' . date('d', strtotime($i['end_date'])) . ' ' . get_month(date('n', strtotime($i['end_date']))) . ' ' . date('Y', strtotime($i['end_date'])) ?></td>
                                                        <td><?= date('H:i', strtotime($i['start_time'])) . ' - ' . date('H:i', strtotime($i['end_time'])) ?></td>
                                                        <td><?= ($active_room[$i['active_month']]['tka_campuran'] < $i['quota']) ? $i['quota'] - $active_room[$i['active_month']]['tka_campuran'] . ' kursi kosong' : 'Room Full' ?></td>
                                                        <td>
                                                            <a href="<?= base_url('exm/index/tka_campuran/' . $i['id']) ?>" class="btn py-0 px-3 btn-join-sesi">Join</a>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                if ($i['type'] == 4) {
                                                ?>
                                                    <tr>
                                                        <td><?= $i['name'] ?></td>
                                                        <td><?= get_month($i['active_month']) ?></td>
                                                        <td><?= date('d', strtotime($i['start_date'])) . ' - ' . date('d', strtotime($i['end_date'])) . ' ' . get_month(date('n', strtotime($i['end_date']))) . ' ' . date('Y', strtotime($i['end_date'])) ?></td>
                                                        <td><?= date('H:i', strtotime($i['start_time'])) . ' - ' . date('H:i', strtotime($i['end_time'])) ?></td>
                                                        <td><?= ($active_room[$i['active_month']]['tps'] < $i['quota']) ? $i['quota'] - $active_room[$i['active_month']]['tps'] . ' kursi kosong' : 'Room Full' ?></td>
                                                        <td>
                                                            <a href="<?= base_url('exm/index/tps/' . $i['id']) ?>" class="btn py-0 px-3 btn-join-sesi">Join</a>
                                                        </td>
                                                    </tr>
                                            <?php }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card shadow border-0 my-3" style="border-radius: 1em;">
                <div class="card-body text-hitam">
                    <div class="h5">Yang sudah kamu kerjakan</div>
                    <?php if ($exam) : ?>
                        <span class="mr-3">
                            <i class="fa <?= ($exam['tps'] == 1) ? 'fa-check text-light rounded-circle p-1 mr-1' : 'fa-circle-thin' ?>" <?= ($exam['tps'] == 1) ? 'style="background-color: #00CCF2;"' : '' ?> aria-hidden="true"></i>
                            <label>TPS</label>
                        </span>
                        <span>
                            <i class="fa <?= ($exam['tka'] == 1) ? 'fa-check text-light rounded-circle p-1 mr-1' : 'fa-circle-thin' ?>" <?= ($exam['tka'] == 1) ? 'style="background-color: #00CCF2;"' : '' ?> aria-hidden="true"></i>
                            <label>TKA</label>
                        </span>
                        <?php
                        if ($exam['tps'] == 1 && $exam['tka'] == 1) : ?>
                            <div class="notif-tpas-tpa-clear" data-notif="clear"></div>
                        <?php
                        endif;
                        ?>
                    <?php else : ?>
                        <span class="mr-3">
                            <i class="fa fa-circle-thin" aria-hidden="true"></i>
                            <label>TPS</label>
                        </span>
                        <span>
                            <i class="fa fa-circle-thin" aria-hidden="true"></i>
                            <label>TKA</label>
                        </span>
                    <?php endif; ?>

                </div>
            </div>
            <div class="card shadow border-0" style="border-radius: 1em; background-color: #FF007C;">
                <div class="card-body text-light">
                    <div class="h4">Note:</div>
                    <div>
                        <?= $user_dashboard[2]['isi'] ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<label id="jml_bulan" name="<?= isset($jml_bln) ? $jml_bln : 0 ?>"></label>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    const jml_bulan = $('#jml_bulan').attr('name');

    console.log(jml_bulan);

    for (i = 1; i <= jml_bulan; i++) {
        $('.list-sesi-' + i).hide();
        console.log('.list-sesi-' + i);

    }

    const flashdata = $('.flash-data').data('flashdata');
    const notif = $('.notif-tpas-tpa-clear').data('notif');

    var visited = localStorage.getItem('visited');
    if (!visited) {
        const notif_popup = $('#notif-popup').attr('name');
        if (notif_popup) {
            Swal.fire({
                title: 'Informasi',
                html: notif_popup,
                icon: 'info'
            });
        }
        sessionStorage.setItem("session_notif_popup", 0);
        localStorage.setItem('visited', true);
    }

    if (flashdata) {
        Swal.fire({
            title: 'Informasi',
            html: flashdata,
            icon: 'info'
        });
    } else if (notif) {
        Swal.fire({
            title: 'Informasi',
            html: 'Nilai tryout kamu sedang kami proses <br> silahkan cek lagi ditanggal <b>27</b> ya',
            icon: 'info'
        });
    };

    $('#btn-simulation').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            text: "Mulai simulasi tryout?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Mulai',
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    });
</script>

<!-- /.container-fluid -->