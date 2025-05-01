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
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <th scope="col">NO</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">JUDUL</th>
                                    <th scope="col">ICON</th>
                                    <th scope="col">ISI</th>
                                    <th scope="col">LINK ALAMAT</th>
                                    <th scope="col">Action</th>
                                </thead>


                                <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($queryALLalamat as $row) {
                                        $count = $count + 1;
                                    ?>
                                        <tr>
                                            <td><?php echo $count ?></td>
                                            <td><?php echo $row->id ?></td>
                                            <td><?php echo $row->icon ?></td>
                                            <td><?php echo $row->judul ?></td>
                                            <td><?php echo $row->isi ?></td>
                                            <td><?php echo $row->link ?></td>
                                            <td>
                                                <a href="<?= base_url('alamat/editalamat')  ?>/<?php echo $row->id ?> " class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
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

</div>
</div>
</div>
</div>
</div>
</section>
</div>