@extends('layouts.master')

@section('logout')
<a href="{{ route('admin.logout') }}"
	onclick="event.preventDefault();
	document.getElementById('logout-form').submit();">
	Logout
</a>
<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
	{{ csrf_field() }}
</form>
@endsection

@section('header')
<section class="content-header">
  <h1>Manajemen Kategori</h1>
</section>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Kategori</h1>
			@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
			<div class="row">
				<div class="col-lg-12 margin-tb">
					<!-- <div class="pull-left mb-1">
						<a class="btn btn-success" href="/admin"> Home</a>
					</div> -->
					<div class="pull-right mb-1">
						<a class="btn btn-success" href="{{ route('manajemen-kategori.create') }}"> Tambah</a>
					</div>
				</div>
			</div>
			<br/>
			<table id="table_kategori" class="table table-bordered table-striped">
				<thead>
					<tr >
						<th style="text-align:center">No.</th>
						<th style="text-align:center">Nama Kategori</th>
						<th style="text-align:center">Opsi</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($kategori as $key)
						<tr>
							<td style="text-align:center">{{ ++$i }}</td>
							<td>{{ $key->nama_kategori }}</td>
							<td style="text-align:center">
								<a class="btn btn-primary" href="{{ route('manajemen-kategori.edit',$key->id_kategori) }}">Edit</a>
								{!! Form::open(['method' => 'DELETE','route' =>	['manajemen-kategori.destroy', $key->id_kategori],'style'=>'display:inline']) !!}
								{!! Form::submit('Delete', ['class' => 'btn btndanger']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{!! $kategori->render() !!}
		</div>
	</div>
</div>
@endsection