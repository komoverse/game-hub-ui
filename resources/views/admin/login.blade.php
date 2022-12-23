@extends('admin.template')
@section('content')
<div class="container">
    <div class="row mt-5 pt-md-5">
        <div class="col"></div>
        <div class="col-3">
            <img src="{{ url('assets/img/admin-logo.webp') }}" alt="">
            <form action="{{ url('admin/login') }}" method="POST">
                @csrf
                Admin Username
                <input type="text" name="username" class="form-control mb-2">
                Password
                <input type="password" name="password" class="form-control mb-2">
                <button class="btn btn-success"><i class="fa-solid fa-sign-in"></i> &nbsp; Login</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection