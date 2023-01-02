@extends('user.game-detail')
@section('game-content')
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12 col-md-6 bg-grey px-md-5 py-md-3">
            <div class="mb-3">
                Developer <b>{{ $game_data->developer_name  }}</b>
            </div>
            <div class="mb-3">
                Community
                <div class="social-icon">
                    @if ($game_data->web_url)
                    <a href="{{ $game_data->web_url }}" target="_blank">
                        <i class="fa-solid fa-globe"></i>
                    </a>
                    @endif
                    @if ($game_data->discord_url)
                    <a href="{{ $game_data->discord_url }}" target="_blank">
                        <i class="fa-brands fa-discord"></i>
                    </a>
                    @endif
                    @if ($game_data->twitter_url)
                    <a href="{{ $game_data->twitter_url }}" target="_blank">
                        <i class="fa-brands fa-twitter"></i>
                    </a>
                    @endif
                    @if ($game_data->instagram_url)
                    <a href="{{ $game_data->instagram_url }}" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    @endif
                    @if ($game_data->facebook_url)
                    <a href="{{ $game_data->facebook_url }}" target="_blank">
                        <i class="fa-brands fa-facebook"></i>
                    </a>
                    @endif
                    @if ($game_data->youtube_url)
                    <a href="{{ $game_data->youtube_url }}" target="_blank">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    @endif
                </div>
            </div>
            <div class="mb-3">
                Genre
                @php
                    $genre_array = explode(',', $game_data->genre);
                    foreach ($genre_array as $key => $value) {
                        echo "<span class='badge bg-secondary me-1'>".$value."</span>";
                    }
                @endphp
            </div>
            <span class="fw-light">{{ $game_data->description }}</span>
        </div>
    </div>
</div>
@endsection