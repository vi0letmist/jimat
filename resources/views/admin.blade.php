@extends('layouts.master')

@section('logout')
<a href="{{ route('admin.logout') }}"
    onclick="event.preventDefault();
             document.getElementById('logout-form').submit();"
    class="btn btn-default btn-flat">
    Logout
</a>

<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@endsection

@section('content')
<!-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADMIN Dashboard</div>
                <div class="content">
                    <div class="links">
                        <a href="/admin/manageadmins">Manage Admins</a>
                        <a href="/admin/uploads">Uploads</a>
                        <a href="/admin/kategori">Kategori</a>
                        <a href="/orders">Orders</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection
