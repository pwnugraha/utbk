<?php
// ================= Contoh Data =================

$mapel = $subjects;

$soal = $subjects_soal;

// Opsi
$jawaban = $subjects_soal;
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-3 pb-5 text-center border-secondary shadow">
            <div class="border-bottom py-3">
                <div class="text-biru">Waktu Tersisa</div>
                <div class="h2 text-success" id="getting-started"></div>
                <div class="text-biru">Ujian <?= $exam_name ?></div>
            </div>
            <div class="mata-pelajaran my-2">
                <div class="ket-warna-soal">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col">
                                <div>
                                    <i class="fa fa-square text-orange" aria-hidden="true"></i>
                                </div>
                                <p class="text-ket-soal">Belum <br> Menjawab</p>
                            </div>
                            <div class="col ">
                                <div>
                                    <i class="fa fa-square text-primary" aria-hidden="true"></i>
                                </div>
                                <p class="text-ket-soal">Sedang <br> Dijawab</p>
                            </div>
                            <div class="col ">
                                <div>
                                    <i class="fa fa-square text-success" aria-hidden="true"></i>
                                </div>
                                <p class="text-ket-soal">Sudah <br> Dijawab</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i = 1;
                foreach ($mapel as $m) : ?>
                    <button class="btn-mapel btn-block text-left border border-secondary rounded h5 px-2 py-1 my-3 " id="btn-mapel-<?= $i ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-6 px-0">
                                    <?= $mapel[$i - 1]; ?>
                                </div>
                                <div class="col-6 px-0 text-right">
                                    <div class="fa fa-chevron-right icon-arrow rotate" id="icon-arrow-<?= $i ?>"></div>
                                </div>
                            </div>
                        </div>
                    </button>
                    <div class="list-soal" id="list-soal-<?= $i ?>">
                        <div class="container-fluid">
                            <div class="row">
                                <?php $j = 1;
                                foreach ($soal[$m] as $s) : ?>
                                    <div class="col-3 my-2 text-center">
                                        <button id="soal-<?= $i ?>-<?= $j ?>" class="kotak-nomor bg-orange rounded"><?= $j ?></button>
                                    </div>
                                <?php $j++;
                                endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php $i++;
                endforeach; ?>

                <div class="text-center mt-5">
                    <a href="<?= base_url('exm/finish') ?>" id="btn-selesai" class="btn btn-selesai border-0 btn-primary py-1 px-5" style="background-color: #05164E; border-radius: 2em;">Selesai</a>
                </div>
            </div>
        </div>
        <div class="col-md-9 py-3">
            <div class="text-right mb-5 pb-5">Hay, <span class="h5"><?= $user->username ?></span> semoga kamu berhasil</div>

            <?php
            if ($soal) :

                $i = 1;
                foreach ($mapel as $m) :

                    $j = 1;
                    foreach ($soal[$m] as $key => $s) :

            ?>
                        <div class="card shadow mb-5 kotak-pertanyaan" id="no-soal-<?= $i; ?>-<?= $j ?>">
                            <div class="card-body">
                                <small class="text-secondary"><?= $m ?></small>
                                <div class="text-biru h5">Soal <?= $j; ?></div>
                                <hr>
                                <!-- Pertanyaan -->
                                <div class="text-hitam mt-4 pertanyaan text-justify">
                                    <?= $s['soal'] ?>
                                </div>
                                <!-- Opsi Jawaban -->
                                <form action="">
                                    <?php $k = 1;
                                    foreach ($jawaban[$m][$key]['opt'] as $jwb) : ?>
                                        <div class="form-group mt-3">
                                            <div class="form-check form-check-inline d-block">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="radio" name="answer" id="answer-<?= $i ?>-<?= $j ?>-<?= $k ?>" data-soalid="<?= $s['soal_id'] ?>" value="<?= $k ?>" <?= ($jawaban[$m][$key]['user_answer'] == $k) ? 'checked' : '' ?>>
                                                    <?= substr(str_replace('<span xss=removed>','', $jwb), 3, -4) ?>
                                                </label>
                                            </div>
                                        </div>
                                    <?php $k++;
                                    endforeach; ?>
                                </form>

                                <div class="text-right">
                                    <?php if (!($j - 1 == 0)) : ?>
                                        <button class="btn btn-dark py-0" id="back-<?= $i; ?>-<?= $j - 1 ?>" style="background-color: #05164E;">Back</button>
                                    <?php endif; ?>
                                    <?php if (!($j - count($soal[$m]) == 0)) : ?>
                                        <button class="btn btn-dark py-0" id="next-<?= $i; ?>-<?= $j + 1 ?>" style="background-color: #05164E;">Next</button>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
            <?php
                        $j++;
                    endforeach;
                    $i++;
                endforeach;
            endif;
            ?>

        </div>
    </div>
</div>

