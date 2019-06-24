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
			<div class="col-lg-12 margin-tb">
				<div class="pull-left mb-1">
					<a class="btn btn-success" href="{{ route('uploads.index') }}"> Back</a>
				</div>
				<div class="pull-right mb-1">
					<a class="btn btn-primary" href="{{ route('uploads.edit',$upload->id) }}">Edit</a>
				</div>
			</div>
			<br/>
			<br/>
			<h1>Detail</h1>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<img width="300" src="{{ URL::to('/uploads/' . $upload->image) }}" alt="{{ $upload->name }}" />
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Name :</strong>
				{{ $upload->name }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Price :</strong>
					{{ $upload->price }}
					<strong> Per </strong>
					{{ $upload->unit }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection