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
  <h1>Manajemen Admin</h1>
</section>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
			@endif

			<div class="row">
				<div class="col-lg-12 margin-tb">
					<div class="pull-right mb-1">
						<a class="btn btn-success" href="{{route('manajemen-admin.create')}}"> Tambah</a>
					</div>
				</div>
			</div>
			<br/>
			<table id="table_admins" class="table table-bordered table-striped">
				<thead>
				<tr>
					<th style="text-align:center">No.</th>
					<th style="text-align:center">Nama</th>
					<th style="text-align:center">Email</th>
					<th style="text-align:center">Opsi</th>
				</tr>
				</thead>
				<tbody>
					@foreach ($admins as $key => $admin)
					<tr>
						<td style="text-align:center">{{ ++$i }}</td>
						<td>{{ $admin->name }}</td>
						<td>{{ $admin->email }}</td>
						<td style="text-align:center">
						<a class="btn btn-info" href="{{ route('manajemen-admin.show',$admin->id) }}">Detail</a>
						<a class="btn btn-primary" href="{{ route('manajemen-admin.edit',$admin->id) }}">Edit</a>
						{!! Form::open(['method' => 'DELETE','route' => ['manajemen-admin.destroy', $admin->id],'style'=>'display:inline']) !!}
						{!! Form::submit('Delete', ['class' => 'btn btndanger']) !!}
						{!! Form::close() !!}
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{!! $admins->render() !!}
		</div>
	</div>
</div>
@endsection