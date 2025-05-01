<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row"></div>

            <div class="card">
                <div class="card-header">
                    <div class="alert alert-info" role="alert"></div>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        TAMBAH SISWA
                    </button>

                    <div class="card-body">

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Insert Data Siswa</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="<?= base_url() ?>siswa/InputSiswa" method="POST">
                                            <div class="form-group">
                                                <label>NIS</label>
                                                <input type="text" class="form-control" name="nis" placeholder="Nis" value="<?php echo sprintf($queryALLsiswa) ?>" readonly>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Siswa</label>
                                                <input type="text" class="form-control" name="nama_siswa" placeholder="Nama Siswa" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Kelas</label>
                                                <select name="id_kelas" class="form-control" required>
                                                    <option value="">-- Pilih Kelas --</option>
                                                    <?php foreach ($data_kls as $kelas): ?>
                                                        <option value="<?= $kelas->id_kelas ?>"><?= $kelas->nama_kelas ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Jenis Kelamin</label>
                                                <select name="id_jk" class="form-control" required>
                                                    <option value="">-- Pilih Jenis Kelamin --</option>
                                                    <?php foreach ($data_jk as $jk): ?>
                                                        <option value="<?= $jk->id_jk ?>"><?= $jk->jk ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="ttl" placeholder="Tempat, Tanggal Lahir" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Nomor Hp</label>
                                                <input type="text" class="form-control" name="number" placeholder="Nomor" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                <a href="<?php echo base_url() ?>siswa/" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th scope="col">NIS</th>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">ID Kelas</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">TTL</th>
                                <th scope="col">Nomor</th>
                                <th scope="col">Password</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                <?php foreach ($data_siswa as $row) { ?>
                                    <tr>
                                        <td><?php echo $row->nis ?></td>
                                        <td><?php echo $row->nama_siswa ?></td>
                                        <td><?php echo $row->nama_kelas ?></td>
                                        <td><?php echo $row->id_jk ?></td>
                                        <td><?php echo $row->ttl ?></td>
                                        <td><?php echo $row->number ?></td>
                                        <td><?php echo $row->password ?></td>
                                        <td>
                                            <a href="<?php echo base_url('siswa/update/') . $row->nis ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="<?php echo base_url('siswa/delete/') . $row->nis ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>