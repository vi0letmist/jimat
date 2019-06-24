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
			<div class="pull-left mb-1">
				<a class="btn btn-success" href="{{route('manageadmins.index')}}"> Back</a>
			</div>
			<div class="pull-right mb-1">
				<a class="btn btn-primary"
						href="{{ route('manageadmins.edit',$admin->id) }}">Edit Account</a>
			</div>
			<br/>
			<br/>
			<h1>Account Detail</h1>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Name :</strong>
				{{ $admin->name }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Email :</strong>
					{{ $admin->email }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection