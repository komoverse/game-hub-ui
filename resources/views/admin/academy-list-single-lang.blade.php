@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h2>Latest Academy Article</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-8">
            {{-- <h3 class="mb-3"><img style="height: 20px" src="{{ url('assets/img/flags/gb.svg') }}" alt=""> English</h3> --}}
        </div>
        <div class="col-12 col-lg-4 text-end">
            <a href="{{ url('admin/academy/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Create Academy Article</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>Pin</th>
                        <th>Posted Time</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Visibility</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($academy as $row)
                    <tr>
                        <td>
                            @if ($row->is_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin Academy" href="{{ url('admin/academy/unpin').'/'.$lang.'/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This Academy" href="{{ url('admin/academy/pin').'/'.$lang.'/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
                            @endif
                        </td>
                        <td>{{ $row->posting_time }}</td>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->posted_by }}</td>
                        <td>
                            @if ($row->visibility == 0)
                            <span class="badge badge-error">Draft</span>
                            @else
                            <span class="badge badge-success">Published</span>
                            @endif
                        </td>
                        <td>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Academy" href="{{ url('admin/academy/edit').'/'.$lang.'/'.$row->id }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Academy" href="{{ url('admin/academy/delete').'/'.$lang.'/'.$row->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Preview Post" href="{{ url('academy/preview').'/'.$lang.'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $academy->links() }}
        </div>
    </div>
</div>
@endsection