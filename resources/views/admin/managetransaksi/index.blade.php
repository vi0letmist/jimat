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

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Transaksi</h1>
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
						<a class="btn btn-success" href="{{ route('manajemen-transaksi.create') }}"> Tambah</a>
					</div>
				</div>
			</div>
			<br/>
			<table id="table_transaksi" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>Total</th>
                        <th>Subtotal</th>
                        <th>Status</th>
                        <th>Tanggal</th>

					</tr>
				</thead>
				<tbody>
					@foreach ($transaksi as $key)
						<tr>
							<td>{{ ++$i }}</td>
                            <td>{{ $key->total }}</td>
                            <td>{{ $key->subtotal }}</td>
                            <td>{{ $key->status }}</td>
                            <td>{{ $key->tanggal }}</td>

							<td>
								
								<a class="btn btn-primary" href="{{ route('manajemen-transaksi.edit',$key->id_order) }}">Edit</a>
								{!! Form::open(['method' => 'DELETE','route' =>	['manajemen-transaksi.destroy', $key->id_order],'style'=>'display:inline']) !!}
								{!! Form::submit('Delete', ['class' => 'btn btndanger']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{!! $transaksi->render() !!}
		</div>
	</div>
</div>
@endsection