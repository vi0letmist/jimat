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
  <h1>Manajemen Stok</h1>
</section>
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

			{!! Form::model($stok, ['method' => 'PATCH','route' => ['manajemen-stok.update', $stok->id_stockkoperasi]]) !!}
			<div class="row">
			    <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>ID Produk Koperasi</strong>
						{!! Form::text('id_stockkoperasi', null, array('class' => 'form-control clsfocus')) !!}
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
						<strong>Merk</strong>
						{!! Form::text('merk', null, array('class' => 'form-control')) !!}
            		</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Harga Koperasi</strong>
						{!! Form::text('harga_koperasi', null, array('class' => 'form-control')) !!}
            		</div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Stok</strong>
						{!! Form::text('stok', null, array('class' => 'form-control')) !!}
            		</div>
				</div>
                <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>ID Kategori</strong>
						{!! Form::text('id_kategori', null, array('class' => 'form-control')) !!}
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