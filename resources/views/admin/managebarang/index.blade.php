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
				
					<div class="pull-left mb-1">
						<div class="input-group-btn">
                  			<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Kategori
                    			<span class="fa fa-caret-down"></span></button>
                  			<ul class="dropdown-menu">
                    			<li><a href="#">Sembako</a></li>
                    			<li><a href="#">Minuman</a></li>
								<li><a href="#">Makanan</a></li>
								<li><a href="#">Alat Mandi dan Cucu</a></li>
								<li><a href="#">Gas</a></li>
								<li><a href="#">Galon</a></li>
                  			</ul>
						</div>
					</div>
					<div class="pull-right mb-1">
						<a class="btn btn-success" href="{{ route('manajemen-produk.create') }}"> Tambah</a>
					</div>
				</div>
			</div>
			<br/>
			<table id="table_produk" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th style="text-align:center">No.</th>
						<th style="text-align:center">Gambar</th>
						<th style="text-align:center">Nama</th>
						<th style="text-align:center">Opsi</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($barang as $key)
						<tr>
							<td style="text-align:center">{{ ++$i }}</td>
							<td><img width="100" src="{{ URL::to('/uploads/' . $key->gambar) }}" alt="{{ $key->nama_produk }}" /></td>
							<td>{{ $key->nama_produk }}</td>
							<td style="text-align:center">
								<a class="btn btn-info" href="{{ route('manajemen-produk.show',$key->id_produkkoperasi) }}">Detail</a>
								<a class="btn btn-primary" href="{{ route('manajemen-produk.edit',$key->id_produkkoperasi) }}">Edit</a>
								{!! Form::open(['method' => 'DELETE','route' =>	['manajemen-produk.destroy', $key->id_koperasi],'style'=>'display:inline']) !!}
								{!! Form::submit('Delete', ['class' => 'btn btndanger']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{{ $barang->links() }}
			{!! $barang->render() !!}
		</div>
	</div>
</div>
@endsection