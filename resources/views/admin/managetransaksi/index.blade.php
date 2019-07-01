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
</section>
@endsection

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Transaksi</h1>
			@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
			<br/>
			<table id="table_transaksi" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th style="text-align:center">No.</th>
						<th style="text-align:center">Total</th>
                        <th style="text-align:center">Subtotal</th>
                        <th style="text-align:center">Status</th>
						<th style="text-align:center">Tanggal</th>
						<th style="text-align:center">Opsi</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($transaksi as $key)
						<tr>
							<td style="text-align:center">{{ ++$i }}</td>
                            <td>{{ $key->total }}</td>
                            <td>{{ $key->subtotal }}</td>
                            <td>{{ $key->status }}</td>
                            <td>{{ $key->tanggal }}</td>

							<td style="text-align:center">
								<a class="btn btn-info" href="{{ route('manajemen-transaksi.show',$key->id_order) }}">Ddetail</a>
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