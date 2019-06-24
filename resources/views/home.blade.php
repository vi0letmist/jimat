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

            <!-- <br/>
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
                            <td>
                                <a class="btn btn-info" href="{{ route('show',$upload->id) }}">Detail</a>
                                <a class="btn btn-success" href="{{route('orders.create')}}">Order</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $uploads->render() !!} -->
        </div>
    </div>
</div>
@endsection