<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="{{ asset('AdminLTE/bower_components/bootstrap/dist/css/
	bootstrap.min.css') }}">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<h1>Upload and Download Image & File</h1>
				@if ($message = Session::get('success'))
					<div class="alert alert-success">
						<p>{{ $message }}</p>
					</div>
				@endif
				<div class="row">
					<div class="col-lg-12 margin-tb">
						<div class="pull-right mb-1">
							<a class="btn btn-success"
							href="{{ route('upload.create') }}"> Upload</a>
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
								<td><a class="btn btn-success" href="{{ URL::to('/uploads/' . $upload->file) }}" target="_blank"> PESAN</a></td>
							</tr>
						@endforeach
					</tbody>
				</table>
				{!! $uploads->render() !!}
			</div>
		</div>
	</div>
</body>
</html>