<!--==========================
    Intro Section
  ============================-->
<div style="width: 100%; height: 10px;"></div>
<section id="intro" class="wow fadeInUp">
    <div class="container">
        <div class="intro-content">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        <h3>
                            <div id="date-and-clock">
                                <h3 id="clocknow"></h3>
                                <h3 id="datenow"></h3>
                            </div>
                            <script type="text/javascript">
                                function currentTime() {
                                    var date = new Date();
                                    var hour = date.getHours();
                                    var min = date.getMinutes();
                                    var sec = date.getSeconds();
                                    hour = updateTime(hour);
                                    min = updateTime(min);
                                    sec = updateTime(sec);
                                    document.getElementById("clocknow").innerText = hour + " : " + min + " : " + sec; /* adding time to the div */

                                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                    var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];

                                    var curWeekDay = days[date.getDay()]; // get day
                                    var curDay = date.getDate(); // get date
                                    var curMonth = months[date.getMonth()]; // get month
                                    var curYear = date.getFullYear(); // get year
                                    var date = curWeekDay + ", " + curDay + " " + curMonth + " " + curYear; // get full date
                                    document.getElementById("datenow").innerHTML = date;

                                    var t = setTimeout(function() {
                                        currentTime()
                                    }, 1000); /* setting timer */
                                }

                                function updateTime(k) {
                                    if (k < 10) {
                                        return "0" + k;
                                    } else {
                                        return k;
                                    }
                                }

                                if (document.getElementById("clocknow")) {
                                    currentTime(); /* calling currentTime() function to initiate the process */
                                }
                            </script>

                            <!-- Menampilkan Hari, Bulan dan Tahun -->
                        </h3>

                    </h3>


                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <div class="card-body">
                    <div class="input-group mb-3">
                        <?= form_error('nis', '<small class="text-danger pl-3">', '</small>');
                        ?>
                        <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" value="<?= set_value('nis'); ?>" required>
                        <div class="input-group-append">

                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>');
                        ?>
                        <input type="password" name="password" id="password" class="form-control" placeholder="PASSWORD" required>
                    </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">

                    <!-- <button type="button" class="btn btn-primary" onclick="cekNIS()">ABSEN</button> -->
                    <button type="button" class="btn btn-primary" onclick="absen3()">ABSEN</button>

                </div>
                <div class="card-footer">
                    <button type="button" name="ijin" style="width: 80px;" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter2">IZIN</button>
                    <button type="button" name="sakit" style="width: 80px;" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter22">SAKIT</button>
                </div>
                <!-- /.card-footer -->

            </div>
        </div>
    </div>
