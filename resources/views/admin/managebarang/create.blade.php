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
  <h1>Manajemen Produk</h1>
</section>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Tambah barang</h1>
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

			{!! Form::open(array('route' => 'manajemen-produk.store','method'=>'POST', 'files'=>true)) !!}
			<div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>ID Produk Koperasi :</strong>
						{!! Form::text('id_produkkoperasi', null, array('placeholder' => 'ID Produk Koperasi','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nama Produk :</strong>
						{!! Form::text('nama_produk', null, array('placeholder' => 'Nama Produk','class' => 'form-control')) !!}
					</div>
				</div>
                <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>ID Kategori :</strong>
						{!! Form::text('id_kategori', null, array('placeholder' => 'ID Kategori','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Gambar :</strong>
						{!! Form::file('gambar', null, array('class' => 'custom-file-control')) !!}
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