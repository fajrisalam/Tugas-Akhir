@extends('layout.main')

@section('title', 'My Files')


@section('content')
			<!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                File Saya
                            </h2>

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
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
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="asu">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Filename</th>
                                                <th class="text-center">Jenis File</th>
                                                <th class="text-center">Size KB</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Filename</th>
                                                <th class="text-center">Jenis File</th>
                                                <th class="text-center">Size KB</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($files as $file)
                                            <tr>
                                                <td class="text-center">{{$c++}}</td>
                                                <td>{{$file->filename}}</td>
                                                <td>{{$file->format}}</td>
                                                <td style="text-align:right;">{{$file->size/1000}}</td>
                                                <td style="text-align:right;">{{$file->created_at}}</td>
                                                <td class="text-center">
                                                    <a href="{{URL::to('/files/'.$file->id)}}" class="btn btn-success waves-effect">Download</a> 
                                                    <a href="{{URL::to('/share/form/'.$file->id)}}" class="btn btn-primary waves-effect">Bagikan</a> 
                                                    <a href="{{URL::to('/files/delete/'.$file->id)}}" class="btn btn-danger waves-effect">Delete</a> 
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
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                File Dibagikan ke Saya
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <div class="col-md-12">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Owner</th>
                                                <th class="text-center">Filename</th>
                                                <th class="text-center">Jenis File</th>
                                                <th class="text-center">Size KB</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th class="text-center">No.</th>
                                                <th class="text-center">Owner</th>
                                                <th class="text-center">Filename</th>
                                                <th class="text-center">Jenis File</th>
                                                <th class="text-center">Size KB</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        @foreach($share as $s)
                                        @if($s->file[0]->delete || $s->file[0]->modif) <?php continue;?> @endif
                                            <tr>
                                                <td class="text-center">{{$d++}}</td>
                                                <td> {{$s->owner[0]->email}} </td>
                                                <td> {{$s->file[0]->filename}} </td>
                                                <td> {{$s->file[0]->format}} </td>
                                                <td> {{$s->file[0]->size}} </td>
                                                <td>
                                                    <a href="#" class="btn btn-success">Download</a>
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

