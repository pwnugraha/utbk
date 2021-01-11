<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <p>
                <?= $this->session->flashdata('msg') ?>
            </p>
        </div>
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body p-1">
                    <div class="table-responsive">
                        <table class="table mb-0 table-hover">
                            <tr class="rounded border" style="background-color: #253468;">
                                <td colspan="2" class="text-light text-center">DATA USER</td>
                            </tr>
                            <tr>
                                <td class="text-biru">Name</td>
                                <td><?= empty($user) ? '-' : $user['first_name'] ?></td>
                            </tr>
                            <tr>
                                <td class="text-biru">Email</td>
                                <td><?= empty($user) ? '-' : $user['email'] ?></td>
                            </tr>
                            <tr>
                                <td class="text-biru">Phone</td>
                                <td><?= empty($user) ? '-' : $user['phone'] ?></td>
                            </tr>
                            <tr>
                                <td class="text-biru">Asal Sekolah</td>
                                <td><?= empty($user) ? '-' : $user['company'] ?></td>
                            </tr>
                            <tr>
                                <td class="text-biru">UserName</td>
                                <td><?= empty($user) ? '-' : $user['username'] ?></td>
                            </tr>
                            <tr>
                                <td class="text-biru">Tiket</td>
                                <td>
                                    <?php if (empty($ticket)) {
                                        echo '-';
                                    } else {
                                        echo $ticket['tka_saintek'] . ' TKA Saintek<br>' . $ticket['tka_soshum'] . ' TKA Soshum<br>' . $ticket['tka_campuran'] . ' TKA Campuran<br>' . $ticket['tps'] . ' TPS';
                                    } ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card shadow">
                <div class="card-body px-0">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6 text-center text-md-right">
                                <button type="button" class="btn border tambah-produk-manual">Tambah Tiket</button>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <?= form_open('manage/userdata/add_ticket') ?>
                                        <div class="form-group">
                                            <select class="form-control" name="type" id="type">
                                                <option selected>Nama Produk</option>
                                                <option value="tka_saintek">SAINTEK</option>
                                                <option value="tka_soshum">SOSHUM</option>
                                                <option value="tka_campuran">CAMPURAN</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="quantity" id="quantity">
                                                <option selected>Jumlah tiket</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                            </select>
                                        </div>
                                        <?= form_hidden('user_id', $user['id']) ?>
                                        <button type="submit" class="btn btn-primary">Tambah Tiket</button>
                                        <?= form_close() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-12">
            <div class="h3 text-biru">Data Users</div>
        </div>
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body px-0">
                    <div class="container-fluid">
                        <div class="row mt-3">
                            <?php if ($reseller) : ?>
                                <div class="col-md-12 mt-3 mt-md-0 text-right">
                                    <a href="<?= site_url('manage/userdata/create_user') ?>" class="bg-biru-muda text-light px-4 h5" style="border-radius: 2em;">+ Add New</a>
                                </div>
                            <?php endif; ?>
                            <div class="col-12">
                                <div class="table-responsive mt-3">
                                    <table class="table" id="data_table">
                                        <thead>
                                            <tr class="text-dark">
                                                <th>Nama Lengkap</th>
                                                <th>Sekolah</th>
                                                <th>Username</th>
                                                <th>Status Akun</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (empty($item)) {
                                                echo '<tr><td colspan="5" class="text-center">No data <b>Belum ada data user.</b> </td></tr>';
                                            } else {
                                                foreach ($item as $i) { ?>
                                                    <tr>
                                                        <td><?= $i['first_name'] ?></td>
                                                        <td><?= $i['company'] ?></td>
                                                        <td><?= $i['username'] ?></td>
                                                        <td><?= $i['active'] == 1 ? 'Aktif' : 'Tidak Aktif' ?></td>

                                                        <td width="1">
                                                            <a href="<?= site_url('manage/userdata/index/' . $i['id']) ?>">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
                                                                    <path d="M4 0h5.5v1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h1V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2z" />
                                                                    <path d="M9.5 3V0L14 4.5h-3A1.5 1.5 0 0 1 9.5 3z" />
                                                                    <path fill-rule="evenodd" d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                                    <path d="M8 12c4 0 5 1.755 5 1.755V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1v-.245S4 12 8 12z" />
                                                                </svg>
                                                            </a>
                                                        </td>

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
    <?php if ($reseller) : ?>
        <div class="row mt-5">
            <div class="col-12">
                <div class="h3 text-biru">Status Tiket</div>
            </div>
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body px-0">
                        <div class="container-fluid">
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="table-responsive mt-3">
                                        <table class="table" id="data_table2">
                                            <thead>
                                                <tr class="text-dark">
                                                    <th>Nama Lengkap</th>
                                                    <th>Phone</th>
                                                    <th>Sekolah</th>
                                                    <th>Tiket</th>
                                                    <th>Jumlah</th>
                                                    <th>Diajukan pada</th>
                                                    <th>Status</th>
                                                    <th>AKsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (empty($users_ticket)) {
                                                    echo '<tr><td colspan="8" class="text-center">No data <b>Belum ada pengajuan tiket.</b> </td></tr>';
                                                } else {
                                                    foreach ($users_ticket as $i) { ?>
                                                        <tr>
                                                            <td><?= $i['first_name'] ?></td>
                                                            <td><?= $i['phone'] ?></td>
                                                            <td><?= $i['company'] ?></td>
                                                            <td><?= $i['category'] ?></td>
                                                            <td><?= $i['quantity'] ?></td>
                                                            <td><?= date('d-m-Y - H:i', $i['created']) ?></td>
                                                            <td><?= $i['status'] == 1 ? 'Disetujui' : 'Pending' ?></td>
                                                            <td>
                                                                <?php if ($i['status'] == 0) : ?>
                                                                    <a href="<?= base_url('manage/userdata/delete_ticket/' . $i['ticket_id']) ?>" class="btn-hapus">
                                                                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-trash-fill text-danger" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                            <path fill-rule="evenodd" d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5a.5.5 0 0 0-1 0v7a.5.5 0 0 0 1 0v-7z" />
                                                                        </svg>
                                                                    </a>
                                                                <?php endif; ?>
                                                            </td>
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
    <?php endif; ?>
</div>