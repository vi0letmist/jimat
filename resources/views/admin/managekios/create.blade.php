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

@section('header')
<section class="content-header">
  <h1>Manajemen Kios</h1>
</section>
@endsection

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h1>Create Image</h1>
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

			{!! Form::open(array('route' => 'manajemen-kios.store','method'=>'POST', 'files'=>true)) !!}
			<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>ID Kios :</strong>
						{!! Form::text('id_kios', null, array('placeholder' => 'ID Kios','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nama Kios :</strong>
						{!! Form::text('nama_kios', null, array('placeholder' => 'Nama Kios','class' => 'form-control')) !!}
					</div>
				</div>
                <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Nama Pemilik :</strong>
						{!! Form::text('nama_pemilik', null, array('placeholder' => 'Nama Pemilik','class' => 'form-control')) !!}
					</div>
				</div>
                <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Email :</strong>
						{!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
					</div>
				</div>
                <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Password :</strong>
						{!! Form::password('password', null, array('placeholder' => 'Password','class' => 'form-control')) !!}
					</div>
				</div>
                <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>No HP :</strong>
						{!! Form::text('no_hp', null, array('placeholder' => 'No HP','class' => 'form-control')) !!}
					</div>
				</div>
                <div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Alamat :</strong>
						{!! Form::text('alamat', null, array('placeholder' => 'Alamat','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Status Buka :</strong>
						{!! Form::text('status_buka', null, array('placeholder' => 'Status Buka','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12" style="width: 100%; height: 500px;">
					
						{!! Mapper::render() !!}
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Longitude :</strong>
						{!! Form::text('longitude', null, array('placeholder' => 'Longitude','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Latitude :</strong>
						{!! Form::text('latitude', null, array('placeholder' => 'Latitude','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>Rating :</strong>
						{!! Form::text('rating', null, array('placeholder' => 'Rating','class' => 'form-control')) !!}
					</div>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12">
					<div class="form-group">
						<strong>ID Admin :</strong>
						{!! Form::text('id_admin', null, array('placeholder' => 'ID Admin','class' => 'form-control')) !!}
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