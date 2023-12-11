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
        <a class="btn btn-danger" href="<?php echo base_url('produk'); ?>">
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
        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">Ubah Data</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form role="form" method="post" action="<?= base_url('edit/' . $produk->id_produk); ?>">
            <div class="card-body">

              
              
              <div class="form-group">
                <label for="nama_produk">Produk</label>
                <input name="nama_produk" type="text" class="form-control" id="nama_produk" value="<?php echo isset($nama_produk) ? $nama_produk : set_value('nama_produk', $produk->nama_produk); ?>" maxlength="50" autocomplete="off">
                <?= form_error('nama_produk','<small class="text-danger">','</small>');?>
              </div>

              <div class="form-group">
                <label for="harga">Harga</label>
                <input name="harga" type="text" class="form-control" id="harga" placeholder="Harga" maxlength="50" value="<?php echo isset($harga) ? $harga : set_value('harga', $produk->harga); ?>" autocomplete="off">
                <?= form_error('harga','<small class="text-danger">','</small>');?>
              </div>

              <div class="form-group">
                <label for="kategori" class="d-block">Kategori</label>
                <select class="form-control" name="kategori" required>
                  <?php
                  if(!empty($kategori))
                  {
                    foreach ($kategori as $kat)
                    { 
                      if($produk->kategori_id == $kat->id_kategori) : ?>
                      <option value="<?php echo $kat->id_kategori ?>" <?= set_select('kategori',$kat->id_kategori)?> selected><?php echo $kat->nama_kategori ?></option>
                      <?php else :?>
                        <option value="<?php echo $kat->id_kategori ?>" <?= set_select('kategori',$kat->id_kategori)?>><?php echo $kat->nama_kategori ?></option>
                    <?php endif;
                    }
                  } ?>
                </select>
                
              </div>

              <div class="form-group">
                <label for="status" class="d-block">Status</label>
                <select class="form-control" name="status" required>
                  <?php
                  if(!empty($status))
                  {
                    foreach ($status as $stat)
                    { 
                      if($produk->status_id == $stat->id_status) : ?>
                      <option value="<?php echo $stat->id_status ?>" <?= set_select('status',$stat->id_status)?> selected><?php echo $stat->nama_status ?></option>
                      <?php else :?>selected
                        <option value="<?php echo $stat->id_status ?>" <?= set_select('status',$stat->id_status)?> ><?php echo $stat->nama_status ?></option>
                    <?php endif;
                    }
                  } ?>
                </select>
                
              </div>



            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
          </form>
        </div>
        <!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->