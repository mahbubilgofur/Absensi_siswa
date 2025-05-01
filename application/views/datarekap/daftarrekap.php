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

                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th scope="col">NIS</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">KELAS</th>
                                <th scope="col">JENIS KELAMIN</th>
                                <th style="background-color: aqua;" scope="col">HADIR</th>
                                <th style="background-color: darkorange;" scope="col">TERLAMBAT</th>
                                <th style="background-color: greenyellow;" scope="col">SAKIT</th>
                                <th style="background-color: yellow;" scope="col">IJIN</th>
                                <th style="background-color: red;" scope="col">ALPA</th>
                                <th style="background-color: black;" scope="col">JUMLAH</th>
                            </thead>
                            <tbody>
                                <?php foreach ($data_siswa as $row) { ?>
                                    <tr style="background-color: black;">
                                        <td style="color: white;"><?= $row->nis ?></td>
                                        <td style="color: white;"><?= $row->nama_siswa ?></td>
                                        <td style="color: white;"><?= $row->nama_kelas ?></td>
                                        <td style="color: white;"><?= $row->jk ?></td>
                                        <td style="color: aqua;"><?= $row->hadir ?></td>
                                        <td style="color: darkorange;"><?= $row->terlambat ?></td>
                                        <td style="color: greenyellow;"><?= $row->sakit ?></td>
                                        <td style="color: yellow;"><?= $row->ijin ?></td>
                                        <td style="color: <?= $row->alpa === 1 ? 'red; background-color: yellow;' : 'red;' ?>"><?= $row->alpa === 1 ? '1' : '0' ?></td>
                                        <td style="color: blue;"><?= $row->total ?></td>
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