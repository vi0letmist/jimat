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
                </div>
            </div>
            <br/>
            <table id="table_uploads" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <!-- <th>Number</th> -->
                        <th>Name</th>
                        <th>Fruit</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $order)
                        <tr>
                            <!-- <td>{{ ++$i }}</td> -->
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->fruit }}</td>
                            <td>{{ $order->quantity }}</td>


                            <td>
                                <a class="btn btn-info" href="{{ route('orders.show',$order->id) }}">Detail</a>
                                {!! Form::open(['method' => 'DELETE','route' => ['orders.destroy', $order->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btndanger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $orders->render() !!}
        </div>
    </div>
</div>
@endsection