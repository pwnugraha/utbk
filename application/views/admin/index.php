<!-- Begin Page Content -->

<div class="container-fluid mb-4" style="height: 2000px;">
    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow">
                <div class="card-body px-0">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <span class="h4 text-biru">
                                    Pengajuan Tiket
                                </span>
                            </div>
                            <div class="table-responsive mt-3">
                                <table class="table table-hover table-sm" id="data_table">
                                    <thead>
                                        <tr class="text-biru">
                                            <th>Nama</th>
                                            <th>No. Telp</th>
                                            <th>Sekolah</th>
                                            <th>Tiket</th>
                                            <th>Jumlah</th>
                                            <th>Reseller</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (empty($item)) {
                                            echo '<tr><td colspan="7" class="text-center">No data <b>Belum ada pengajuan tiket.</b> </td></tr>';
                                        } else {
                                            foreach ($item as $i) { ?>
                                                <tr>
                                                    <td><?= ucwords($i['first_name']) ?></td>
                                                    <td><?= $i['phone'] ?></td>
                                                    <td><?= $i['company'] ?></td>
                                                    <td><?= $i['category'] ?></td>
                                                    <td><?= $i['quantity'] ?></td>
                                                    <td><?= ucwords($i['reseller']) ?></td>
                                                    <td>
                                                        <a href="<?= base_url('admin/add_ticket/' . $i['id']) ?>" class="btn-proses">
                                                            Accept
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
        <div class="col-lg-1"></div>
        <div class="col-lg-3">
            <div class="h3 text-biru mt-3 mt-lg-0">Notifikasi</div>
            <div class="card shadow my-3" style="border-radius: 1em;">
                <div class="card-body">
                    <div class="d-inline-block">
                        <div class="h5 text-biru">Try Out</div>
                        <div class="text-secondary"><?= $tryout ?> user sedang tryout</div>
                    </div>
                    <div class="float-right">
                        <svg style="background-color: #0fd2f5; color:white; padding: 10px; border-radius: 50%" width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-up-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="card shadow my-3" style="border-radius: 1em;">
                <div class="card-body">
                    <div class="d-inline-block">
                        <div class="h5 text-biru">Pengajuan Tiket</div>
                        <div class="text-secondary"><?= empty($item) ? 0 : count($item) ?> tiket belum disetujui</div>
                    </div>
                    <div class="float-right">
                        <svg style="background-color: #0fd2f5; color:white; padding: 10px; border-radius: 50%" width="3em" height="3em" viewBox="0 0 16 16" class="bi bi-arrow-up-right" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M14 2.5a.5.5 0 0 0-.5-.5h-6a.5.5 0 0 0 0 1h4.793L2.146 13.146a.5.5 0 0 0 .708.708L13 3.707V8.5a.5.5 0 0 0 1 0v-6z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- /.container-fluid -->

<script>
    $('.btn-proses').on('click', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            text: "Setujui pengajuan tiket ini?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'PROSES',
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        })
    });
</script>