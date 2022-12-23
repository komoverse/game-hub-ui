@extends('user.template')
@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="2000">
            <img src="{{ url('assets/img/slideshow/slide-1.webp') }}" class="d-block w-100" alt="...">
            <div class="carousel-fader"></div>
            <div class="carousel-caption">
                <b class="fs-5 limegreen">Live Minting</b>
                <b class="fs-xxl d-block">KomoChess</b>
                <p>KomoChess Presale Minting is Now Live. Whitelisted KOMO Account can now access minting page.</p>
                <button class="btn btn-lg btn-success" onclick="window.location.href='{{ url('komochess#mints') }}'">MINT NOW</button>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="{{ url('assets/img/slideshow/slide-2.webp') }}" class="d-block w-100" alt="...">
            <div class="carousel-fader"></div>
            <div class="carousel-caption">
                <b class="fs-5 limegreen">Upcoming Tournament</b>
                <b class="fs-xxl d-block">Telyu Racer</b>
                <p>Christmas is coming. Race in our new snowy circuit to celebrate and earn 100 SOL prize pool.</p>
                <button class="btn btn-lg btn-success" onclick="window.location.href='{{ url('telyu-racer#tournament') }}'">VIEW DETAILS</button>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="{{ url('assets/img/slideshow/slide-3.webp') }}" class="d-block w-100" alt="...">
            <div class="carousel-fader"></div>
            <div class="carousel-caption">
                <b class="fs-5 limegreen">News Announcement</b>
                <b class="fs-xxl d-block">Komoverse</b>
                <p>Toto Sugiri appointed as Honorary Chairman of Komoverse</p>
                <button class="btn btn-lg btn-success" onclick="window.location.href='{{ url('news') }}'">VIEW DETAILS</button>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container-fluid p-md-5">
    <div class="row">
        <div class="col-12">
            <b class="fs-3">Featured</b>
        </div>
        <div class="col-12 mb-3 featured-wrapper">
            <div class="featured-item">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/BpQqYUT1QOs?rel=0&showinfo=0&controls=0&autohide=0" title="YouTube video" allowfullscreen></iframe>
                </div>
            </div>
            <div class="featured-item">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/GJoN3XtBu6w?rel=0&showinfo=0&controls=0&autohide=0" title="YouTube video" allowfullscreen></iframe>
                </div>
            </div>
            <div class="featured-item">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/1qbI9BTqnwI?rel=0&showinfo=0&controls=0&autohide=0" title="YouTube video" allowfullscreen></iframe>
                </div>
            </div>
            <div class="featured-item">
                <div class="ratio ratio-16x9">
                    <iframe src="https://www.youtube.com/embed/jatrtWC4hAo?rel=0&showinfo=0&controls=0&autohide=0" title="YouTube video" allowfullscreen></iframe>
                </div>
            </div>
         </div>
    </div>
</div>

<div class="container-fluid p-md-5">
    <div class="row">
        <div class="col-12">
            <b class="fs-3">Events</b>
        </div>
        <div class="col-12 mb-3 events-wrapper">
            <div class="card bg-dark" onclick="goto('{{ url('komochess#mints') }}')">
                <img src="{{ url('assets/img/komochess/icon.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                <h4 class="card-title">KomoChess</h4>
                <p class="card-text">Presale Mint</p>
                <span href="#" class="btn btn-outline-secondary form-control limegreen">LIVE NOW</span>
                </div>
            </div>
            <div class="card bg-dark" onclick="goto('{{ url('telyu-racer#tournament') }}')">
                <img src="{{ url('assets/img/telyu/logo.png') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                <h4 class="card-title">Telyu Racer</h4>
                <p class="card-text">Christmas Race Tournament</p>
                <span href="#" class="btn btn-outline-secondary form-control limegreen">1 day</span>
                </div>
            </div>
            <div class="card bg-dark" onclick="goto('{{ url('telyu-racer#tournament') }}')">
                <img src="{{ url('assets/img/telyu/logo.png') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                <h4 class="card-title">Telyu Racer</h4>
                <p class="card-text">New Years Tournament</p>
                <span href="#" class="btn btn-outline-secondary form-control limegreen">7 days</span>
                </div>
            </div>
            <div class="card bg-dark" onclick="goto('{{ url('komochess#tournament') }}')">
                <img src="{{ url('assets/img/komochess/icon.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                <h4 class="card-title">KomoChess</h4>
                <p class="card-text">WKC Qualifier</p>
                <span href="#" class="btn btn-outline-secondary form-control limegreen">24 days</span>
                </div>
            </div>
         </div>
    </div>
