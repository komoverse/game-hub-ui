@extends('user.template')
@section('content')
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12">
            <h1 class="limegreen text-center mb-5">Explore All Games</h1>
        </div>
    </div>
    <div class="row">
        @foreach ($games as $game)
        <div class="col-12 col-lg-4 explore-game-wrapper" data-game="{{ $game->game_id }}">
            <img src="{{ $game->hero_banner_url }}" alt="" class="img-hero">
            <div class="title-wrapper">
                <div class="row pt-2">
                    <div class="col-9">
                        <img src="{{ $game->logo_image_url }}" alt="" class="img-icon">
                        <span class="fs-5">{{ $game->game_name }}</span>
                        <br>
                        @php
                            $array_genre = explode(',', $game->genre);
                            foreach ($array_genre as $key => $value) {
                                echo '<span class="badge bg-secondary me-1">'.$value.'</span>';
                            }
                        @endphp
                    </div>
                    <div class="col-3 rating">
                        <span class="fa-solid fa-star"></span>
                        <b class="fs-5">4.8</b>
                        <p>201 reviews</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
@section('script')
<script>
    $('.explore-game-wrapper').on('click', function(){
        var gamename = $(this).data('game');
        window.location.href='{{ url('/') }}/'+gamename;
    });
</script>
@endsection