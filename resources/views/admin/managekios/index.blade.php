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
  <h1>Manajemen Kios</h1>
  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manajemen Kios</li>
      </ol>
</section>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
		<div class="box">
            <div class="box-header">
			</div>
			<div class="box-body">
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
						<a class="btn btn-success" href="{{ route('manajemen-kios.create') }}"> Tambah</a>
					</div>
				</div>
			</div>
			<br/>
			<table id="table_kios" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align:center">No.</th>
						<th style="text-align:center">Nama Kios</th>
                        <th style="text-align:center">Nama Pemilik</th>
                        <th style="text-align:center">Email</th>
						<th style="text-align:center">Password</th>
                        <th style="text-align:center">No HP</th>
                        <th style="text-align:center">Alamat</th>
                        <th style="text-align:center">Status Buka</th>
						<th style="text-align:center">Longitude</th>
						<th style="text-align:center">Latitude</th>
						<th style="text-align:center">Opsi</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($kios as $key)
						<tr>
							<td style="text-align:center">{{ ++$i }}</td>
							<td>{{ $key->nama_kios }}</td>
                            <td>{{ $key->nama_pemilik }}</td>
                            <td>{{ $key->email }}</td>
							<td>{{ $key->password }}</td>
                            <td>{{ $key->no_hp }}</td>
                            <td>{{ $key->alamat }}</td>
                            <td>{{ $key->status_buka }}</td>
							<td>{{ $key->longitude }}</td>
							<td>{{ $key->latitude }}</td>

							<td style="text-align:center">
								<a class="btn btn-info" href="{{ route('manajemen-kios.show', $key->id_kios) }}">Detail</a>
								<a class="btn btn-primary" href="{{ route('manajemen-kios.edit',$key->id_kios) }}">Edit</a>
								{!! Form::open(['method' => 'DELETE','route' =>	['manajemen-kios.destroy', $key->id_kios],'style'=>'display:inline']) !!}
								{!! Form::submit('Delete', ['class' => 'btn btndanger']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table></div>
			{!! $kios->render() !!}
		</div>
	</div>
</div>
@endsection