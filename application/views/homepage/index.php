<!-- Cover -->
<div class="container text-baloo py-5 cover">
    <div class="row">
        <div class="col-md-6">
            <h1 class="text-biru"><?= $master[2]['isi'] ?></h1>
            <p class="text-biru"><?= $master[3]['isi'] ?></p>
            <a href="<?= base_url('auth/login'); ?>" class="btn-cover px-4"><?= $master[4]['isi'] ?></a>
        </div>
        <div class="col-6">
            <img src="<?= base_url('asset/homepage/img/') . $img[0]['isi'] ?>" alt="" class="img-fluid">
        </div>
    </div>
</div>
<!-- Akhir Cover -->

<!-- Tentang -->
<div class="bg-abu py-5 text-baloo">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="text-orange"><?= $master[5]['isi'] ?></h1>
            </div>
            <div class="col-12 text-center">
                <span class="text-biru"><?= $master[6]['isi'] ?></span>
            </div>
            <div class="col-12 text-center">
                <h2 class="text-biru mt-5"><?= $master[7]['isi'] ?></h1>
            </div>
            <div class="col-md-6 text-biru">
                <img src="<?= base_url('asset/homepage/img/') . $img[1]['isi'] ?>" class="img-fluid float-left mr-2" width="10%">
                <?= $master[8]['isi'] ?>
            </div>
            <div class="col-md-6 text-biru">
                <img src="<?= base_url('asset/homepage/img/') . $img[2]['isi'] ?>" class="img-fluid float-left mr-2" width="10%">
                <?= $master[9]['isi'] ?>
            </div>
            <div class="col-12 text-center">
                <h2 class="text-orange mt-5"><?= $master[10]['isi'] ?></h2>
            </div>
            <div class="col-12 text-center">
                <div class="container kelompok text-baloo">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 text-center text-biru py-3 navigation">
                            <label id="rr1" for="r1" class="bar kelompok-active"><?= $master[11]['isi'] ?></label>
                            <label id="rr2" for="r2" class="bar"><?= $master[15]['isi'] ?></label>
                            <label id="rr3" for="r3" class="bar"><?= $master[19]['isi'] ?></label>
                        </div>
                        <div class="col-md-3"></div>

                        <div class="col-md-2"></div>
                        <div class="col-md-8 pt-3">
                            <div class="slidershow middle">
                                <div class="slides">
                                    <input type="radio" name="r" id="r1" checked>
                                    <input type="radio" name="r" id="r2">
                                    <input type="radio" name="r" id="r3">
                                    <input type="radio" name="r" id="r4">
                                    <input type="radio" name="r" id="r5">
                                    <div class="slide s1">
                                        <div class="kotak-kelompok text-left p-5 shadow">
                                            <div class="row">
                                                <div class="col-md-12 text-biru h2">
                                                    <?= $master[12]['isi'] ?>
                                                </div>
                                                <div class="col-md-7">
                                                    <p>
                                                        <?= $master[13]['isi'] ?>
                                                    </p>
                                                    <a href="" class="btn-cek-soal"><?= $master[14]['isi'] ?></a>
                                                </div>
                                                <div class="col-md-5">
                                                    <img src="<?= base_url('asset/homepage/img/') . $img[3]['isi'] ?>" class="img-fluid" width="90%" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide ">
                                        <div class="kotak-kelompok text-left p-5 shadow">
                                            <div class="row">
                                                <div class="col-md-12 text-biru h2">
                                                    <?= $master[16]['isi'] ?>
                                                </div>
                                                <div class="col-md-7">
                                                    <p>
                                                        <?= $master[17]['isi'] ?>
                                                    </p>
                                                    <a href="" class="btn-cek-soal"><?= $master[18]['isi'] ?></a>
                                                </div>
                                                <div class="col-md-5 text-center">
                                                    <img src="<?= base_url('asset/homepage/img/') . $img[4]['isi'] ?>" class="img-fluid" width="60%" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="slide ">
                                        <div class="kotak-kelompok text-left p-5 shadow">
                                            <div class="row">
                                                <div class="col-md-12 text-biru h2">
                                                    <?= $master[20]['isi'] ?>
                                                </div>
                                                <div class="col-md-7">
                                                    <p>
                                                        <?= $master[21]['isi'] ?>
                                                    </p>
                                                    <a href="" class="btn-cek-soal"><?= $master[22]['isi'] ?></a>
                                                </div>
                                                <div class="col-md-5 text-center">
                                                    <img src="<?= base_url('asset/homepage/img/') . $img[5]['isi'] ?>" class="img-fluid" width="50%" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Tentang -->

<!-- Alasan -->
<div class="container py-5">
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h1 class="text-biru text-baloo"><?= $master[23]['isi'] ?></h1>
        </div>
        <div class="col-12 text-center">
            <img src="<?= base_url('asset/homepage/img/') . $img[6]['isi'] ?>" class="img-fluid">
        </div>
    </div>
