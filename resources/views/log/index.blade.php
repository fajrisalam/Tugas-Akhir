@extends('layout.main')

@section('title', 'My Files')

@section('moreCSS')
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/> -->
 

@stop
@section('content')
			<!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Log Aktivitas
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="asu">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">User</th>
                                                <th class="text-center">File</th>
                                                <th class="text-center">Size (KB)</th>
                                                <th class="text-center">Durasi (ms)</th>
                                                <th class="text-center">Aktivitas</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">User</th>
                                                <th class="text-center">File</th>
                                                <th class="text-center">Size (KB)</th>
                                                <th class="text-center">Durasi (ms)</th>
                                                <th class="text-center">Aktivitas</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($log as $l)
                                        	<tr>
                                        		<td class="text-center">{{$c++}}</td>
                                                <td>@if(!$l->user_id) System @else {{$l->user[0]->name}} @endif</td>
                                                <td>{{$l->file[0]->filename}}</td>
                                                <td style="text-align: right;">{{$l->file[0]->size/1000}}</td>
                                                <td>{{$l->duration}}</td>
                                                @if($l->execution == 1)
                                                    <td> Upload </td>
                                                @elseif($l->execution == 2)
                                                    <td>Download</td>
                                                @elseif($l->execution == 3)
                                                    <td>Delete</td>
                                                @endif
                                        	</tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

@stop


@section('moreJS')
<!-- Jquery DataTable Plugin Js -->
    <!-- <script src="{{asset('plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>

	<script src="{{asset('js/pages/tables/jquery-datatable.js')}}"></script>-->
    <!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#asu').DataTable({
                "autoWidth": true,
                "ordering": true,
            });
        });
    </script> -->
@stop