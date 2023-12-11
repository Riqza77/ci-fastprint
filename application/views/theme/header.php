<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <title>Test | <?= $title;?></title>
  
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- icon web -->
  <link rel="shortcut icon" href="https://pmb.stain-madina.ac.id/front/images/flat-color-icons-svg/shop.svg">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/fontawesome-free/css/all.min.css">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <!-- DataTables Responsive -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  
  <!-- AdminLTE Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>public/dist/css/adminlte.min.css">
  
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <!-- Sweet Alert -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/sweetalert/css/sweetalert.css" />

  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/toastr/toastr.min.css">

  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?= base_url() ?>public/dist/fonts/source-sans-pro-300,400,400i,700.css" >

</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <?php $this->load->view('theme/navbar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">