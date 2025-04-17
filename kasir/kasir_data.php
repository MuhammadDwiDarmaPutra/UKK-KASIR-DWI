<?php
include "header.php";
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Petugas
        <small>Aplikasi Kasir</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Data Petugas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box box-primary">
            <div class="box-header">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-user"><i class="glyphicon glyphicon-plus"></i>
                Tambah
            </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAMA PETUGAS</th>
                        <th>USERNAME</th>
                        <th>ROLE</th>
                        <th>OPSI</th>
                    </tr>
                </thead>    
                <tbody>
                    <tr>
                        <?php
                        $dt_user = mysqli_query($koneksi, "SELECT * FROM tb_user where role='Kasir'");
                        $no = 1;
                        while ($user = mysqli_fetch_array($dt_user)){?>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $user ['NamaUser']; ?></td>
                        <td><?php echo $user ['username']; ?></td>
                        <td><?php echo $user ['role']; ?></td>
                        <td>
                            <button type="button" class="btn btn-xs btn-warning" title="Edit" data-toggle="modal" data-target="#edit-user<?php echo $user['UserID']; ?>">
                                <i class="glyphicon glyphicon-edit"></i>
                            </button>
                            <!-- Modal Edit -->
                            <div class="modal fade" id="edit-user<?php echo $user['UserID']; ?>">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Edit Data User</h4>
                                    </div>
                                        <form action="kasir_update.php" method="POST">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Nama User</label>
                                                    <input type="hidden" class="form-control" name="id_user" value="<?php echo $user['UserID']; ?>">
                                                    <input type="text" class="form-control" name="nm_user" value="<?php echo $user['NamaUser']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Username</label>
                                                    <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" class="form-control" name="password" value="<?php echo $user['password']; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label>Role</label>
                                                    <select class="form-control" name="role">
                                                    <option value="Admin" <?php if ($user['role'] == 'Admin') echo 'selected'; ?>>Admin</option>
                                                    <option value="Kasir" <?php if ($user['role'] == 'Kasir') echo 'selected'; ?>>Kasir</option>
                                                  </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                        </form>
                                    </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                                </div>
                                <a href="kasir_hapus.php?UserID=<?php echo $user['UserID']; ?>"" class="btn btn-xs btn-danger" role="button" title="Hapus">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                        </td>
                    </tr>
                        <?php
                        }
                        ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
      </div>
      <!-- /.row -->
    </div>
    <div class="modal fade" id="tambah-user">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Tambah Data user</h4>
              </div>
                <form action="kasir_proses.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama User</label>
                            <input type="text" class="form-control" name="nm_user">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="" class="btn btn-primary">Simpan</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
<?php
include "footer.php";
?>