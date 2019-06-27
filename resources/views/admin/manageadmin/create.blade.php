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
			<div class="pull-left mb-1">
				<a class="btn btn-success" href="{{route('manajemen-admin.index')}}"> Back</a>
			</div>
			<br/>
			<br/>
			<h1>Create Account</h1>
			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Sorry!</strong> Something wrong with your input data.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			{!! Form::open(array('route' => 'manajemen-admin.store','method'=>'POST')) !!}
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Name:</strong>
							{!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Email:</strong>
							{!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Password:</strong>
						{!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Confirm Password:</strong>
						{!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' =>
						'form-control')) !!}
					</div>
				</div>

				<div class="col-xs-12 col-sm-12 col-md-12 text-center">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection