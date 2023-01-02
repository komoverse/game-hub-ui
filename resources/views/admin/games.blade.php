@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h2>Game List</h2>
            <a href="{{ url('admin/game/create') }}" class="btn btn-success"><i class="fas fa-plus"></i> &nbsp; Add Game</a>

        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <table class="table table-sm table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Banner</th>
                        <th>Genre</th>
                        <th>Description</th>
                        <th>Social</th>
                        <th>Links</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($games as $row)
                    <tr>
                        <td>
                            <img src="{{ $row->logo_image_url }}" style="height: 25px" alt="">
                            {{ $row->game_name }}
                        </td>
                        <td>
                            <img src="{{ $row->hero_banner_url }}" style="height: 25px" alt="">
                        </td>
                        <td>
                            {{ $row->genre }}
                        </td>
                        <td>
                            {{ substr($row->description, 0, 50).'...' }}
                        </td>
                        <td>
                            {!! ($row->web_url) ? '<a target="_blank" href="'.$row->web_url.'"><i class="fas fa-globe"></i></a>' : '' !!}
                            {!! ($row->discord_url) ? '<a target="_blank" href="'.$row->discord_url.'"><i class="fab fa-discord"></i></a>' : '' !!}
                            {!! ($row->twitter_url) ? '<a target="_blank" href="'.$row->twitter_url.'"><i class="fab fa-twitter"></i></a>' : '' !!}
                            {!! ($row->facebook_url) ? '<a target="_blank" href="'.$row->facebook_url.'"><i class="fab fa-facebook"></i></a>' : '' !!}
                            {!! ($row->youtube_url) ? '<a target="_blank" href="'.$row->youtube_url.'"><i class="fab fa-youtube"></i></a>' : '' !!}
                            
                        </td>
                        <td>
                            @php
                                if (isset($links_array[$row->game_id])) {
                                    foreach ($links_array[$row->game_id] as $key => $value) {
                                        echo "<a class='me-1' href='".$value->link."' target='_blank'><i class='".$value->fa_icons."'></i></a>";
                                    }
                                }
                            @endphp
                        </td>
                        <td>
                            <a href="{{ url('admin/game/links').'/'.$row->game_id }}" class="btn btn-warning">
                                <i class="fas fa-link"></i>
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
