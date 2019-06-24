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
			<h1>FRUITARIUM</h1>
			@if ($message = Session::get('success'))
				<div class="alert alert-success">
					<p>{{ $message }}</p>
				</div>
			@endif
			<div class="row">
				<div class="col-lg-12 margin-tb">
					<div class="pull-left mb-1">
						<a class="btn btn-success" href="/admin"> Home</a>
					</div>
					<div class="pull-right mb-1">
						<a class="btn btn-success"
						href="{{ route('uploads.create') }}"> Upload</a>
					</div>
				</div>
			</div>
			<br/>
			<table id="table_uploads" class="table table-bordered table-striped">
				<thead>
					<tr>
						<!-- <th>Number</th> -->
						<th>Image</th>
						<th>Name</th>
						<th>Price</th>
						<th>Unit</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($uploads as $key => $upload)
						<tr>
							<!-- <td>{{ ++$i }}</td> -->
							<td><img width="100" src="{{ URL::to('/uploads/' . $upload->image) }}" alt="{{ $upload->name }}" /></td>
							<td>{{ $upload->name }}</td>
							<td>{{ $upload->price }}</td>
							<td>{{ $upload->unit }}</td>
							<td>
								<a class="btn btn-info" href="{{ route('uploads.show',$upload->id) }}">Detail</a>
								<a class="btn btn-primary" href="{{ route('uploads.edit',$upload->id) }}">Edit</a>
								{!! Form::open(['method' => 'DELETE','route' =>	['uploads.destroy', $upload->id],'style'=>'display:inline']) !!}
								{!! Form::submit('Delete', ['class' => 'btn btndanger']) !!}
								{!! Form::close() !!}
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
			{!! $uploads->render() !!}
		</div>
	</div>
</div>
@endsection