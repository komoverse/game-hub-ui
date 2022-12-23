@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <div class="row mb-2">
        <div class="col-12">
            <h3>Add New Admin</h3>
        </div>
    </div>
    <form action="{{ url('admin/user-management/add') }}" method="POST">
        @csrf
        <div class="row mb-2">
            <div class="col-12 col-lg-2">Username</div>
            <div class="col-12 col-lg-3 position-relative">
                <input type="text" placeholder="Username" name="username" required="required" class="form-control">
                <i class="username-exist" style="display: none">Username Exist</i>
                <i class="username-available" style="display: none">Username Available</i>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12 col-lg-2">Full Name</div>
            <div class="col-12 col-lg-3">
                <input type="text" placeholder="Fullname" name="fullname" required="required" class="form-control">
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12 col-lg-2">Password</div>
            <div class="col-12 col-lg-3">
                <input type="password" placeholder="Password" name="password" required="required" class="form-control">
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12 col-lg-2">Access Level</div>
            <div class="col-12 col-lg-3">
                <select name="access_level" class="form-select">
                    <option value="manager">Manager</option>
                    <option value="editor">Editor</option>
                </select>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-12 col-lg-2"></div>
            <div class="col-12 col-lg-3">
                <button class="btn btn-success"><i class="fas fa-save"></i> &nbsp; Save</button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('script')
<script>
    $('input[name=username]').on('change paste keyup', function(){
        checkUsername();
    });

    function checkUsername() {
        var username = $('input[name=username]').val();
        $.ajax({
            url: '{{ url('api/check_username') }}/'+username,
            type: 'GET',
            dataType: 'html',
        })
        .done(function(result) {
            console.log(result);
            if (result == 'username exist') {
                $('input[name=username]').removeClass('border-success').addClass('border-danger');
                $('.username-available').hide();
                $('.username-exist').show();
            } else {
                $('input[name=username]').removeClass('border-danger').addClass('border-success');
                $('.username-exist').hide();
                $('.username-available').show();
            }
        });
        
    }
</script>
@endsection