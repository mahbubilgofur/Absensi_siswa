<!-- C O N T E N T -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('welcome') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
                <div class="card-header">
                    <div class="alert alert-info" role="alert">

                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="form-group">
                            <div class="container">
                                <form action="<?php echo base_url('dataabsen/fungsiedit') ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ID</label>
                                            <input type="text" name="id" class="form-control" readonly>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">USERNAME</label>
                                            <input type="text" name="username" class="form-control" value="<?php echo $querydataabsen->username ?>">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">PASSWORD</label>
                                            <input type="password" name="password" class="form-control" value="<?php echo $querydataabsen->password ?>" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">FOTO</label>
                                            <input type="file" name="surat" class="form-control" value="<?php echo $querydataabsen->surat ?>" required size="20">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">jabatanm</label>
                                            <input type="text" name="time" class="form-control" value="<?php
                                                                                                        $date = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
                                                                                                        echo $date->format('d-m-y H:i:s'); // 22:14:56
                                                                                                        ?>" readonly>
                                        </div>
                                        <img width="100" src="<?php echo base_url('surat'); ?>/<?php echo $querydataabsen->surat ?>" />
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    <a class="btn btn-warning" href="<?= base_url('dataabsen') ?>" role="button">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>