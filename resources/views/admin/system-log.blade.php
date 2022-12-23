@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <h3 class="mb-3">News List</h3>
    <div class="row">
        <div class="col-12">
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Username</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($log as $row)
                    <tr>
                        <td>{{ $row->action_time }}</td>
                        <td>{{ $row->username }}</td>
                        <td>{{ $row->action }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $log->links() }}
        </div>
    </div>
</div>
@endsection