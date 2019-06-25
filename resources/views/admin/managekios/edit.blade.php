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
			<h1>Edit Description</h1>
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

			{!! Form::model($kios, ['method' => 'PATCH','route' => ['manajemen-kios.update', $kios->id_kios]]) !!}
			<div class="row">
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
				<div class="col-xs-12 col-sm-12 col-md-12 text-center">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection