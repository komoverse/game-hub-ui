@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h2>Latest 5 Partners Article</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-8">
            <h3 class="mb-3"><img style="height: 20px" src="{{ url('assets/img/flags/gb.svg') }}" alt=""> English</h3>
        </div>
        <div class="col-12 col-lg-4 text-end">
            <a href="{{ url('admin/partner/list/en') }}" class="btn btn-success">Show All English Partners</a>
            {{-- <a href="{{ url('admin/partner/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Create Partners Article</a> --}}
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
                    @foreach($partners_en as $row)
                    <tr>
                        <td>
                            @if ($row->is_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin Partners" href="{{ url('admin/partner/unpin').'/en/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This Partners" href="{{ url('admin/partner/pin').'/en/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
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
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Partner" href="{{ url('admin/partner/edit').'/en/'.$row->id }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Partners" href="{{ url('admin/partner/delete').'/en/'.$row->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            @if ($row->visibility == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="View Post" href="{{ url('partner').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Preview Post" href="{{ url('partner/preview').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
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
            <a href="{{ url('admin/partner/list/id') }}" class="btn btn-success">Show All Indonesian Partners</a>
            {{-- <a href="{{ url('admin/partner/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Create Partners Article</a> --}}
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
                    @foreach($partners_id as $row)
                    <tr>
                        <td>
                            @if ($row->is_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin Partners" href="{{ url('admin/partner/unpin').'/id/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This Partners" href="{{ url('admin/partner/pin').'/id/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
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
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Partner" href="{{ url('admin/partner/edit').'/id/'.$row->id }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Partners" href="{{ url('admin/partner/delete').'/id/'.$row->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="View Partners" href="{{ url('id/partners').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
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
            <a href="{{ url('admin/partner/list/zh') }}" class="btn btn-success">Show All Chinese Partners</a>
            {{-- <a href="{{ url('admin/partner/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Create Partners Article</a> --}}
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
                    @foreach($partners_zh as $row)
                    <tr>
                        <td>
                            @if ($row->is_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin Partners" href="{{ url('admin/partner/unpin').'/zh/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This Partners" href="{{ url('admin/partner/pin').'/zh/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
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
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Partner" href="{{ url('admin/partner/edit').'/zh/'.$row->id }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Partners" href="{{ url('admin/partner/delete').'/zh/'.$row->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="View Partners" href="{{ url('zh/partners').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
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
            <a href="{{ url('admin/partner/list/ur') }}" class="btn btn-success">Show All Urdu / Hindi Partners</a>
            {{-- <a href="{{ url('admin/partner/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Create Partners Article</a> --}}
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
                    @foreach($partners_ur as $row)
                    <tr>
                        <td>
                            @if ($row->is_pinned == 1)
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Unpin Partners" href="{{ url('admin/partner/unpin').'/ur/'.$row->id }}"><i class="fas fa-thumbtack text-warning"></i></a>
                            @else
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Pin This Partners" href="{{ url('admin/partner/pin').'/ur/'.$row->id }}"><i class="fas fa-thumbtack text-secondary"></i></a>
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
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Partner" href="{{ url('admin/partner/edit').'/ur/'.$row->id }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="Delete Partners" href="{{ url('admin/partner/delete').'/ur/'.$row->id }}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            <a data-bs-toggle="tooltip" data-bs-placement="top" title="View Partners" href="{{ url('ur/partners').'/'.$row->slug }}" target="_blank" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection