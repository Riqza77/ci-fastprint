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
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main Content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <a class="btn btn-success" href="<?php echo base_url('tambah') ?>">
              <i class="fas fa-plus mr-1"></i>
              Tambah Data Produk Baru
            </a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="tabel-jurusan" style="width:100%" class="tabel-data table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>No</th>
                  <th>Nama Produk</th>
                  <th>Harga</th>
                  <th>Kategori</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($produk as $data) { ?>
                  <tr id="<?= $data->id_produk; ?>">
                    <td></td>
                    <td><?= $no++; ?></td>
                    <td><?= $data->nama_produk; ?></td>
                    <td><?= indo_currency($data->harga); ?></td>
                    <td><?= $data->nama_kategori; ?></td>
                    <td><?= $data->nama_status; ?></td>
                    <td>
                      <div class="d-flex">
                        <a class="btn btn-primary m-1" href="<?php echo base_url('edit/' . $data->id_produk) ?>">
                          <i class="fas fa-pen"></i>
                        </a>
                        <a class="btn btn-danger m-1 delete-btn" href="#">
                          <i class="fas fa-trash"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->