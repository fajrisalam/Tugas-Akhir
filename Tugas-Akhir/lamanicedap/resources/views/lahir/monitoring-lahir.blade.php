@extends('layout.main')

@section('tittle')
LAMANICEDAP - FORM LAHIR
@endsection

@section('breadcrumb')
<li>Lahir</li>
<li class="active">Data Lahir</li>
@endsection

@section('content')
<div class="row">
        
        <!-- right column -->
        <div class="col-md-1"></div>
        <div class="col-md-8">
          <!-- Horizontal Form -->
          
          <!-- /.box -->
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Monitoring Lahir</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                
                <h5><b>No Transaksi/No NIK Ibu</b></h5>
                <div class="col-xs-12 padding0">
                <div class="form-group col-xs-9 padding0">
                  <input type="text" class="form-control" placeholder="Masukkan no transaksi/NIK ibu" >
                </div>
                <div class="col-xs-3">
                  <button type="button" class="btn btn-block btn-success btn-sm marginbot15">Cek</button>
                </div>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
@endsection



{{-- 

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LAMANICEDAP - FORM LAHIR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="plugin/form.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>LAMA</b>NICEDAP</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">

      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Lahir</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li ><a href="../forms/form-lahir.html"><i class="fa fa-circle-o"></i> Daftar Lahir</a></li>
            <li><a href="../upload/upload-lahir.html"><i class="fa fa-circle-o"></i> Upload Lahir</a></li>
            <li class="active"><a href="../forms/monitoring-lahir.html"><i class="fa fa-circle-o"></i> Monitoring</a></li>
            <li><a href="../bantuan/bantuan-lahir.html"><i class="fa fa-circle-o"></i> Bantuan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Mati</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> Daftar Mati</a></li>
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Upload Mati</a></li>
            <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Monitoring</a></li>
            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Bantuan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Pindah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> Daftar Pindah</a></li>
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Upload Pindah</a></li>
            <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Monitoring</a></li>
            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Bantuan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Datang</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> Daftar Datang</a></li>
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Upload Datang</a></li>
            <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Monitoring</a></li>
            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Bantuan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Nikah</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> Daftar Nikah</a></li>
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Upload Nikah</a></li>
            <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Monitoring</a></li>
            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Bantuan</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Cerai</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> Daftar Cerai</a></li>
            <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Upload Cerai</a></li>
            <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Monitoring</a></li>
            <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Bantuan</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb ">
        <li><a href="#"><i class="fa fa-dashboard"></i> Halaman Utama</a></li>
        <li><a href="#">Lahir</a></li>
        <li class="active">Daftar Lahir</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        
        <!-- right column -->
        <div class="col-md-1"></div>
        <div class="col-md-8">
          <!-- Horizontal Form -->
          
          <!-- /.box -->
          <!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Monitoring Lahir</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                
                <h5><b>No Transaksi/No NIK Ibu</b></h5>
                <div class="col-xs-12 padding0">
                <div class="form-group col-xs-9 padding0">
                  <input type="text" class="form-control" placeholder="Masukkan no transaksi/NIK ibu" >
                </div>
                <div class="col-xs-3">
                  <button type="button" class="btn btn-block btn-success btn-sm marginbot15">Cek</button>
                </div>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
 --}}