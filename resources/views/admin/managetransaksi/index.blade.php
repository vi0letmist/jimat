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
  <h1>Manajemen Transaksi</h1>
  <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manajemen Transaksi</li>
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
			<br/>
			<table id="table_transaksi" class="table table-bordered table-hover">
				<thead>
					<tr>
						<th style="text-align:center">ID Order</th>
						<th style="text-align:center">ID Kios Pengorder</th>
                        <th style="text-align:center">Subtotal Harga Beli</th>
						<th style="text-align:center">SubTotal Harga</th>
                        <th style="text-align:center">Status</th>
						<th style="text-align:center">Tanggal</th>
						<th style="text-align:center">Opsi</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($transaksi as $key)
						<tr>
							<td style="text-align:center">{{ $key->id_order }}</td>
                            <td style="text-align:center">{{ $key->id_kios }}</td>
                            <td>{{ $key->subtotal_harga_beli }}</td>
                            <td>{{ $key->subtotal_harga }}</td>
							<td>{{ $key->status }}</td>
                            <td>{{ $key->tanggal }}</td>

							<td style="text-align:center">
								<a class="btn btn-info" href="{{ route('manajemen-transaksi.show',$key->id_order) }}">Detail</a>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table></div>
			{!! $transaksi->render() !!}
		</div>
	</div>
</div>
@endsection