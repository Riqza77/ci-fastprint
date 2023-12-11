<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Data Kategori</h1>
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
            <!-- <h3 class="card-title">DataTable with default features</h3> -->
            <a class="btn btn-success" data-toggle="modal" data-target="#myModal" href="#">
              <i class="fas fa-plus mr-1"></i>
              Tambah Data Kategori Baru
            </a>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="tabel-mahasiswa" class="tabel-data table table-bordered table-hover table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>No</th>
                  <th>Nama Kategori</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach ($kategori as $data) { ?>
                  <tr id="<?= $data->id_kategori; ?>">
                    <td></td>
                    <td><?= $no++; ?></td>
                    <td><?= $data->nama_kategori; ?></td>
                    <td>
                      <!-- <form class="form-delete""> -->
                      <div class="d-flex">
                        <a class="btn btn-primary m-1" data-toggle="modal" data-target="#editModal<?=$data->id_kategori?>" href="#">
                          <i class="fas fa-pen"></i>
                        </a>
                        <a class="btn btn-danger m-1 delete-btn " href="#">
                          <i class="fas fa-trash"></i>
                        </a>
                        
                      </div>
                      <!-- </form> -->
                    </td>
                  </tr>
                      <div id="editModal<?= $data->id_kategori;?>" class="modal" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <form method="post" action="<?= base_url().'editkategori/'.$data->id_kategori ?>">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Edit kategori</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body"> 
                                    <div class="form-group">
                                        <label for="nama_kategori">Nama Kategori :</label>
                                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="<?= $data->nama_kategori;?>" required autofocus>                 
                                        <input type="hidden" class="form-control" id="id" name="id" value="<?= $data->id_kategori;?>" required>
                                    </div> 
                     
                                    </div>
                                    <div class="modal-footer">
                                        <input type="Submit" value="Submit" class="btn btn-primary pull-right" />
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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

  <div id="myModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content--> 
        <div class="modal-content">
            <form method="post" action="<?= base_url('kategori') ?>">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Kategori Baru</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                
                    <div class="form-group">
                        <label for="nama_kategori">Kategori Baru:</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required autofocus>
                    </div> 

                   

                        <!-- <input type="text" value="<?=$record->harga?>" class="form-control" id="harga" name="harga" required> -->
                </div>
                <div class="modal-footer">
                    <input type="Submit" value="Submit" class="btn btn-primary pull-right" />
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>