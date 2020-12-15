<div class="container-fluid mb-5 pb-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="h4 text-biru"><?=($this->uri->segment(3) == 'create')?'Tambah':'Update'?> Paket Ujian</div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body">
                    <?php
                    if ($this->uri->segment(3) == 'create') {
                        echo form_open('manage/paket_ujian/create');
                    } else {
                        echo form_open('manage/paket_ujian/update/' . $post['id']);
                    }
                    ?>
                    <div class="form-group">
                        <?= form_input($name) ?>
                    </div>
                    <div class="form-group">
                        <?= form_input($description) ?>
                    </div>
                    <div class="form-group">
                        <?= form_input($quota) ?>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <small>Tanggal mulai</small>
                            <?= form_input($start_date) ?>
                        </div>
                        <div class="col">
                            <small>Tanggal berakhir</small>
                            <?= form_input($end_date) ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <small>Dari Jam</small>
                            <?= form_input($start_time) ?>
                        </div>
                        <div class="col">
                            <small>Sampai Jam</small>
                            <?= form_input($end_time) ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for=""></label>
                        <select class="custom-select" name="paket_soal" id="paket_soal">
                            <option>Pilih Paket Soal</option>
                            <?php if (!empty($paket_soal)) :
                                foreach ($paket_soal as $i) : ?>
                                    <option <?= ($i['id'] == ((!empty($post)) ? $post['paket_soal_id'] : 0)) ? 'selected' : '' ?> value="<?= $i['id'] ?>"><?= $i['name'] ?></option>
                            <?php endforeach;
                            endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="type" id="type">
                            <option>Kategori</option>
                            <option <?= (!empty($post)) ? (($post['type'] == 1) ? 'selected' : '') :'' ?> value="1">TKA - SAINTEK</option>
                            <option <?= (!empty($post)) ? (($post['type'] == 2) ? 'selected' : '') :'' ?> value="2">TKA - SOSHUM</option>
                            <option <?= (!empty($post)) ? (($post['type'] == 3) ? 'selected' : '') :'' ?> value="3">TKA - CAMPURAN</option>
                            <option <?= (!empty($post)) ? (($post['type'] == 4) ? 'selected' : '') :'' ?> value="4">TPS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="status" id="status">
                            <option>Status</option>
                            <option <?= (!empty($post)) ? (($post['status'] == 1) ? 'selected' : '') :'' ?> value="1">Aktif</option>
                            <option <?= (!empty($post)) ? (($post['status'] == 0) ? 'selected' : '') :'' ?> value="0">Non-aktif</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="active_month" id="active_month">
                            <option>Aktif di bulan</option>
                            <option <?= (!empty($post)) ? (($post['active_month'] == 1) ? 'selected' : '') :'' ?> value="1">Januari</option>
                            <option <?= (!empty($post)) ? (($post['active_month'] == 2) ? 'selected' : '') :'' ?> value="2">Februari</option>
                            <option <?= (!empty($post)) ? (($post['active_month'] == 3) ? 'selected' : '') :'' ?> value="3">Maret</option>
                            <option <?= (!empty($post)) ? (($post['active_month'] == 4) ? 'selected' : '') :'' ?> value="4">April</option>
                            <option <?= (!empty($post)) ? (($post['active_month'] == 5) ? 'selected' : '') :'' ?> value="5">Mei</option>
                            <option <?= (!empty($post)) ? (($post['active_month'] == 6) ? 'selected' : '') :'' ?> value="6">Juni</option>
                            <option <?= (!empty($post)) ? (($post['active_month'] == 7) ? 'selected' : '') :'' ?> value="7">Juli</option>
                            <option <?= (!empty($post)) ? (($post['active_month'] == 8) ? 'selected' : '') :'' ?> value="8">Agustus</option>
                            <option <?= (!empty($post)) ? (($post['active_month'] == 9) ? 'selected' : '') :'' ?> value="9">September</option>
                            <option <?= (!empty($post)) ? (($post['active_month'] == 10) ? 'selected' : '') :'' ?> value="10">Oktober</option>
                            <option <?= (!empty($post)) ? (($post['active_month'] == 11) ? 'selected' : '') :'' ?> value="11">November</option>
                            <option <?= (!empty($post)) ? (($post['active_month'] == 12) ? 'selected' : '') :'' ?> value="12">Desember</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">TAMBAH JADWAL TRYOUT</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>

    <!-- <div class="row mt-4">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless mb-0">
                            <tr class="border-bottom border-top border-orange" style="border-radius: 5em;">
                                <td>Sesi 1</td>
                                <td>TPS Des</td>
                                <td>jam 07.00 - 09.00</td>
                                <td>100</td>
                                <td>
                                    Aktif
                                </td>
                                <td width="1">
                                    <a href="">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pen-fill text-primary" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M13.498.795l.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001z" />
                                        </svg>
                                    </a>
                                </td>
                                <td width="1">
                                    <a href="">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash-fill text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

</div>