<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <p>
                <?= $message ?>
            </p>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-body">
                    <?= form_open('manage/reseller') ?>
                    <div class="h5 text-biru">Tambah Reseller</div>
                    <div class="form-group">
                        <?= form_input($identity) ?>
                    </div>
                    <div class="form-group">
                        <?= form_input($first_name) ?>
                    </div>
                    <div class="form-group">
                        <?= form_input($email) ?>
                    </div>
                    <div class="form-group">
                        <?= form_input($phone) ?>
                    </div>
                    <div class="form-group">
                        <?= form_input($company) ?>
                    </div>
                    <div class="form-group">
                        <?= form_input($password) ?>
                    </div>
                    <div class="text-right">
                        <button type="submot" class="btn btn-primary">Simpan</button>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body px-0">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <span class="h4 text-biru">
                                    Reseller
                                </span>
                            </div>
                            <div class="table-responsive mt-3">
                                <table class="table table-hover table-sm" id="data_table">
                                    <thead>
                                        <tr class="text-biru">
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No. Telp</th>
                                            <th>Sekolah</th>
                                            <th>Status Akun</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (empty($resellers)) {
                                            echo '<tr><td colspan="5" class="text-center">No data <b>Belum ada data reseller.</b> </td></tr>';
                                        } else {
                                            foreach ($resellers as $i) { ?>
                                                <tr>
                                                    <td><?= $i['first_name'] ?></td>
                                                    <td><?= $i['email'] ?></td>
                                                    <td><?= $i['phone'] ?></td>
                                                    <td><?= $i['company'] ?></td>
                                                    <td><?= $i['active'] == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>
                                                </tr>
                                        <?php
                                            }
                                        }
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>