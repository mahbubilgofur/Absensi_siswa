<!-- 
     1. select nis, count(keterangan) as total, sum(if(keterangan='s',1,0)) as sakit, sum(if(keterangan='i',1,0)) as ijin, sum(if(keterangan='h',1,0)) as hadir from data_absen group by nis ORDER BY `data_absen`.`nis` ASC;
    2. toastr  https://codeseven.github.io/toastr/demo.html
3. rule absen hanya berlaku 2 x saja
-->
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
                        <form method="POST" action="<?= base_url('rekap/detail') ?>">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label">NIS</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="<?= isset($_POST['nis']) ? $_POST['nis'] : '' ?>" placeholder="Masukan Nis" name="nis">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-10 col-form-label">PERIODE MULAI</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="startdate" class="form-control" value="<?= isset($_POST['startdate']) ? $_POST['startdate'] : date('Y-m-01') ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-10 col-form-label">PERIODE SELESAI</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="enddate" class="form-control" value="<?= isset($_POST['enddate']) ? $_POST['enddate'] : date('Y-m-d') ?>">
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <div class="form-group row">
                                        <label class="col-sm-5 col-form-label">KELAS</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="nama_kelas">
                                                <option value="">Pilih Kelas</option>
                                                <?php foreach ($list_kelas as $kelas) { ?>
                                                    <option value="<?= $kelas->nama_kelas ?>" <?= (isset($_POST['nama_kelas']) && $_POST['nama_kelas'] === $kelas->nama_kelas) ? 'selected' : '' ?>>
                                                        <?= $kelas->nama_kelas ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Cari</button>
                        </form>

                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">NIS</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">KELAS</th>
                                    <th scope="col">JENIS KELAMIN</th>
                                    <th scope="col">HADIR</th>
                                    <th scope="col">TERLAMBAT</th>
                                    <th scope="col">SAKIT</th>
                                    <th scope="col">IJIN</th>
                                    <th scope="col">ALPA</th>
                                    <th scope="col">JUMLAH</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data_siswa as $row) { ?>
                                    <tr>
                                        <td><?= $row->nis ?></td>
                                        <td><?= $row->nama_siswa ?></td>
                                        <td><?= $row->nama_kelas ?></td>
                                        <td><?= $row->jk ?></td>
                                        <td><?= $row->hadir ?></td>
                                        <td><?= $row->terlambat ?></td>
                                        <td><?= $row->sakit ?></td>
                                        <td><?= $row->ijin ?></td>
                                        <td style="color: <?= $row->alpa === 1 ? 'black; background-color: yellow;' : 'black;' ?>"><?= $row->alpa === 1 ? '1' : '0' ?></td>
                                        <td><?= $row->total ?></td>
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