</div>
<!-- Akhir Alasan -->

<!-- Promo -->
<div class="bg-abu text-baloo py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h1 class="text-orange"><?= $master[24]['isi'] ?></h1>
            </div>
            <?php $no = 1;
            foreach ($product as $p) : ?>
                <?php if ($no <= 3) : ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="card-promo shadow">
                            <div class="head text-center bg-biru">
                                <h1 class="mb-0 pt-4 pb-3 text-light"><?= $p['name']; ?></h1>
                            </div>
                            <div class="body pt-4 pb-4 px-4">
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <?= $p['description']; ?>
                                    </div>
                                    <div class="col-12 text-center py-3">
                                        <a href="<?= base_url('auth'); ?>" class="btn-promo text-orange px-5"><?= $master[25]['isi'] ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php $no++;
            endforeach; ?>
            <!-- <div class="col-lg-3 col-sm-6">
                <div class="card-promo shadow">
                    <div class="head text-center bg-biru">
                        <h1 class="mb-0 pt-4 pb-3 text-light">SAINTEK</h1>
                    </div>
                    <div class="body pt-4 pb-4 px-4">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h5 class="text-biru">Paket Hemat SOSHUM DISC 15%</h5>
                            </div>
                            <div class="col-12 text-center">
                                <p class="text-biru">Semakian rajin tryout
                                    semakin murah
                                </p>
                            </div>
                            <div class="col-12">
                                <div>6 x Tryout saintek</div>
                                <div>6 x konsultasi jurusan</div>
                                <div>Pembahasan soal</div>
                                <div>Report Progress full akses</div>
                            </div>
                            <div class="col-12 text-center py-3">
                                <h2 class="text-biru">Rp. 280.000,-</h2>
                            </div>
                            <div class="col-12 text-center py-3">
                                <a href="<?= base_url(''); ?>" class="btn-promo text-orange px-5">Beli</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <!-- <div class="col-lg-3 col-sm-6">
                <div class="card-promo shadow">
                    <div class="head text-center bg-biru">
                        <h1 class="mb-0 pt-4 pb-3 text-light">CAMPURAN</h1>
                    </div>
                    <div class="body pt-4 pb-4 px-4">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h5 class="text-biru">Paket Hemat Tryout CAMPURAN</h5>
                            </div>
                            <div class="col-12 text-center">
                                <p class="text-biru">Semakian rajin tryout
                                    semakin murah
                                </p>
                            </div>
                            <div class="col-12">
                                <div>6 x Tryout saintek/soshum</div>
                                <div>6 x konsultasi jurusan</div>
                                <div>Pembahasan soal</div>
                                <div>Report Progress full akses</div>
                            </div>
                            <div class="col-12 text-center py-3">
                                <h2 class="text-biru">Rp. 306.000,-</h2>
                            </div>
                            <div class="col-12 text-center py-3">
                                <a href="<?= base_url(''); ?>" class="btn-promo text-orange px-5">Beli</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->

            <div class="col-lg-3 col-sm-6 col-produk-lain">
                <a href="<?= base_url('auth'); ?>" class="btn-promo text-orange px-3 produk-lain"><?= $master[26]['isi'] ?> <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-caret-right-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                    </svg></a>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Promo -->

<!-- Testimoni -->
<div class="container text-baloo py-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="text-orange"><?= $master[27]['isi'] ?></h1>
        </div>
        <div class="col-md-12 text-center">
            <div id="carouselId" class="carousel slide" style="width: 100%;" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselId" data-slide-to="1"></li>
                    <li data-target="#carouselId" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php $no = 1;
                    foreach ($testi as $t) : ?>
                        <div class="carousel-item <?php if ($no == 2) {
                                                        echo 'active';
                                                    } ?>">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-10 py-5">
                                        <div class="kotak-kelompok bg-orange-muda text-left p-5 shadow">
                                            <div class="row">
                                                <div class="col-md-12 text-light h3">
                                                    <?= $t['nama'] ?>
                                                </div>
                                                <div class="col-md-12 text-light h3">
                                                    <?= $t['instansi'] ?>
                                                </div>
                                                <div class="col-md-7">
                                                    <p class="text-light h4">
                                                        <?= $t['isi'] ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php $no++;
                    endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                    <svg viewBox="0 0 16 16" class="bi bi-caret-left-fill prev-icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3.86 8.753l5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                    </svg>
                </a>
                <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                    <svg viewBox="0 0 16 16" class="bi bi-caret-right-fill next-icon" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12.14 8.753l-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Akhir Testimoni -->

<!-- QNA -->
<div class="bg-biru py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-orange text-center py-2 text-baloo text-qna">
                <span class="mr-3 "><?= $master[28]['isi'] ?></span>
                <a href="<?= base_url('home/tentang'); ?>" class="btn-qna px-5"><b><?= $master[29]['isi'] ?></b></a>
            </div>
        </div>
    </div>
</div>
<!-- Akhir QNA -->