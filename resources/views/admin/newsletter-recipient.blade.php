@extends('admin.template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h3>Newsletter Recipient List</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recipient as $row)
                    <tr>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $recipient->links() }}
        </div>
    </div>
</div>
@endsection