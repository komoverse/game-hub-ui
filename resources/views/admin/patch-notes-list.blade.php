@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h2>Latest Patch Notes</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-8">
            {{-- <h3 class="mb-3"><img style="height: 20px" src="{{ url('assets/img/flags/gb.svg') }}" alt=""> English</h3> --}}
        </div>
        <div class="col-12 col-lg-4 text-end">
            <a href="{{ url('admin/patch-notes/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Create Patch Notes Article</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Posted Time</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Visibility</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($patch_notes as $row)
                    <tr>
                        <td>{{ $row->posted_time }}</td>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->posted_by }}</td>
                        <td>
                            @if ($row->visibility == 0)
                            <span class="badge bg-warning">Draft</span>
                            @else
                            <span class="badge bg-info">Published</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $patch_notes->links() }}
        </div>
    </div>
</div>
@endsection