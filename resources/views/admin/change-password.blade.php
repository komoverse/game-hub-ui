@extends('admin.template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h3>Change Password</h3>
        </div>
    </div>
    <form action="{{ url('admin/change-password') }}" method="POST">
        @csrf
        <div class="row mb-2">
            <div class="col-12 col-lg-2">
                Current Password
            </div>
            <div class="col-12 col-lg-4">
                <input type="password" required="required" name="current_password" class="form-control">
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12 col-lg-2">
                New Password
            </div>
            <div class="col-12 col-lg-4">
                <input type="password" required="required" name="new_password" class="form-control">
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12 col-lg-2">
                Confirm New Password
            </div>
            <div class="col-12 col-lg-4">
                <input type="password" required="required" name="confirm_password" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-2">
            </div>
            <div class="col-12 col-lg-4">
                <p class="text-danger">WARNING!!! Password recovery outside administration panel is not available. If you forgot your new password, you need to contact backend developer to manually reset it.</p>
                <input type="submit" class="btn btn-success">
            </div>
        </div>
    </form>
</div>
@endsection