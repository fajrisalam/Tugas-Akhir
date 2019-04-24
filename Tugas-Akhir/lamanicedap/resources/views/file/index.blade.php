@extends('layout.main')

@section('tittle')
Index File
@endsection

@section('breadcrumb')
<li>File</li>
<li class="active">Index</li>
@endsection

@section('content')
	<h1 class="text-center">Tabel File</h1>
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>User</th>
					<th>Tittle</th>
					<th>Path</th>
					<th>Download</th>
				</tr>
			</thead>
			<tbody>
				@foreach($files as $f)
				<tr>
					<td>{{$c++}}</td>
					<td>{{$f->user_id}}</td>
					<td>{{$f->title}}</td>
					<td>{{$f->path}}</td>
					<td><a href="{{$f->path}}">Download</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection

