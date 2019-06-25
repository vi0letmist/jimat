@extends('layouts.app')

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

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Edit Description</h1>
			@if (count($errors) > 0)
			<div class="alert alert-danger">
				<strong>Sorry!</strong> Something wrong with your input data.<br><br>
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{!! Form::model($barang, ['method' => 'PATCH','route' => ['manajemen-produk.update', $barang->id_produkkoperasi]]) !!}
			<div class="row">
			    <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>ID Produk Koperasi</strong>
						{!! Form::text('id_produkkoperasi', null, array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nama Produk</strong>
						{!! Form::text('nama_produk', null, array('class' => 'form-control')) !!}
            		</div>
				</div>
                <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>ID Kategori</strong>
						{!! Form::text('id_kategori', null, array('class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 text-center">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection