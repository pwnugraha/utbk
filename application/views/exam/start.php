<?php
$mapel = array('Sejarah', 'Geografi', 'Ekonomi', 'Sosiologi');
$TotMapel = 4;
?>

<!doctype html>
<html lang="en">

<head>
    <title><?= $title ?></title>

    <link rel="icon" href="<?= base_url('asset/user/') ?>img/logo.png" type="image/gif">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="<?= base_url('asset/exam/css/style.css') ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="<?= base_url('asset/exam/js/jquery-3.5.1.min.js') ?>"></script>
    <script src="<?= base_url('asset/exam/js/jQuery.countdownTimer.js') ?>"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.countdown/2.2.0/jquery.countdown.min.js" integrity="sha512-lteuRD+aUENrZPTXWFRPTBcDDxIGWe5uu0apPEn+3ZKYDwDaEErIK9rvR0QzUGmUQ55KFE2RqGTVoZsKctGMVw==" crossorigin="anonymous"></script> -->
</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 pb-5 text-center border-right border-secondary">
                <div class="border-bottom py-3">
                    <div class="text-biru">Waktu Tersisa</div>
                    <div class="h2 text-success" id="getting-started"></div>
                    <div class="text-biru">Ujian SOSHUM okt</div>
                </div>
                <div class="mata-pelajaran my-2">
                    <div class="ket-warna-soal">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col">
                                    <div>
                                        <i class="fa fa-square text-orange" aria-hidden="true"></i>
                                    </div>
                                    <span class="text-ket-soal">Belum <br> Menjawab</span>
                                </div>
                                <div class="col ">
                                    <div>
                                        <i class="fa fa-square text-primary" aria-hidden="true"></i>
                                    </div>
                                    <span class="text-ket-soal">Sedang <br> Dijawab</span>
                                </div>
                                <div class="col ">
                                    <div>
                                        <i class="fa fa-square text-success" aria-hidden="true"></i>
                                    </div>
                                    <span class="text-ket-soal">Sudah <br> Dijawab</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php for ($i = 1; $i <= $TotMapel; $i++) : ?>
                        <button class="btn-mapel btn-block text-left border border-secondary rounded h5 px-2 py-1 my-3 " id="btn-mapel-<?= $i ?>">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-6 px-0">
                                        <?= $mapel[$i - 1]; ?>
                                    </div>
                                    <div class="col-6 px-0 text-right">
                                        <div class="fa fa-chevron-right rotate" id="icon-arrow-<?= $i ?>"></div>
                                    </div>
                                </div>
                            </div>
                        </button>
                        <div class="list-soal" id="list-soal-<?= $i ?>">
                            <div class="container-fluid">
                                <div class="row">
                                    <?php for ($j = 1; $j <= 15; $j++) : ?>
                                        <div class="col-3 my-2 text-center">
                                            <button id="soal-<?= $i ?>-<?= $j ?>" class="kotak-nomor bg-orange rounded"><?= $j ?></button>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>
                    <div class="text-center mt-5">
                        <button type="button" class="btn btn-selesai btn-primary py-1 px-5" style="background-color: #05164E; border-radius: 2em;">Selesai</button>
                    </div>
                </div>
            </div>
            <div class="col-md-9 py-3">
                <div class="text-right mb-5 pb-5">Hay, <span class="h5"><?= $user->username ?></span> semoga kamu berhasil</div>
                <div class="card mt-5">
                    <div class="card-body">
                        <div class="h5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt dolor tenetur rerum eligendi totam, vel distinctio vero dolorum cupiditate, facilis odit dolore earum veniam! Quidem pariatur sunt quas hic atque!</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <script type="text/javascript">
        // $('#getting-started').countdown('2021/01/01 ', function(event) {
        //     $(this).html(event.strftime('%D hari <br> %H jam <br> %M menit <br> %S detik'));
        // });

        $(document).ready(function() {
            $(".rotate").click(function() {})
            var waktu = $("#getting-started").countdowntimer({
                minutes: 120,
            });
        });
    </script>
    <!-- HIDE ALL SOAL -->
    <?php for ($i = 1; $i <= $TotMapel; $i++) : ?>
        <script>
            $("#list-soal-<?= $i ?>").hide();
        </script>
    <?php endfor; ?>

    <!-- TOGGLE SOAL -->
    <?php for ($i = 1; $i <= $TotMapel; $i++) : ?>
        <script>
            $("#btn-mapel-<?= $i ?>").click(function() {
                $("#list-soal-<?= $i ?>").toggle("slow");
                $("#icon-arrow-<?= $i ?>").toggleClass("down");

            });
        </script>
    <?php endfor; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>