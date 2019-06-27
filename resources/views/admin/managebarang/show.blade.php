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
			<div class="col-lg-12 margin-tb">
				<div class="pull-left mb-1">
					<a class="btn btn-success" href="{{ route('manajemen-produk.index') }}"> Back</a>
				</div>
				<div class="pull-right mb-1">
					<a class="btn btn-primary" href="{{ route('manajemen-produk.edit',$barang->id_produkkoperasi) }}">Edit</a>
				</div>
			</div>
			<br/>
			<br/>
			<h1>Detail</h1>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<img width="300" src="{{ URL::to('/uploads//' . $barang->gambar) }}" alt="{{ $barang->nama_produk }}" />
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Name :</strong>
				{{ $barang->nama_produk }}
				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection