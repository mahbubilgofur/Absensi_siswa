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
                                <form action="<?php echo base_url('team/fungsiteam') ?>" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ID TEAM</label>
                                            <input type="text" name="id_team" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">NAMA</label>
                                            <input type="text" name="nama" class="form-control" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">FOTO</label>
                                            <input type="file" name="foto" class="form-control" required size="20">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">JABATAN</label>
                                            <input type="text" name="jabatan" class="form-control" required>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                    <a class="btn btn-warning" href="<?= base_url('team') ?>" role="button">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>