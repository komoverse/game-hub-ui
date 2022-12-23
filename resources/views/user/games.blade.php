@extends('user.template')
@section('content')
<div class="container-fluid p-5">
    <div class="row">
        <div class="col-12">
            <h1 class="limegreen text-center mb-5">Explore All Games</h1>
        </div>
    </div>
    <div class="row">

        <div class="col-12 col-lg-4 explore-game-wrapper" data-game="komochess">
            <img src="{{ url('assets/img/komochess/hero.webp') }}" alt="" class="img-hero">
            <div class="title-wrapper">
                <div class="row pt-2">
                    <div class="col-9">
                        <img src="{{ url('assets/img/komochess/icon.jpg') }}" alt="" class="img-icon">
                        <span class="fs-5">KomoChess</span>
                        <br>
                        <span class="badge bg-secondary">Strategy</span>
                        <span class="badge bg-secondary">Auto-Battle</span>
                    </div>
                    <div class="col-3 rating">
                        <span class="fa-solid fa-star"></span>
                        <b class="fs-5">4.8</b>
                        <p>201 reviews</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-lg-4 explore-game-wrapper" data-game="telyu">
            <img src="{{ url('assets/img/telyu/hero.png') }}" alt="" class="img-hero">
            <div class="title-wrapper">
                <div class="row pt-2">
                    <div class="col-9">
                        <img src="{{ url('assets/img/telyu/logo.png') }}" alt="" class="img-icon">
                        <span class="fs-5">Telyu Racer</span>
                        <br>
                        <span class="badge bg-secondary">Racing</span>
                        <span class="badge bg-secondary">Driving</span>
                    </div>
                    <div class="col-3 rating">
                        <span class="fa-solid fa-star"></span>
                        <b class="fs-5">4.5</b>
                        <p>124 reviews</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-lg-4 explore-game-wrapper">
            <img src="https://via.placeholder.com/2000x900" alt="" class="img-hero">
            <div class="title-wrapper">
                <div class="row pt-2">
                    <div class="col-9">
                        <img src="https://via.placeholder.com/300" alt="" class="img-icon">
                        <span class="fs-5">Lorem Ipsum</span>
                        <br>
                        <span class="badge bg-secondary">RPG</span>
                        <span class="badge bg-secondary">Action</span>
                        <span class="badge bg-secondary">Adventure</span>
                    </div>
                    <div class="col-3 rating">
                        <span class="fa-solid fa-star"></span>
                        <b class="fs-5">4.8</b>
                        <p>201 reviews</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-lg-4 explore-game-wrapper">
            <img src="https://via.placeholder.com/2000x900" alt="" class="img-hero">
            <div class="title-wrapper">
                <div class="row pt-2">
                    <div class="col-9">
                        <img src="https://via.placeholder.com/300" alt="" class="img-icon">
                        <span class="fs-5">Lorem Ipsum</span>
                        <br>
                        <span class="badge bg-secondary">RPG</span>
                        <span class="badge bg-secondary">Action</span>
                        <span class="badge bg-secondary">Adventure</span>
                    </div>
                    <div class="col-3 rating">
                        <span class="fa-solid fa-star"></span>
                        <b class="fs-5">4.8</b>
                        <p>201 reviews</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 explore-game-wrapper">
            <img src="https://via.placeholder.com/2000x900" alt="" class="img-hero">
            <div class="title-wrapper">
                <div class="row pt-2">
                    <div class="col-9">
                        <img src="https://via.placeholder.com/300" alt="" class="img-icon">
                        <span class="fs-5">Lorem Ipsum</span>
                        <br>
                        <span class="badge bg-secondary">RPG</span>
                        <span class="badge bg-secondary">Action</span>
                        <span class="badge bg-secondary">Adventure</span>
                    </div>
                    <div class="col-3 rating">
                        <span class="fa-solid fa-star"></span>
                        <b class="fs-5">4.8</b>
                        <p>201 reviews</p>
                    </div>
                </div>
            </div>
        </div>

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