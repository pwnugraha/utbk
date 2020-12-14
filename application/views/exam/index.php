<div class="container mb-5 pb-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow welcome border-0 mb-3" style="border-radius: 2em;">
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="text-hitam mb-3">Tata tertib pengerjaan:</div>
                                <ul class="pl-0 pl-md-4">
                                    <li>
                                        <span class="text-hitam">
                                            Soal dikerjakan dengan batas waktu yang di tentukan
                                        </span>
                                    </li>
                                    <li>
                                        <span class="text-hitam">
                                            Aplikasi akan selesai sendiri bila waktu sudah habis
                                        </span>
                                    </li>
                                    <li>
                                        <span class="text-hitam">
                                            SAINTEK terdiri 80 soal dan SOSHUM terdiri 100 soal
                                        </span>
                                    </li>
                                    <li>
                                        <span class="text-hitam">
                                            Bila ada masalah pada jaringan, jawaban anda akan tetep tersimpan
                                        </span>
                                    </li>
                                    <li>
                                        <span class="text-hitam">
                                            Soal akan aktif bila waktu telah berjalan
                                        </span>
                                    </li>
                                    <li>
                                        <span class="text-hitam">
                                            Berdoa sebelum mengerjakan
                                        </span>
                                    </li>
                                </ul>
                                <a href="<?= base_url('usr') ?>" class="text-primary"><i class="fa fa-arrow-left" aria-hidden="true"></i> Dashboard</a>
                            </div>
                            <div class="col-md-4">
                                <img src="<?= base_url('asset/user/') ?>img/welcome.png" class="img-fluid d-none d-md-block">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-lg-12">
            <?= form_open('exm/index/' . $exam, 'id="form-pretest"') ?>
            <div class="card shadow">
                <div class="card-body">
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="h5 text-biru mb-2 text-center">PTN Pilihan 1</div>
                                <div class="form-group">
                                    <select class="form-control" name="ptn1" id="ptn1">
                                        <option selected>PTN</option>
                                        <?php
                                        if (!empty($ptn)) :
                                            foreach ($ptn as $i) : ?>
                                                <option <?= ($i['nama'] == $ptn_jurusan1['nama']) ? 'selected' : '' ?> value="<?= $i['nama'] ?>"><?= $i['nama'] ?></option>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="jurusan1" id="jurusan1">
                                        <option selected>Jurusan</option>
                                        <?php
                                        if (!empty($all_jurusan_ptn1)) :
                                            foreach ($all_jurusan_ptn1 as $i) : ?>
                                                <option <?= ($i['id'] == $get_exam['ptn1']) ? 'selected' : '' ?> value="<?= $i['id'] ?>"><?= $i['jurusan'] ?></option>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="h5 text-biru mb-2 text-center">PTN Pilihan 2</div>
                                <div class="form-group">
                                    <select class="form-control" name="ptn2" id="ptn2">
                                        <option selected>PTN</option>
                                        <?php
                                        if (!empty($ptn)) :
                                            foreach ($ptn as $i) : ?>
                                                <option <?= ($i['nama'] == $ptn_jurusan2['nama']) ? 'selected' : '' ?> value="<?= $i['nama'] ?>"><?= $i['nama'] ?></option>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="jurusan2" id="jurusan2">
                                        <option selected>Jurusan</option>
                                        <?php
                                        if (!empty($all_jurusan_ptn2)) :
                                            foreach ($all_jurusan_ptn2 as $i) : ?>
                                                <option <?= ($i['id'] == $get_exam['ptn2']) ? 'selected' : '' ?> value="<?= $i['id'] ?>"><?= $i['jurusan'] ?></option>
                                        <?php
                                            endforeach;
                                        endif;
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-danger" role="alert" id="notif-danger"></div>
                </div>
            </div>
            <button type="submit" class="btn btn-mulai-ptn btn-block mt-4" id="btn-mulai-ptn">Mulai ujian</button>
            <?= form_close() ?>
        </div>
    </div>
</div>

</div>
<div class="flash-data" data-flashdata="<?= $error_message; ?>"></div>
<script src="<?= base_url('asset/exam/js/sweetalert/sweetalert2.all.min.js') ?>"></script>

<script>
    $('#notif-danger').hide();
    $('#btn-mulai-ptn').on('click', function(e) {
        e.preventDefault();
        const ptn1 = $('#ptn1').find(":selected").index();
        const ptn2 = $('#ptn2').find(":selected").index();
        const jurusan1 = $('#jurusan1').find(":selected").index();
        const jurusan2 = $('#jurusan2').find(":selected").index();
        if (ptn1 == 0 || ptn2 == 0) {
            if (ptn1 == 0 && ptn2 > 0) {
                $('#notif-danger').hide();
                $('#notif-danger').show();
                $('#notif-danger').text('PTN 1 belum diisi');
            } else if (ptn1 > 0 && ptn2 == 0) {
                $('#notif-danger').hide();
                $('#notif-danger').show();
                $('#notif-danger').text('PTN 2 belum diisi');
            } else {
                $('#notif-danger').hide();
                $('#notif-danger').show();
                $('#notif-danger').text('PTN 1 dan 2 belum diisi');
            }
        } else if (jurusan1 == 0 || jurusan2 == 0) {
            if (jurusan1 == 0 && jurusan2 > 0) {
                $('#notif-danger').hide();
                $('#notif-danger').show();
                $('#notif-danger').text('Jurusan PTN 1 belum diisi');
            } else if (jurusan1 > 0 && jurusan2 == 0) {
                $('#notif-danger').hide();
                $('#notif-danger').show();
                $('#notif-danger').text('Jurusan PTN 2 belum diisi');
            } else {
                $('#notif-danger').hide();
                $('#notif-danger').show();
                $('#notif-danger').text('Jurusan PTN 1 dan PTN 2 belum diisi');
            }
        } else {
            $('#notif-danger').hide();

            const href = $(this).attr('href');
            Swal.fire({
                title: 'Yakin mulai tryout ?',
                // text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yakin'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#form-pretest').submit();
                }
            })
        }
    });

    const flashdata = $('.flash-data').data('flashdata');
    if (flashdata) {
        // alert(flashdata);

        Swal.fire({
            title: 'Informasi',
            html: flashdata,
            icon: 'info'
        });

    };
</script>