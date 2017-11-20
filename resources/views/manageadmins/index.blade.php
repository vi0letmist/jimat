@extends('layouts.app')

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
			<h1>Manage Admins</h1>
			@if ($message = Session::get('success'))
			<div class="alert alert-success">
				<p>{{ $message }}</p>
			</div>
			@endif

			<div class="row">
				<div class="col-lg-12 margin-tb">
					<div class="pull-right mb-1">
						<a class="btn btn-success" href="{{route('manageadmins.create')}}"> Create Account</a>
					</div>
				</div>
			</div>
			<br/>
			<table id="table_admins" class="table table-bordered table-striped">
				<thead>
				<tr>
					<th>Number</th>
					<th>Name</th>
					<th>Email</th>
					<th width="280px">Action</th>
				</tr>
				</thead>
				<tbody>
					@foreach ($admins as $key => $admin)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $admin->name }}</td>
						<td>{{ $admin->email }}</td>
						<td>
						<a class="btn btn-info"
						href="{{ route('manageadmins.show',$admin->id) }}">Detail</a>
						<a class="btn btn-primary"
						href="{{ route('manageadmins.edit',$admin->id) }}">Edit</a>
						{!! Form::open(['method' => 'DELETE','route' =>
						['manageadmins.destroy', $admin->id],'style'=>'display:inline']) !!}
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