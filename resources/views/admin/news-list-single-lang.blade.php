@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h2>Latest News Article</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-8">
            {{-- <h3 class="mb-3"><img style="height: 20px" src="{{ url('assets/img/flags/gb.svg') }}" alt=""> English</h3> --}}
        </div>
        <div class="col-12 col-lg-4 text-end">
            <a href="{{ url('admin/news/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Create News Article</a>
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
                    @foreach($news as $row)
                    <tr>
                        <td style="white-space: nowrap;">
                            @if ($row->is_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin News" href="{{ url('admin/news/unpin').'/'.$lang.'/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This News" href="{{ url('admin/news/pin').'/'.$lang.'/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
                            @endif
                            @if ($row->right_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin News" href="{{ url('admin/news/right-unpin').'/'.$lang.'/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This News" href="{{ url('admin/news/right-pin').'/'.$lang.'/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
                            @endif
                        </td>
                        <td>{{ $row->posting_time }}</td>
                        <td>{{ $row->title }}</td>
                        <td>{{ $row->posted_by }}</td>
                        <td>
                            @if ($row->visibility == 0)
                            <span class="badge bg-warning">Draft</span>
                            @else
                            <span class="badge bg-info">Published</span>
                            @endif
                        </td>
                        <td>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit News" href="{{ url('admin/news/edit').'/'.$lang.'/'.$row->id }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Delete News" href="{{ url('admin/news/delete').'/'.$row->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Preview Post" href="{{ url('news/preview').'/'.$lang.'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $news->links() }}
        </div>
    </div>
</div>
@endsection