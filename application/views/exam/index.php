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
            <div class="card shadow">
                <div class="card-body">
                    <div class="container-fluid px-0">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="h5 text-biru mb-2 text-center">PTN Pilihan 1</div>
                                <div class="form-group">
                                    <select class="form-control" name="" id="">
                                        <option selected>PTN</option>
                                        <option>A</option>
                                        <option>B</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="" id="">
                                        <option selected>Jurusan</option>
                                        <option>A</option>
                                        <option>B</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="h5 text-biru mb-2 text-center">PTN Pilihan 2</div>
                                <div class="form-group">
                                    <select class="form-control" name="" id="">
                                        <option selected>PTN</option>
                                        <option>A</option>
                                        <option>B</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" name="" id="">
                                        <option selected>Jurusan</option>
                                        <option>A</option>
                                        <option>B</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="h5 text-biru mb-2 mt-2 text-center">Kategori Ujian</div>

                                <div class="form-group">
                                    <select class="form-control" name="" id="">
                                        <option selected>Kategori</option>
                                        <option>Soshum</option>
                                        <option>Saintek</option>
                                        <option>Campuran</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <button type="button" class="btn btn-simpan-ptn shadow">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="<?= base_url('exm/play') ?>" type="button" class="btn btn-mulai-ptn btn-block mt-4">Mulai ujian</a>
        </div>
    </div>
</div>

</div>

<script>

</script>