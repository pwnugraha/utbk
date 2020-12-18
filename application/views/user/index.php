<!-- Begin Page Content -->
<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message_sa'); ?>"></div>
<div class="container-fluid mb-5 pb-5">
    <div class="row">
        <div class="col-lg-9">
            <div class="card shadow welcome border-0 mb-3" style="border-radius: 2em;">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="h3 mb-5 text-hitam">Welcome back <span class="badge badge-light text-hitam">
                                        <?php if ($this->session->userdata('name')) {
                                            echo ucwords(strtolower($this->session->userdata('name')));
                                        } else {
                                            echo $this->session->userdata('username');
                                        }; ?>
                                    </span>
                                </div>
                                <div class="text-hitam">Apa yang harus kamu lakukan sekarang :</div>
                                <ul>
                                    <li><span class="text-hitam"> Wow UTBK sudah mulai dekat ayo
                                            persiapkan
                                            dirimu</span></li>
                                    <li><span class="text-hitam"> Setiap tanggal 27, Report akan keluar,
                                            yuk lihat
                                            hasilmu</span></li>
                                    <li><span class="text-hitam"> Emm sepertinya lagi ada discount 50%
                                            pembelian 10x
                                            tryout</span></li>
                                </ul>
                            </div>
                            <div class="col-md-4">
                                <img src="<?= base_url('asset/user/') ?>img/welcome.png" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 d-none">
            <div class="card shadow" style="background-color: #7D00B5; border-radius: 2em;">
                <div class="card-body text-light border-0">
                    <img src="<?= base_url('asset/user/') ?>img/paper-plane.png" alt="">
                    <div class="h2 mb-0">Free tiket</div>
                    <div class="mb-4">Coba pengalaman tryout</div>
                    <div class="text-right">
                        <a href="#" class="text-light">
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
                        <div class="mb-0">Tiket Tryout</div>
                        <div>
                            <?php
                            $user_ticket = $ticket['tka_saintek'] + $ticket['tka_soshum'] + $ticket['tka_campuran'] + $ticket['tps'];
                            echo $user_ticket
                            ?>
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
                        <div class="mb-0">Tiket Pendalaman Soal</div>
                        <div>0</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-12 my-1">
            <div class="card shadow border-0" style="border-radius: 1em;">
                <div class="card-body">
                    <img src="<?= base_url('asset/user/') ?>img/tiket-hijau.png" class="img-fluid float-left mr-2">
                    <div class="text-hitam">
                        <div class="mb-0">Tiket Konsultasi</div>
                        <div>0</div>
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
                        Untuk UTBK kamu wajib
                        menyelesaikan soal TPS dan TKA
                        bila tidak nanti nilaimu tidak keluar
                        loh di statistik
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
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
    const flashdata = $('.flash-data').data('flashdata');
    const notif = $('.notif-tpas-tpa-clear').data('notif');


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
</script>

<!-- /.container-fluid -->