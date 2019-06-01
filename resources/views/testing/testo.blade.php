@extends('layout.main')

@section('title', 'Home')

@section('content')

            <!-- Hover Zoom Effect -->
            <div class="block-header">
                <h2></h2>
            </div>
            <div class="row clearfix">
            @if(Auth::user()->id == 1)
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-pink">
                            <i class="material-icons">people</i>
                        </div>
                        <div class="content">
                            <div class="text">Users</div>
                            <div class="number">{{$share}}</div>
                        </div>
                    </div>
                </div>
	        @endif
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <a class="info-box hover-zoom-effect" href="{{route('myfile')}}">
                        <div class="icon bg-blue">
                            <i class="material-icons">insert_drive_file</i>
                        </div>
                        <div class="content">
                            <div class="text">Files</div>
                            <div class="number">{{$file}}</div>
                        </div>
                    </a>
                </div>
            @if(Auth::user()->id == 1)
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-light-blue">
                            <i class="material-icons">event_note</i>
                        </div>
                        <div class="content">
                            <div class="text">Logs</div>
                            <div class="number">{{$log}}</div>
                        </div>
                    </div>
                </div>
            @endif
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-cyan">
                            <i class="material-icons">note_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Shared File</div>
                            <div class="number">{{$share}}</div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- #END# Hover Zoom Effect -->

@stop