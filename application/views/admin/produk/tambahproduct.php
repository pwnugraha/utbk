<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="h3 text-biru"><?=($this->uri->segment(3) == 'create')?'Tambah':'Update'?> Produk Baru</div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <?php
                    if ($this->uri->segment(3) == 'create') {
                        echo form_open('manage/product/create');
                    } else {
                        echo form_open('manage/product/update/' . $post['id']);
                    }
                    ?>
                    <div class="form-group">
                        <?= form_input($name) ?>
                    </div>
                    <div class="form-group">
                        <?= form_input($description) ?>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <?= form_input($price) ?>
                    </div>
                    <div class="input-group mb-3">
                        <?= form_input($discount) ?>
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">%</span>
                        </div>
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
                    <div class="form-group">
                        <label for=""></label>
                        <?= form_input($tryout) ?>
                    </div>
                    <div class="form-group">
                        <?= form_input($consultation) ?>
                    </div>
                    <div class="form-group">
                        <?= form_input($pendalaman) ?>
                    </div>
                    <div class="form-group">
                        <select class="custom-select" name="status" id="status">
                            <option>Status</option>
                            <option <?= (!empty($post)) ? (($post['status'] == 1) ? 'selected' : '') : '' ?> value="1">Aktif</option>
                            <option <?= (!empty($post)) ? (($post['status'] == 0) ? 'selected' : '') : '' ?> value="0">Non-aktif</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambahkan produk</button>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>