<!-- =========================== COUNDOWN TIME =========================== -->
<script type="text/javascript">
    // $('#getting-started').countdown('2021/01/01 ', function(event) {
    //     $(this).html(event.strftime('%D hari <br> %H jam <br> %M menit <br> %S detik'));
    // });

    $(document).ready(function() {
        $(".rotate").click(function() {})
        var waktu = $("#getting-started").countdowntimer({
            seconds: <?= $exam_time ?>,
            timeUp : timeIsUp
        });

        function timeIsUp() {
            window.location.replace(window.location.origin+'/utbk/exm/finish');
        }
    });
</script>
<!-- =========================== AKHIR COUNDOWN TIME =========================== -->

<!-- =========================== TOGGLE SIDEBAR =========================== -->

<?php for ($i = 1; $i <= count($mapel); $i++) : ?>
    <script>
        // HIDE
        $("#list-soal-<?= $i ?>").hide();

        // TOGGLE mata pelajaran
        $("#btn-mapel-<?= $i ?>").click(function() {
            // $(".list-soal").hide();
            // $(".icon-arrow").removeClass('down');

            $("#list-soal-<?= $i ?>").toggle("slow");
            $("#icon-arrow-<?= $i ?>").toggleClass("down");
        });
    </script>
<?php endfor; ?>
<!-- =========================== AKHIR TOGGLE SIDEBAR =========================== -->

<!-- =========================== TOGGLE MAIN CONTENT =========================== -->
<?php
$i = 1;
foreach ($mapel as $s) :
    $j = 1;
    foreach ($soal[$s] as $key => $m) :
?>
        <script>
            // HIDE
            $("#no-soal-<?= $i ?>-<?= $j ?>").hide();

            var val_i = parseInt(<?= $i ?>);
            var val_j = parseInt(<?= $j ?>);

            if (val_i == 1 && val_j == 1) {
                $("#no-soal-<?= $i ?>-<?= $j ?>").show();
                $("#list-soal-<?= $i ?>").show();
                $("#icon-arrow-<?= $i ?>").addClass("down");
                $("#soal-<?= $i ?>-<?= $j ?>").addClass("bg-primary text-light");
            }


            // TOGGLE pertanyaan
            $("#soal-<?= $i ?>-<?= $j ?>").click(function() {
                $(".kotak-pertanyaan").hide();
                $(".kotak-nomor").removeClass("bg-primary text-light");

                $("#no-soal-<?= $i; ?>-<?= $j ?>").toggle();
                $("#soal-<?= $i ?>-<?= $j ?>").addClass("bg-primary text-light");
            });

            $("#next-<?= $i ?>-<?= $j + 1 ?>").click(function() {
                $("#no-soal-<?= $i ?>-<?= $j ?>").hide();
                $(".kotak-nomor").removeClass("bg-primary text-light");

                $("#no-soal-<?= $i; ?>-<?= $j + 1 ?>").show();
                $("#soal-<?= $i ?>-<?= $j + 1 ?>").addClass("bg-primary text-light");
            });

            $("#back-<?= $i ?>-<?= $j - 1 ?>").click(function() {
                $("#no-soal-<?= $i ?>-<?= $j ?>").hide();
                $(".kotak-nomor").removeClass("bg-primary text-light");

                $("#no-soal-<?= $i; ?>-<?= $j - 1 ?>").show();
                $("#soal-<?= $i ?>-<?= $j - 1 ?>").addClass("bg-primary text-light");
            });
        </script>

        <?php
        $k = 1;
        foreach ($jawaban[$s][$key]['opt'] as $jwb) : ?>
            <script>
                if ($('#answer-<?= $i; ?>-<?= $j ?>-<?= $k ?>').is(':checked')) {
                    $(".kotak-nomor").removeClass("bg-primary");
                    $("#soal-<?= $i ?>-<?= $j ?>").addClass("bg-success text-white");
                }
                $("#answer-<?= $i; ?>-<?= $j ?>-<?= $k ?>").click(function() {
                    if ($('#answer-<?= $i; ?>-<?= $j ?>-<?= $k ?>').is(':checked')) {
                        $(".kotak-nomor").removeClass("bg-primary");
                        $("#soal-<?= $i ?>-<?= $j ?>").addClass("bg-success text-white");

                        //update answer
                        $.ajax({
                            url: window.location.origin + '/utbk/exm/update_answer',
                            method: "POST",
                            data: {
                                id: $(this).attr('data-soalid'),
                                answer: $(this).val()
                            },
                            dataType: 'json',
                            success: function(data) {
                                if (data.status) {

                                }
                            }
                        });
                    }
                });
            </script>
        <?php
            $k++;
        endforeach;
        ?>

<?php
        $j++;
    endforeach;
    $i++;
endforeach;
?>
<!-- =========================== AKHIR TOGGLE MAIN CONTENT =========================== -->