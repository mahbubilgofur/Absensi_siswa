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
                <div class="card-body">
                    <h2 class="card-title">Edit Siswa</h2>
                    <br>
                    <br>
                    <form class="form-sample" action="<?= base_url('siswa/updateSiswa') ?>" method="POST">
                        <!-- DATA -->
                        <!-- <p class="card-description"> DATA </p> -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nis</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $data_siswa->nis ?>" disabled>
                                        <input type="hidden" name="nis" value="<?php echo $data_siswa->nis ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Nama Siswa</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="nama_siswa" value="<?php echo $data_siswa->nama_siswa ?>" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <select class="form-control" name="id_kelas" placeholder="Kelas">
                                <option value=""><?php echo $data_siswa->id_kelas ?></option>
                                <?php foreach ($data_kls as $row) { ?>
                                    <option value="<?php echo $row->id_kelas  ?>"><?php echo $row->nama_kelas  ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="id_jk" placeholder="jk">
                                <option value=""><?php echo $data_siswa->id_jk ?></option>
                                <?php foreach ($data_jk as $row) { ?>
                                    <option value="<?php echo $row->id_jk  ?>"><?php echo $row->jk  ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Ttl</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="ttl" value="<?php echo $data_siswa->ttl ?>" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Phone Number</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="number" value="<?php echo $data_siswa->number ?>" class="form-control" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="password" value="<?php echo $data_siswa->password ?>" class="form-control" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-warning" href="<?= base_url() ?>siswa/" role="button">Kembali</a>
                    </form>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>