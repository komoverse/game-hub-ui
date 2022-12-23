@extends('admin.template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h3>Newsletter Archive List</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th>Time</th>
                        <th>Author</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($newsletter as $row)
                    <tr>
                        <td>{{ $row->send_time }}</td>
                        <td>{{ $row->send_by }}</td>
                        <td>{{ $row->subject }}</td>
                        <td>{{ $row->message }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $newsletter->links() }}
        </div>
    </div>
</div>
@endsection