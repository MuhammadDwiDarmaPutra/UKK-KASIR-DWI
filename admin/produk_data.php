<?php
include "header.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Data Produk <small>Aplikasi Kasir</small></h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li class="active">Data Produk</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="box box-primary">
      <div class="box-header">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah-produk">
          <i class="glyphicon glyphicon-plus"></i> Tambah
        </button>
      </div>

      <div class="box-body">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>NO</th>
              <th>NAMA PRODUK</th>
              <th>HARGA</th>
              <th>STOK</th>
              <th>GAMBAR</th>
              <th>OPSI</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $dt_produk = mysqli_query($koneksi, "SELECT * FROM tb_produk");
            $no = 1;
            while ($produk = mysqli_fetch_array($dt_produk)) { ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $produk['NamaProduk']; ?></td>
                <td><?php echo $produk['Harga']; ?></td>
                <td><?php echo $produk['Stok']; ?></td>
                <td>
                  <img src="gambar/<?php echo $produk['img']; ?>" width="50" alt="Gambar Produk">
                </td>
                <td>
                  <!-- Tombol Edit -->
                  <button type="button" class="btn btn-xs btn-warning" title="Edit" data-toggle="modal" data-target="#edit-produk<?php echo $produk['ProdukID']; ?>">
                    <i class="glyphicon glyphicon-edit"></i>
                  </button>
                  <!-- Tombol Hapus -->
                  <a href="produk_hapus.php?ProdukID=<?php echo $produk['ProdukID']; ?>" class="btn btn-xs btn-danger" title="Hapus" onclick="return confirm('Yakin ingin menghapus produk ini?')">
                    <i class="glyphicon glyphicon-trash"></i>
                  </a>

                  <!-- Modal Edit -->
                  <div class="modal fade" id="edit-produk<?php echo $produk['ProdukID']; ?>">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Edit Data Produk</h4>
                        </div>
                        <form action="produk_update.php" method="POST" enctype="multipart/form-data">
                          <div class="modal-body">
                            <div class="form-group">
                              <label>Nama Produk</label>
                              <input type="hidden" class="form-control" name="id_produk" value="<?php echo $produk['ProdukID']; ?>">
                              <input type="text" class="form-control" name="nm_produk" value="<?php echo $produk['NamaProduk']; ?>">
                            </div>
                            <div class="form-group">
                              <label>Harga</label>
                              <input type="text" class="form-control" name="harga" value="<?php echo $produk['Harga']; ?>">
                            </div>
                            <div class="form-group">
                              <label>Stok</label>
                              <input type="number" class="form-control" name="stok" value="<?php echo $produk['Stok']; ?>">
                            </div>
                            <div class="form-group">
                              <label>Gambar Produk (Kosongkan jika tidak ingin mengubah)</label>
                              <input type="file" class="form-control" name="img">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </section>
</div>

<!-- Modal Tambah Produk -->
<div class="modal fade" id="tambah-produk">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tambah Data Produk</h4>
      </div>
      <form action="produk_proses.php" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" class="form-control" name="nm_produk">
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input type="text" class="form-control" name="harga">
          </div>
          <div class="form-group">
            <label>Stok</label>
            <input type="number" class="form-control" name="stok">
          </div>
          <div class="form-group">
            <label>Gambar Produk</label>
            <input type="file" class="form-control" name="img">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<?php
include "footer.php";
?>
