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
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th>Pemilik</th>
                                                <th>File</th>
                                                <th>Shared</th>
                                                <th>Status</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($log as $l)
                                        	<tr>
                                        		<td class="text-center">{{$c++}}</td>
                                                <td>{{$l->owner[0]->email}} </td>
                                                <td>{{$l->file[0]->filename}}</td>
                                                <td>{{$l->shared[0]->email}}</td>
                                        		<td>
                                                    @if($l->file[0]->modif) Modified
                                                    @elseif($l->file[0]->delete) Deleted
                                                    @else Available @endif
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

