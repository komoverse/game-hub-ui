@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12 col-lg-8">
            <h3 class="mb-3">User List</h3>
        </div>
        <div class="col-12 col-lg-4 text-end">
            <a href="{{ url('admin/user-management/add') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Add New User</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Access Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $row)
                    <tr>
                        <td>{{ $row->username }}</td>
                        <td>{{ $row->fullname }}</td>
                        <td>{{ $row->access_level }}</td>
                        <td>
                            @if (Session::get('access_level') != 'editor')
                                @if ($row->access_level != 'superuser')
                                <a href="{{ url('admin/user-management/delete').'/'.$row->username }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                @endif
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection