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
  <ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="#">Manejemen Produk</a></li>
        <li class="active">Manajemen Stock</li>
      </ol>
</section>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-9 col-md-offset-2">
		<div class="box">
            <div class="box-header">
			</div>
			<div class="box-body">
			@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
			{!! Form::open(array('route' => 'manajemen-stok.store','method'=>'POST', 'files'=>true)) !!}
            <div class="row">
				<div class="col-lg-3">
					<div class="form-group">
						<strong>QTY :</strong>
						{!! Form::text('stok', null, array('placeholder' => 'Stok','class' => 'form-control')) !!}
					</div>
                </div>
				<div class="col-lg-4">
					<div class="form-group">
						<strong>ID BARCODE :</strong>
						{!! Form::text('id_stockkoperasi', null, array('placeholder' => 'ID BARCODEx','class' => 'form-control')) !!}
					</div>
                </div>
				<div class="col-xs-12 col-sm-12 col-md-12 text-center">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
			{!! Form::close() !!}
			<br/>
			<table id="table_produk" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align:center">ID Barang</th>
						<th style="text-align:center">Gambar</th>
						<th style="text-align:center">Nama</th>
						<th style="text-align:center">Merk</th>
						<th style="text-align:center">Stok</th>
						<th style="text-align:center">Opsi</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($stok as $key)
						<tr>
							<td style="text-align:center">{{ $key->id_stockkoperasi }}</td>
							<td><img width="100" src="{{ URL::to('/uploads/' . $key->gambar) }}" alt="{{ $key->nama_produk }}" /></td>
							<td>{{ $key->nama_produk }}</td>
							<td>{{ $key->merk }}</td>
							<td>{{ $key->stok }}</td>
							<td style="text-align:center">
								<a class="btn btn-info" href="{{ route('manajemen-produk.show',$key->id_stockkoperasi) }}">Detail</a>
								<a class="btn btn-primary" href="{{ route('manajemen-stok.edit',$key->id_stockkoperasi) }}">Edit</a>
								{!! Form::open(['method' => 'DELETE','route' =>	['manajemen-stok.destroy', $key->id_stockkoperasi],'style'=>'display:inline']) !!}
								{!! Form::submit('Delete', ['class' => 'btn btndanger']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table></div>
			{!! $stok->render() !!}
		</div>
	</div>
</div>
@endsection