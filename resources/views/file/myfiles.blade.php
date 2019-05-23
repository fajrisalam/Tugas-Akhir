@extends('layout.main')

@section('title', 'My Files')

@section('content-title', 'My Files')
@section('content')
			<!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                File Saya
                            </h2>
                            <!-- <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul> -->
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Filename</th>
                                            <th>Format</th>
                                            <th>Size (B)</th>
                                            <th>Durasi (ms)</th>
                                            <th>Tanggal</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Filename</th>
                                            <th>Format</th>
                                            <th>Size (B)</th>
                                            <th>Durasi (ms)</th>
                                            <th>Tanggal</th>
                                            <th>Download</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($files as $file)
                                    	<tr>
                                    		<td>{{$c++}}</td>
                                    		<td>{{$file->filename}}</td>
                                    		<td>{{$file->format}}</td>
                                    		<td>{{$file->size}}</td>
                                    		<td>{{$file->duration}}</td>
                                    		<td>{{$file->created_at}}</td>
                                    		<td><a href="{{URL::to('/files/'.$file->id)}}">Download</a> </td>
                                    	</tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

@stop


@section('moreJS')
<!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

	<script src="{{asset('js/pages/tables/jquery-datatable.js')}}"></script>
@stop