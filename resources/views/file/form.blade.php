@extends('layout.main')

@section('title', 'cobacobagan')

@section('content-title', 'ini title dude')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Upload New File</div>
                <div class="panel-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('upload') }}" method="post" enctype="multipart/form-data">
                        {{ method_field('post') }}
                        {{ csrf_field() }}
                        <div class="form-group {{ !$errors->has('file') ?: 'has-error' }}">
                            <label>File</label>
                            <input type="file" name="file">
                            <span class="help-block text-danger">{{ $errors->first('file') }}</span>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <input type="checkbox" name="vehicle" value="1" class="action-select"> I have a car<br>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop