@extends('admin/template')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Create Game Links</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-5">
            <form action="{{ url('admin/game/links/add') }}" method="POST">
            @csrf
            <div class="row mb-2">
                <div class="col-4">
                    Game ID
                </div>
                <div class="col-8">
                    <input type="text" name="game_id" readonly="readonly" value="{{ $game_id }}" class="form-control">
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-4">
                    FA Icons
                </div>
                <div class="col-8">
                    <input type="text" name="fa_icons" placeholder="fab fa-windows" class="form-control">
                </div>
            </div>
            
            <div class="row mb-2">
                <div class="col-4">
                    Download For
                </div>
                <div class="col-8">
                    <input type="text" name="download_for" placeholder="Windows (x86/x64)" class="form-control">
                </div>
            </div>
            
            <div class="row mb-2">
                <div class="col-4">
                    Link
                </div>
                <div class="col-8">
                    <input type="url" name="link" placeholder="https://yourwebsite.com/setup.exe" class="form-control">
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-4"></div>
                <div class="col-8">
                    <button class="btn btn-success"><i class="fas fa-save"></i> Submit</button>
                </div>
            </div>
            </form>
        </div>
        <div class="col-7">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Icons</th>
                        <th>Download Text</th>
                        <th>Link</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($links as $row)
                    <tr>
                        <td>{{ $row->fa_icons }}</td>
                        <td>{{ $row->download_for }}</td>
                        <td>{{ $row->link }}</td>
                        <td>
                            <a href="{{ url('admin/game/links/delete').'/'.$row->id }}">
                                <i class="fas fa-times"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection