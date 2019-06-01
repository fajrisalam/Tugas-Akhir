@extends('layout.main')

@section('title', 'Share - index')


@section('content')
<div class="header" style="margin-top: -40px;">
    <ol class="breadcrumb breadcrumb-col-pink">
        <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
        <li class="active"><i class="material-icons">library_books</i> Library</li>
    </ol>
</div>
			<!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 col-lg-offset-2 col-md-offset-2 col-sm-offset-2 col-xs-offset-2">
                    <div class="card">
                        <div class="header">
                            <h2>Bagikan File</h2>
                        </div>

                        @if(session('success'))
                        <div class="alert alert-danger">
                            {{ session('success') }}
                        </div>
                        @endif

                        <div class="body">
                        {!! Form::open(['action' => 'SharingController@update_share', 'id'=>'form_validation', 'method'=>'POST','class'=>'form-horizontal']) !!}
                            <h2 class="card-inside-title">Basic Examples</h2>
                            <div class="row clearfix">
                                <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 form-label" style="text-align: left;margin-top:8px;">
                                {{Form::label('j_privasi','Jenis Privasi')}}
                                </div>
                                <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                        {{Form::select('privasi', [0 => 'Privasi', '1' => 'Publik'], $file->privasi, ['class' => 'form-control show-tick', 'required', 'onclick' => 'public()', 'id' => 'pubs'] ) }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 form-label" >
                                    {!! Form::label('share', 'Bagikan') !!}
                                    <!-- <input type="checkbox" name="halo"> -->
                                </div>
                                <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6" >
                                    <!-- {!! Form::checkbox('shared', '1', false, ['class' => 'chk-col-purple']) !!} -->
                                    <input type="checkbox" name="check" id="cek" class="chk-col-pink filled-in action-select" value="1" onclick="myFunction()">
                                    <label for="cek">&nbsp;</label>
 
                                </div>
                            </div>
                            
                            <div class="row clearfix" id="email" style="display: none;">
                            <div class="col-md-3 col-xs-3 col-sm-3 col-lg-3 form-label" style="text-align: left;margin-top:8px;">
                                {{Form::label('email','Email')}}
                            </div>
                            <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6 m-t-5">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="email" class="form-control" id="em" placeholder="Email" name="email">
                                        <input type="hidden" name="file" value="{{$file->id}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-md-offset-3 col-xs-offset-3 col-sm-offset-3 col-lg-offset-3">
                                {!! Form::submit('Kirim',['class'=>'btn btn-success m-t-15 waves-effect']) !!}
                            </div>
                        </div>
                    {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->

@stop


@section('moreJS')
<script>
function myFunction() {
  var checkBox = document.getElementById("cek");
  var text = document.getElementById("email");
  var em = document.getElementById("em");

  if (checkBox.checked == true){
    text.style.display = "block";
    em.required = true;
  } else {
    text.style.display = "none";
    em.required = false;
  }
}
</script>
<script>
    function public(){
        var pub = document.getElementById("pubs");
        var text = document.getElementById("email");
        var em = document.getElementById("em");
        if(pubs.value){
            text.style.display = "none";
            em.required = false;
        } else{
            text.style.display = "block";
            em.required = true;
        }
    }
</script>
@stop