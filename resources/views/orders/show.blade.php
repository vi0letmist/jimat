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
					<a class="btn btn-success" href="{{ route('orders.index') }}"> Back</a>
				</div>
				<div class="pull-right mb-1">
					{!! Form::open(['method' => 'DELETE','route' => ['orders.destroy', $order->id],'style'=>'display:inline']) !!}
	                {!! Form::submit('Delete', ['class' => 'btn btndanger']) !!}
	                {!! Form::close() !!}
                </div>
			</div>
			<br/>
			<br/>
			<h1>Detail</h1>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Name :</strong>
					{{ $order->name }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Phone :</strong>
					{{ $order->phone }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Address :</strong>
					{{ $order->address }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Fruit :</strong>
					{{ $order->fruit }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Quantity :</strong>
					{{ $order->quantity }}
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12">
				<div class="form-group">
					<strong>Create :</strong>
					{{ $order->created_at }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection