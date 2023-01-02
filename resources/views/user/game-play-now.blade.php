@extends('user.game-detail')
@section('game-content')
<div class="container-fluid p-5 my-5">
    <div class="row">
        <div class="col"></div>
        <div class="col-4">
            @if (count($links) == 0) 
                <center>
                <h2>Play Links Not Found</h2>
                Game might be not released yet
                </center>
            @endif

            @foreach($links as $row)
            <a href="{{ $row->link }}" target="_blank" class="mb-2 form-control btn btn-success">
                @if ($row->fa_icons)
                <i class="{{ $row->fa_icons }}"></i>
                @endif
                Download for {{ $row->download_for }}
            </a>
            @endforeach
        </div>
        <div class="col"></div>
    </div>
</div>
@endsection