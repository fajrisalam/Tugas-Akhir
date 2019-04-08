@extends('layout.main')

@section('tittle')
LAMANICEDAP - FORM LAHIR
@endsection

@section('breadcrumb')
<li>Rumah Sakit</li>
<li class="active">Data Kelahiran</li>
@endsection

@section('content')
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
              <h3 class="box-title">Form Lahir</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
                <!-- text input -->
                <div class="form-group">
                  <label>NIK Ayah</label>
                  <input type="text" class="form-control" placeholder="Masukkan NIK Ayah">
                </div>

                <div class="form-group">
                  <label>Nama Ayah</label>
                  <input type="text" class="form-control" placeholder="Masukkan Nama Ayah">
                </div>

                <div class="form-group">
                  <label>NIK Ibu</label>
                  <input type="text" class="form-control" placeholder="Masukkan NIK Ibu">
                </div>

                <div class="form-group">
                  <label>Nama Ibu</label>
                  <input type="text" class="form-control" placeholder="Masukkan Nama Ibu">
                </div>

                <div class="form-group">
                  <label>Tanggal Lahir</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker">
                  </div>
                  <div class="bootstrap-timepicker">
                <div class="form-group">
                  <label>Waktu Lahir</label>

                  <div class="input-group">
                    <input type="text" class="form-control timepicker">

                    <div class="input-group-addon">
                      <i class="fa fa-clock-o"></i>
                    </div>
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- /.form group -->
              </div>
                  <!-- /.input group -->
                </div>
                <div class="form-group">
                  <label>Diberi nama</label>
                  <input type="text" class="form-control" placeholder="Nama Bayi">
                </div>
                <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select class="form-control">
                    <option>Laki Laki</option>
                    <option>Perempuan</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Dengan berat</label>
                  <input type="text" class="form-control" placeholder="Berat Bayi (gram)">
                </div>
                <div class="form-group">
                  <label>Dengan Panjang</label>
                  <input type="text" class="form-control" placeholder="Panjang Bayi (centimeter)">
                </div>
                <div class="form-group">
                  <label>Nama Dokter</label>
                  <input type="text" class="form-control" placeholder="Masukkan Nama Dokter Kandungan">
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
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
@endsection

@section('moreJS')
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Today'       : [moment(), moment()],
          'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month'  : [moment().startOf('month'), moment().endOf('month')],
          'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass   : 'iradio_minimal-red'
    })
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    //Timepicker
    $('.timepicker').timepicker({
      showInputs: false
    })
  })
</script>
@endsection{{-- 



<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>L</b>ND</span>
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
      sidebar menu: : style can be found in sidebar.less
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-edit"></i>
            <span>Daftarkan Kelahiran</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu ">
            <li class="active"><a href="../forms/form-rs.html"><i class="fa fa-circle-o"></i> Daftar Kelahiran</a></li>
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Rumah Sakit</a></li>
        <li class="active">Daftar Kelahiran</li>
      </ol>
    </section>

    <!-- Main content -->
    
    <!-- /.content -->
</div>

 --}}