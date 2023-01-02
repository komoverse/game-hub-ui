@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h2>Latest 5 News Article</h2>
            <a href="{{ url('admin/news/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Create News Article</a>

        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-lg-8">
            <h3 class="mb-3"><img style="height: 20px" src="{{ url('assets/img/flags/gb.svg') }}" alt=""> English</h3>
        </div>
        <div class="col-12 col-lg-4 text-end">
            <a href="{{ url('admin/news/list/en') }}" class="btn btn-success">Show All English News</a>
            {{-- <a href="{{ url('admin/news/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Create News Article</a> --}}
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
                    @foreach($news_en as $row)
                    <tr>
                        <td style="white-space:nowrap">
                            @if ($row->is_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin News" href="{{ url('admin/news/unpin').'/en/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This News" href="{{ url('admin/news/pin').'/en/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
                            @endif
                            @if ($row->right_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin News" href="{{ url('admin/news/right-unpin').'/en/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This News" href="{{ url('admin/news/right-pin').'/en/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
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
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit News" href="{{ url('admin/news/edit').'/en/'.$row->id }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Delete News" href="{{ url('admin/news/delete').'/en/'.$row->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            @if ($row->visibility == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="View Post" href="{{ url('news').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Preview Post" href="{{ url('news/preview').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="container-fluid p-0">
    <div class="row mt-2">
        <div class="col-12 col-lg-8">
            <h3 class="mb-3"><img style="height: 20px" src="{{ url('assets/img/flags/id.svg') }}" alt=""> Indonesian / Bahasa</h3>
        </div>
        <div class="col-12 col-lg-4 text-end">
            <a href="{{ url('admin/news/list/id') }}" class="btn btn-success">Show All Indonesian News</a>
            {{-- <a href="{{ url('admin/news/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Create News Article</a> --}}
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
                    @foreach($news_id as $row)
                    <tr>
                        <td style="white-space:nowrap">
                            @if ($row->is_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin News" href="{{ url('admin/news/unpin').'/id/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This News" href="{{ url('admin/news/pin').'/id/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
                            @endif
                            @if ($row->right_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin News" href="{{ url('admin/news/right-unpin').'/id/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This News" href="{{ url('admin/news/right-pin').'/id/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
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
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit News" href="{{ url('admin/news/edit').'/id/'.$row->id }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Delete News" href="{{ url('admin/news/delete').'/id/'.$row->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            @if ($row->visibility == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="View Post" href="{{ url('id/news').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Preview Post" href="{{ url('id/news/preview').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="container-fluid p-0">
    <div class="row mt-2">
        <div class="col-12 col-lg-8">
            <h3 class="mb-3"><img style="height: 20px" src="{{ url('assets/img/flags/cn.svg') }}" alt=""> Chinese / Mandarin</h3>
        </div>
        <div class="col-12 col-lg-4 text-end">
            <a href="{{ url('admin/news/list/zh') }}" class="btn btn-success">Show All Chinese News</a>
            {{-- <a href="{{ url('admin/news/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Create News Article</a> --}}
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
                    @foreach($news_zh as $row)
                    <tr>
                        <td style="white-space:nowrap">
                            @if ($row->is_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin News" href="{{ url('admin/news/unpin').'/zh/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This News" href="{{ url('admin/news/pin').'/zh/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
                            @endif
                            @if ($row->right_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin News" href="{{ url('admin/news/right-unpin').'/zh/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This News" href="{{ url('admin/news/right-pin').'/zh/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
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
                        <td>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit News" href="{{ url('admin/news/edit').'/zh/'.$row->id }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Delete News" href="{{ url('admin/news/delete').'/zh/'.$row->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            @if ($row->visibility == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="View Post" href="{{ url('zh/news').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Preview Post" href="{{ url('zh/news/preview').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            @endif
                        </td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container-fluid p-0">
    <div class="row mt-2">
        <div class="col-12 col-lg-8">
            <h3 class="mb-3"><img style="height: 20px" src="{{ url('assets/img/flags/in.svg') }}" alt=""> Urdu / Hindi</h3>
        </div>
        <div class="col-12 col-lg-4 text-end">
            <a href="{{ url('admin/news/list/ur') }}" class="btn btn-success">Show All Urdu / Hindi News</a>
            {{-- <a href="{{ url('admin/news/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Create News Article</a> --}}
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
                    @foreach($news_ur as $row)
                    <tr>
                        <td style="white-space:nowrap">
                            @if ($row->is_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin News" href="{{ url('admin/news/unpin').'/ur/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This News" href="{{ url('admin/news/pin').'/ur/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
                            @endif
                            @if ($row->right_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin News" href="{{ url('admin/news/right-unpin').'/ur/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This News" href="{{ url('admin/news/right-pin').'/ur/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
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
                        <td>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit News" href="{{ url('admin/news/edit').'/ur/'.$row->id }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Delete News" href="{{ url('admin/news/delete').'/ur/'.$row->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            @if ($row->visibility == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="View Post" href="{{ url('ur/news').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Preview Post" href="{{ url('ur/news/preview').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            @endif
                        </td>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection