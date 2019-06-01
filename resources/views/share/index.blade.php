@extends('layout.main')

@section('title', 'Share - index')


@section('content')
			<!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                File Saya
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="asu">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th>Pemilik</th>
                                                <th>File</th>
                                                <th>Shared</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th>Pemilik</th>
                                                <th>File</th>
                                                <th>Shared</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($log as $l)
                                        	<tr>
                                        		<td class="text-center">{{$c++}}</td>
                                                <td>{{$l->owner[0]->email}} </td>
                                                <td>{{$l->file[0]->filename}}</td>
                                                <td>{{$l->shared[0]->email}}</td>
                                        		<td class="text-center" ">
                                                    <a href="{{URL::to('/')}}" class="btn btn-success waves-effect">Download</a> 
                                                    <a href="#" class="btn btn-primary waves-effect">Bagikan</a> 
                                                </td>
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
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#asu').DataTable({
                "autoWidth": true,
                "ordering": true,
            });
        });
    </script>
@stop