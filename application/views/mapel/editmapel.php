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
                    <h2 class="card-title">EDIT MAPEL</h2>
                    <br>
                    <form class="form-sample" action="<?= base_url('mapel/updateMapel') ?>" method="POST">
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-10 col-form-label">KODE MAPEL</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="<?php echo $data_mapel->kode_mapel ?>" disabled>
                                        <input type="hidden" name="kode_mapel" value="<?php echo $data_mapel->kode_mapel ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-10 col-form-label">NAMA MAPEL</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="nama_mapel" value="<?php echo $data_mapel->nama_mapel ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a class="btn btn-warning" href="<?= base_url() ?>mapel/" role="button">Kembali</a>
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