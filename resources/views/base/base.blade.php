<!DOCTYPE html>
<html>
<head>
	<title>@yield ('title') </title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="{{URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('bower_components/Ionicons/css/ionicons.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('dist/css/AdminLTE.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('dist/css/skins/_all-skins.min.css')}}">
	<link rel="stylesheet" href="{{URL::asset('plugins/form.css')}}">
	<link rel="stylesheet" href="{{URL::asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

	<link rel="stylesheet" href="{{URL::asset('plugins/timepicker/bootstrap-timepicker.min.css')}}">

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">
	@yield('navbar')

	@yield('sidebar')

	@yield('content')

	@yield('footer')
	</div>
	<!-- jQuery 3 -->
	<script src="{{URL::asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="{{URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
	<!-- Select2 -->
	<script src="{{URL::asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
	<!-- InputMask -->
	<script src="{{URL::asset('plugins/input-mask/jquery.inputmask.js')}}"></script>
	<script src="{{URL::asset('plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
	<script src="{{URL::asset('plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
	<!-- date-range-picker -->
	<script src="{{URL::asset('bower_components/moment/min/moment.min.js')}}"></script>
	<script src="{{URL::asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
	<!-- bootstrap datepicker -->
	<script src="{{URL::asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
	<!-- bootstrap color picker -->
	<script src="{{URL::asset('bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
	<!-- bootstrap time picker -->
	<script src="{{URL::asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
	<!-- SlimScroll -->
	<script src="{{URL::asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<!-- iCheck 1.0.1 -->
	<script src="{{URL::asset('plugins/iCheck/icheck.min.js')}}"></script>
	<script src="{{URL::asset('bower_components/fastclick/lib/fastclick.js')}}"></script>
	<script src="{{URL::asset('dist/js/adminlte.min.js')}}"></script>
	<script src="{{URL::asset('dist/js/demo.js')}}"></script>
	@yield('custom_script')
</body>
</html>