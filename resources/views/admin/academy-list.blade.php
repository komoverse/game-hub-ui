@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h2>Latest 5 Academy Article</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-8">
            <h3 class="mb-3"><img style="height: 20px" src="{{ url('assets/img/flags/gb.svg') }}" alt=""> English</h3>
        </div>
        <div class="col-12 col-lg-4 text-end">
            <a href="{{ url('admin/academy/list/en') }}" class="btn btn-success">Show All English Academy</a>
            {{-- <a href="{{ url('admin/academy/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Create Academy Article</a> --}}
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
                    @foreach($academy_en as $row)
                    <tr>
                        <td>
                            @if ($row->is_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin Academy" href="{{ url('admin/academy/unpin').'/en/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This Academy" href="{{ url('admin/academy/pin').'/en/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
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
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Academy" href="{{ url('admin/academy/edit').'/en/'.$row->id }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Academy" href="{{ url('admin/academy/delete').'/en/'.$row->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            @if ($row->visibility == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="View Post" href="{{ url('academy').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Preview Post" href="{{ url('academy/preview').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
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
            <a href="{{ url('admin/academy/list/id') }}" class="btn btn-success">Show All Indonesian Academy</a>
            {{-- <a href="{{ url('admin/academy/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Create Academy Article</a> --}}
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
                    @foreach($academy_id as $row)
                    <tr>
                        <td>
                            @if ($row->is_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin Academy" href="{{ url('admin/academy/unpin').'/id/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This Academy" href="{{ url('admin/academy/pin').'/id/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
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
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Academy" href="{{ url('admin/academy/edit').'/id/'.$row->id }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Academy" href="{{ url('admin/academy/delete').'/id/'.$row->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            @if ($row->visibility == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="View Post" href="{{ url('id/academy').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Preview Post" href="{{ url('id/academy/preview').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
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
            <a href="{{ url('admin/academy/list/zh') }}" class="btn btn-success">Show All Chinese Academy</a>
            {{-- <a href="{{ url('admin/academy/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Create Academy Article</a> --}}
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
                    @foreach($academy_zh as $row)
                    <tr>
                        <td>
                            @if ($row->is_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin Academy" href="{{ url('admin/academy/unpin').'/zh/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This Academy" href="{{ url('admin/academy/pin').'/zh/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
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
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Academy" href="{{ url('admin/academy/edit').'/zh/'.$row->id }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Academy" href="{{ url('admin/academy/delete').'/zh/'.$row->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            @if ($row->visibility == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="View Post" href="{{ url('zh/academy').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Preview Post" href="{{ url('zh/academy/preview').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
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
            <h3 class="mb-3"><img style="height: 20px" src="{{ url('assets/img/flags/in.svg') }}" alt=""> Urdu / Hindi</h3>
        </div>
        <div class="col-12 col-lg-4 text-end">
            <a href="{{ url('admin/academy/list/ur') }}" class="btn btn-success">Show All Urdu / Hindi Academy</a>
            {{-- <a href="{{ url('admin/academy/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Create Academy Article</a> --}}
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
                    @foreach($academy_ur as $row)
                    <tr>
                        <td>
                            @if ($row->is_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin Academy" href="{{ url('admin/academy/unpin').'/ur/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This Academy" href="{{ url('admin/academy/pin').'/ur/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
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
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Academy" href="{{ url('admin/academy/edit').'/ur/'.$row->id }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Academy" href="{{ url('admin/academy/delete').'/ur/'.$row->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            @if ($row->visibility == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="View Post" href="{{ url('ur/academy').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Preview Post" href="{{ url('ur/academy/preview').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
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