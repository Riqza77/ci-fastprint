<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Produk</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row mb-2">
      <div class="col-sm-6">
      <a class="btn btn-danger" href="<?php echo base_url(); ?>">
          <i class="fas fa-times mr-1"></i>
          Batal
        </a>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main Content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah Data Produk</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="post" action="<?= base_url('tambah'); ?>">
            <div class="card-body">
              
              <!--  -->
              <div class="form-group">
                <label for="nama_produk">Produk</label>
                <input name="nama_produk" type="text" class="form-control" id="nama_produk" placeholder="Produk" maxlength="50" value="<?= set_value('nama_produk') ?>" autocomplete="off" autofocus>
                <?= form_error('nama_produk','<small class="text-danger">','</small>');?>
              </div>

              <div class="form-group">
                <label for="harga">Harga</label>
                <input name="harga" type="text" class="form-control" id="harga" placeholder="Harga" maxlength="50" value="<?= set_value('harga') ?>" autocomplete="off">
                <?= form_error('harga','<small class="text-danger">','</small>');?>
              </div>

              <div class="form-group">
                <label for="kategori" class="d-block">Kategori</label>
                <select class="form-control" name="kategori" required>
                  <option value="">-Pilih Kategori-</option>
                  <?php
                  if(!empty($kategori))
                  {
                    foreach ($kategori as $kat)
                    { ?>
                      <option value="<?php echo $kat->id_kategori ?>" <?= set_select('kategori',$kat->id_kategori)?> ><?php echo $kat->nama_kategori ?></option>
                      <?php
                    }
                  } ?>
                </select>
                
              </div>

              <div class="form-group">
                <label for="status" class="d-block">Status</label>
                <select class="form-control" name="status" required>
                  <option value="">-Pilih Status-</option>
                  <?php
                  if(!empty($status))
                  {
                    foreach ($status as $stat)
                    { ?>
                      <option value="<?php echo $stat->id_status ?>" <?= set_select('status',$stat->id_status)?> ><?php echo $stat->nama_status ?></option>
                      <?php
                    }
                  } ?>
                </select>
                
              </div>


            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->