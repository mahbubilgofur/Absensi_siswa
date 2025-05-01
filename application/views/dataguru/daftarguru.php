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

          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            TAMBAH GURU
          </button>
          <!-- /.card-header -->
          <div class="card-body">
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Insert Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <form action="<?= base_url() ?>guru/InputGuru" method="POST">
                      <div class="form-group">
                        <label>Id Guru</label>
                        <input type="text" class="form-control" name="id_guru" placeholder="Id Guru" value="<?php echo sprintf($queryALLguru) ?>" readonly>
                      </div>
                      <div class="form-group">
                        <label>Nama Guru</label>
                        <input type="text" class="form-control" name="nama_guru" placeholder="Nama Guru" required>
                      </div>
                      <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" name="id_jk" placeholder="jk" required>
                          <option value="">select menu</option>
                          <?php foreach ($data_jk as $row) { ?>
                            <option value="<?php echo $row->id_jk  ?>"><?php echo $row->jk  ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Ttl</label>
                        <input type="date" class="form-control" name="ttl" placeholder="Tanggal Lahir" required>
                      </div>
                      <div class="form-group">
                        <label>Telepone</label>
                        <input type="text" class="form-control" name="telepone" placeholder="Telepone" required>
                      </div>
                      <div class="form-group">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password" placeholder="Password" required>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="sumbmit" class="btn btn-primary">Save changes</button>
                        <a href="<?php echo base_url() ?>guru/" class="btn btn-warning"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                      </div>
                    </form>

                  </div>
                </div>
              </div>
            </div>
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <th scope="col">Id Guru</th>
                <th scope="col">Nama Guru</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Ttl</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Password</th>
                <th scope="col">Action</th>
              </thead>
              <tbody>
                <?php
                foreach ($data_guru as $row) {

                ?>
                  <tr>
                    <td><?php echo $row->id_guru ?></td>
                    <td><?php echo $row->nama_guru ?></td>
                    <td><?php echo $row->id_jk ?></td>
                    <td><?php echo $row->ttl ?></td>
                    <td><?php echo $row->telepone ?></td>
                    <td><?php echo $row->password ?></td>
                    <td>
                      <a href="<?php echo base_url('guru/update/') . $row->id_guru ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                      <a href="<?php echo base_url('guru/delete/') . $row->id_guru ?>" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
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