</div>

<div class="container-fluid p-md-5">
    <div class="row">
        <div class="col-12">
            <b class="fs-3">New Listings</b>
        </div>
        <div class="col-12 mb-3 listings-wrapper">
            <div class="card bg-dark">
                <img src="{{ url('assets/img/komochess/27.png') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                <h4 class="card-title">KomoChess #27</h4>
                <p class="card-text limegreen">2 hours ago</p>
                <span href="#" class="btn btn-outline-secondary form-control white fw-bold">
                    <img style="height:20px" src="{{ url('assets/img/solana.png') }}" alt="">
                    1.63 SOL
                </span>
                </div>
            </div>
            <div class="card bg-dark">
                <img src="{{ url('assets/img/komochess/83.png') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                <h4 class="card-title">KomoChess #83</h4>
                <p class="card-text limegreen">5 hours ago</p>
                <span href="#" class="btn btn-outline-secondary form-control white fw-bold">
                    <img style="height:20px" src="{{ url('assets/img/solana.png') }}" alt="">
                    1.63 SOL
                </span>
                </div>
            </div>
            <div class="card bg-dark">
                <img src="{{ url('assets/img/telyu/2.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                <h4 class="card-title">Race Car #227</h4>
                <p class="card-text limegreen">1 day ago</p>
                <span href="#" class="btn btn-outline-secondary form-control white fw-bold">
                    <img style="height:20px" src="{{ url('assets/img/solana.png') }}" alt="">
                    1.63 SOL
                </span>
                </div>
            </div>
            <div class="card bg-dark">
                <img src="{{ url('assets/img/telyu/5.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                <h4 class="card-title">Race Car #23</h4>
                <p class="card-text limegreen">2 hours ago</p>
                <span href="#" class="btn btn-outline-secondary form-control white fw-bold">
                    <img style="height:20px" src="{{ url('assets/img/solana.png') }}" alt="">
                    1.63 SOL
                </span>
                </div>
            </div>
            <div class="card bg-dark">
                <img src="{{ url('assets/img/komochess/141.png') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                <h4 class="card-title">KomoChess #141</h4>
                <p class="card-text limegreen">2 days ago</p>
                <span href="#" class="btn btn-outline-secondary form-control white fw-bold">
                    <img style="height:20px" src="{{ url('assets/img/solana.png') }}" alt="">
                    1.63 SOL
                </span>
                </div>
            </div>
            <div class="card bg-dark">
                <img src="{{ url('assets/img/telyu/9.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                <h4 class="card-title">Race Car #712</h4>
                <p class="card-text limegreen">4 days ago</p>
                <span href="#" class="btn btn-outline-secondary form-control white fw-bold">
                    <img style="height:20px" src="{{ url('assets/img/solana.png') }}" alt="">
                    1.63 SOL
                </span>
                </div>
            </div>
            <div class="card bg-dark">
                <img src="{{ url('assets/img/komochess/183.png') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                <h4 class="card-title">KomoChess #183</h4>
                <p class="card-text limegreen">5 days ago</p>
                <span href="#" class="btn btn-outline-secondary form-control white fw-bold">
                    <img style="height:20px" src="{{ url('assets/img/solana.png') }}" alt="">
                    1.63 SOL
                </span>
                </div>
            </div>
            <div class="card bg-dark">
                <img src="{{ url('assets/img/telyu/1.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body text-center">
                <h4 class="card-title">Race Car #626</h4>
                <p class="card-text limegreen">2 hours ago</p>
                <span href="#" class="btn btn-outline-secondary form-control white fw-bold">
                    <img style="height:20px" src="{{ url('assets/img/solana.png') }}" alt="">
                    1.63 SOL
                </span>
                </div>
            </div>
         </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $('.listings-wrapper .card').on('click', function(){
        window.location.href='komochess/items/117';
    });
</script>
@endsection