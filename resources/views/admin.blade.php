@extends('layouts.app')

@section('logout')
<a href="{{ route('user.logout') }}"
    onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
    Logout
</a>

<form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADMIN Dashboard</div>
                <div class="content">
                    <div class="links">
                        <a href="/admin/manageadmins">Manage Admins</a>
                        <a href="/admin/uploads">Upload</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
