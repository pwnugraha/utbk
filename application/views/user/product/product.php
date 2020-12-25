<!-- Begin Page Content -->
<?php if ($this->ion_auth->is_admin()) { ?>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message_sa'); ?>"></div>
    <div class="container-fluid mb-5 pb-5">
        <div class="row">
            <?php if (!empty($product)) :
                foreach ($product as $i) : ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card-promo shadow">
                            <div class="head text-center bg-biru">
                                <h1 class="mb-0 pt-4 pb-3 text-light"><?= $i['name'] ?></h1>
                            </div>
                            <div class="body pt-4 pb-4 px-4">
                                <div class="row">
                                    <div class="col-12 text-biru text-justify">
                                        <?= $i['description'] ?>
                                    </div>
                                    <div class="col-12 text-center py-3">
                                        <a href="<?= site_url('usr/order/' . $i['id']) ?>" class="btn-promo px-5" data-productid="<?= $i['id'] ?>">Beli</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                endforeach;
            endif; ?>
        </div>
    </div>
    <!-- /.container-fluid -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        const flashdata = $('.flash-data').data('flashdata');
        if (flashdata) {
            Swal.fire({
                title: 'Informasi',
                html: flashdata,
                icon: 'info',
                showConfirmButton: false,
                timer: 3000
            }).then((result) => {
                window.location.href = 'https://wa.me/6282325036930/?text=<?= $this->session->flashdata('message_wa'); ?>';
            });
        }
    </script>
<?php } ?>