</section><!-- #intro -->
<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Upload Surat</h5>
                <a href="<?php echo base_url('') ?>" class="btn btn-warning"><span aria-hidden="true">&times;</span></a>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="file" class="form-control-file" id="keterangan" name="keterangan" id="exampleFormControlFile1">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                <button type="submit" class="btn btn-primary" onclick="ijin()">Kirim</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModalCenter22" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Upload Surat</h5>
                <a href="<?php echo base_url('') ?>" class="btn btn-warning"><span aria-hidden="true">&times;</span></a>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <input type="file" class="form-control-file" id="keterangan1" name="keterangan1" id="exampleFormControlFile1">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary" onclick="sakit()">Kirim</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function sakit() {
        var nis = document.getElementById("nis").value;
        var password = document.getElementById("password").value;
        var fileInput = document.getElementById('keterangan1');
        var file = fileInput.files[0];

        var data = new FormData();
        data.append('nis', nis);
        data.append('password', password);
        data.append('keterangan1', file);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('api/sakit'); ?>",
            dataType: "json",
            data: data,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status == 1) {
                    alert("Surat sakit berhasil terkirim");
                } else if (response.status == 2) {
                    alert("Surat sakit tidak terkirim");
                } else if (response.status == 3) {
                    alert("Maaf tidak bisa absen sakit karena lebih dari jam 12.00");
                } else if (response.status == 4) {
                    alert("Absen masuk dibuka pada jam 06.00");
                } else if (response.status == 5) {
                    alert("Anda sudah absensi hari ini");
                } else if (response.status == 6) {
                    alert("Absen ditutup hari ini hari libur");
                } else {
                    alert("NIS dan PASSWORD tidak terdaftar");
                }
            },
            error: function() {
                alert("Terjadi kesalahan saat absen");
            }
        });
    }

    function ijin() {
        var nis = document.getElementById("nis").value;
        var password = document.getElementById("password").value;
        var fileInput = document.getElementById('keterangan');
        var file = fileInput.files[0];

        var data = new FormData();
        data.append('nis', nis);
        data.append('password', password);
        data.append('keterangan', file);

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('api/ijin'); ?>",
            dataType: "json",
            data: data,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status == 1) {
                    alert("Surat ijin berhasil terkirim");
                } else if (response.status == 2) {
                    alert("Surat sakit tidak terkirim");
                } else if (response.status == 3) {
                    alert("Maaf tidak bisa absen ijin karena lebih dari jam 12.00");
                } else if (response.status == 4) {
                    alert("Absen masuk dibuka pada jam 06.00");
                } else if (response.status == 5) {
                    alert("Anda sudah absensi hari ini");
                } else if (response.status == 6) {
                    alert("Absen ditutup hari ini hari libur");
                } else {
                    alert("NIS dan PASSWORD tidak terdaftar");
                }
            },
            error: function() {
                alert("Terjadi kesalahan saat absen");
            }
        });
    }

    function absen3() {
        var nis = document.getElementById("nis").value;
        var password = document.getElementById("password").value;


        var data = {
            "nis": nis,
            "password": password,

        };

        $.ajax({
            type: "POST",
            url: "<?php echo base_url('api/absen3'); ?>",
            dataType: "json",
            data: JSON.stringify(data),
            success: function(response) {
                if (response.status == 1) {
                    toastr.success("Absen masuk berhasil terkirim", "Sukses", {
                        "class": "toast--bold"
                    });
                } else if (response.status == 2) {
                    toastr.success("Absen pulang berhasil terkirim", "Sukses", {
                        "class": "toast--bold"
                    });
                } else if (response.status == 3) {
                    toastr.error("Gagal absen masuk", "Error", {
                        "class": "toast--bold"
                    });
                } else if (response.status == 4) {
                    toastr.error("Anda sudah absen hari ini", "Error", {
                        "class": "toast--bold"
                    });
                } else if (response.status == 5) {
                    toastr.error("Belum waktunya absen pulang", "Error", {
                        "class": "toast--bold"
                    });
                } else if (response.status == 6) {
                    toastr.error("Anda tidak bisa absen waktu sudah lebih dari jam pulang", "Error", {
                        "class": "toast--bold"
                    });
                } else if (response.status == 7) {
                    toastr.error("Absen masuk dibuka pada jam 06.00", "Error", {
                        "class": "toast--bold"
                    });
                } else if (response.status == 8) {
                    toastr.success("Absen terlambat berhasil terkirim", "Sukses", {
                        "class": "toast--bold"
                    });
                } else if (response.status == 9) {
                    toastr.error("Absen ditutup hari ini hari libur", "Error", {
                        "class": "toast--bold"
                    });
                } else {
                    toastr.error("NIS dan PASSWORD tidak terdaftar", "Error", {
                        "class": "toast--bold"
                    });
                }
            },
            error: function() {
                toastr.error("Terjadi kesalahan saat absen", "Error", {
                    "class": "toast--bold"
                });
            }
        });

    }
</script>
<main id="main">

    <!--==========================
About Section
============================-->
    <!-- <section id="about" class="wow fadeInUp">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 about-img">
                    <img src="img/about-img.jpg" alt="">
                </div>

                <div class="col-lg-6 content">
                    <h2>Lorem ipsum dolor sit amet, consectetur adipiscing</h2>
                    <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3> -->

    <!-- <ul>
        <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
        <li><i class="ion-android-checkmark-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
        <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
    </ul>

    </div>
    </div>

    </div>
    </section>#about -->

    <!--==========================
Services Section
============================-->

    <!--==========================
Clients Section
============================-->

    <!--==========================
Our Portfolio Section
============================-->

    <!--==========================
Call To Action Section
============================-->

    <!--==========================
Our Team Section
============================-->
    <section id="team" class="wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2>Team

                </h2>
            </div>
            <div class="row">
                <?php foreach ($queryALLteam as $row) { ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="member">
                            <div class="pic"><img src="<?php echo base_url() . '/gambar/' . $row->foto ?>" alt=""></div>
                            <div class="details">
                                <h4><?php echo $row->nama ?></h4>
                                <span><?php echo $row->jabatan ?></span>
                                <div class="social">
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-facebook"></i></a>
                                    <a href=""><i class="fa fa-google-plus"></i></a>
                                    <a href=""><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
    </section><!-- #team -->

    <!--==========================
Contact Section
============================-->
    <section id="contact" class="wow fadeInUp">
        <div class="container">
            <div class="section-header">
                <h2>ALAMAT</h2>
            </div>

            <div class="row contact-info">
                <?php foreach ($queryALLalamat as $row) { ?>
                    <div class="col-md-4">
                        <div class="contact-address">
                            <i class="<?php echo $row->icon ?>"></i>
                            <h3><?= $row->judul ?></h3>
                            <p><a href="<?php echo $row->link ?>"><?php echo $row->isi ?></a></p>
                            <?php if (!empty($row->isi2) && !empty($row->link2)) { ?>
                                <p><a href="<?php echo $row->link2 ?>"><?php echo $row->isi2 ?></a></p>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

        <?php foreach ($queryALLwilayah as $row) { ?>
            <div class="container mb-4">
                <iframe src=" <?php echo $row->link_wilayah ?> " width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>

            </div>
        <?php } ?>

    </section><!-- #contact -->

</main>