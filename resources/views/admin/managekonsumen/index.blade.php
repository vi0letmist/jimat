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
			<h1>Konsumen</h1>
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
						<a class="btn btn-success" href="{{ route('manajemen-konsumen.create') }}"> Tambah</a>
					</div>
				</div>
			</div>
			<br/>
			<table id="table_konsumen" class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>

					</tr>
				</thead>
				<tbody>
					@foreach ($konsumen as $key)
						<tr>
							<td>{{ ++$i }}</td>
                            <td>{{ $key->nama }}</td>
                            <td>{{ $key->email }}</td>
                            <td>{{ $key->no_hp }}</td>

							<td>
								
								<a class="btn btn-primary" href="{{ route('manajemen-konsumen.edit',$key->id_konsumen) }}">Edit</a>
								{!! Form::open(['method' => 'DELETE','route' =>	['manajemen-konsumen.destroy', $key->id_konsumen],'style'=>'display:inline']) !!}
								{!! Form::submit('Delete', ['class' => 'btn btndanger']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{!! $konsumen->render() !!}
		</div>
	</div>
</div>
@endsection