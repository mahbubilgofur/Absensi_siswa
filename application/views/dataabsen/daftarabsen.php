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

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th scope="col">ID</th>
                                <th scope="col">NIS</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">KELAS</th>
                                <th scope="col">KETERANGAN</th>
                                <th scope="col">TGL ABSEN</th>
                                <th scope="col">JAM MASUK</th>
                                <th scope="col">JAM PULANG</th>
                            </thead>
                            <tbody>
                                <?php if (count($queryALLabsen) > 0) { ?>
                                    <?php foreach ($queryALLabsen as $key => $row) { ?>
                                        <tr>
                                            <td><?php echo $key + 1; ?></td>
                                            <td><?php echo $row->nis; ?></td>
                                            <td><?php echo $row->nama_siswa; ?></td>
                                            <td><?php echo $row->nama_kelas; ?></td>
                                            <td style="color: <?php echo ($row->keterangan === 't') ? 'black; background-color: yellow;' : (($row->keterangan === 'h') ? 'black; background-color: yellow;' : 'white'); ?>">
                                                <?php echo $row->keterangan; ?>
                                            </td>

                                            <td><?php echo $row->tgl_absen; ?></td>
                                            <td><?php echo $row->jam_masuk; ?></td>
                                            <td><?php echo $row->jam_pulang; ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } else { ?>
                                    <tr>
                                        <td colspan="8">Tidak ada data absensi.</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                    <!-- /.card-body -->
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