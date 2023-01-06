<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Komoverse</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ url('assets/css/main.css') }}">
        <link rel="stylesheet" href="{{ url('assets/css/mobile.css') }}">
        <script src="https://kit.fontawesome.com/ca0010aa25.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        <script src="https://files.komoverse.io/jquery.komo-env.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://unpkg.com/@solana/web3.js@latest/lib/index.iife.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/ethereumjs/browser-builds/dist/ethereumjs-tx/ethereumjs-tx-1.3.3.min.js"></script>
        <style>
            :root{
                --star-rating-size: 3rem;
                --unchecked-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='50' height='50' viewBox='0 0 50 50'%3e%3cpath fill='%23fff' stroke='%23666' d='m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z'/%3e%3c/svg%3e");
                --checked-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='50' height='50' viewBox='0 0 50 50'%3e%3cpath fill='gold' stroke='%23666' stroke-width='2' d='m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z'/%3e%3c/svg%3e");
                 --hovered-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='50' height='50' viewBox='0 0 50 50'%3e%3cpath fill='red' stroke='%23fff' stroke-width='2' d='m25,1 6,17h18l-14,11 5,17-15-10-15,10 5-17-14-11h18z'/%3e%3c/svg%3e");
                --max-stars: 5;
               
            }
            
            .star-rating{
                width: min-content;
                padding: 0.3rem;
            }

            .star-rating>div {
                position: relative;
                height: var(--star-rating-size);
                width: calc(var(--star-rating-size) * var(--max-stars));
                background-image: var(--unchecked-image); 
                background-size: var(--star-rating-size) var(--star-rating-size);
            }

            .star-rating label {
                position: absolute;
                height: 100%;
                background-size: var(--star-rating-size) var(--star-rating-size);
            }

            .star-rating label:nth-of-type(1) {
                z-index: 10;
                width: calc(100% / var(--max-stars) * 1);
            }

            .star-rating label:nth-of-type(2) {
                z-index: 9;
                width: calc(100% / var(--max-stars) * 2);
            }

            .star-rating label:nth-of-type(3) {
                z-index: 8;
                width: calc(100% / var(--max-stars) * 3);
            }

            .star-rating label:nth-of-type(4) {
                z-index: 7;
                width: calc(100% / var(--max-stars) * 4);
            }

            .star-rating label:nth-of-type(5) {
                z-index: 6;
                width: calc(100% / var(--max-stars) * 5);
            }
            
            .star-rating input:checked + label,
            .star-rating input:focus + label{
                background-image: var(--checked-image); 
            }
            .star-rating input:checked + label:hover,
            .star-rating label:hover{
                background-image: var(--hovered-image); 
            }
                        
            .star-rating>div:focus-within{
                outline: 0.25rem solid lightblue;
            }

            .star-rating input,
            .star-rating label>span{
                border: 0;
                padding: 0;
                margin: 0;
                position: absolute !important;
                height: 1px; 
                width: 1px;
                overflow: hidden;
                clip: rect(1px 1px 1px 1px); /* IE6, IE7 - a 0 height clip, off to the bottom right of the visible 1px box */
                clip: rect(1px, 1px, 1px, 1px); /*maybe deprecated but we need to support legacy browsers */
                clip-path: inset(50%); /*modern browsers, clip-path works inwards from each corner*/
                white-space: nowrap; /* added line to stop words getting smushed together (as they go onto seperate lines and some screen readers do not understand line feeds as a space */
            }
            
            
        </style>
    </head>
    <body class="bg-black">
        <div class="container-fluid">
            <div class="row bg-black fixed-top" id="navigation">
                <div class="col-7 col-md-4">
                    <button class="btn btn-lg btn-dark ms-2" onclick="toggleSidebar()">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <a href="{{ url('/') }}">
                    <img src="{{ url('assets/img/logo.webp') }}" style="height: 70px" alt="">
                    </a>
                </div>
                <div class="d-none d-md-block col-md-4 py-3">
                    <div class="position-relative">
                        <form action="{{ url('search') }}" method="POST">
                        @csrf    
                        <i class="fa-solid fa-search search-icon"></i>
                        <input type="text" name="search_query" class="form-control search-bar" placeholder="Search">
                        </form>
                    </div>
                </div>
                <div class="col-5 col-md-4 text-end ps-0 py-3">
                    <button class="btn btn-outline-secondary border-0 d-inline d-md-none" onclick="$('#mobileSearch').show(400)">
                        <i class="fa-solid fa-search"></i>
                    </button>
                    <img src="https://komoverse.io/assets/img/flags/gb.svg" onmouseover="toggleLangSwitch();" class="lang-flags me-1 me-md-3" alt="English Language">
                    @if (Session::get('userdata'))
                    <button class="btn btn-outline-success me-3" onclick="window.location.href='{{ url('auth/logout') }}'">
                        <i class="fa-solid fa-wallet"></i><span class="d-none d-md-inline"> Logout</span>
                    </button>
                    @else
                    <button class="btn btn-outline-success me-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                        <i class="fa-solid fa-wallet"></i><span class="d-none d-md-inline"> Login</span>
                    </button>
                    @endif
                </div>
            </div>
            <div class="row bg-black fixed-top py-3" id="mobileSearch" style="display: none">
                <div class="col-10">
                    <div class="position-relative">
                        <form action="{{ url('search') }}" method="POST">
                        @csrf
                        <i class="fa-solid fa-search search-icon"></i>
                        <input type="text" name="search_query" class="form-control search-bar" placeholder="Search">
                        </form>
                    </div>
                </div>
                <div class="col-2">
                    <button class="btn btn-outline-secondary border-0" onclick="$('#mobileSearch').hide(400);">
                        <i class="fa-solid fa-times"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="navbar-separator"></div>

        <div class="container-fluid p-0">
            <div class="d-flex">
                <div class="flex-grow-1 flex-shrink-0 border-right-white" id="sidebar" style="display: none">
                    <div class="nav-content flex-column">
                        <a href="{{ url(' target="_blank') }}">
                            <i class="fa-solid fa-puzzle-piece"></i> Komoverse Game Hub
                        </a>
                    </div>

                    <div class="nav-title">
                        <i class="fa-solid fa-rocket me-2"></i> MINTS
                    </div>
                    <div class="nav-content flex-column">
                        <a class="nav-link" href="{{ url('komochess') }}/mints">
                            <img src="{{ url('assets/img/komochess/icon.jpg') }}" alt="">
                            KomoChess
                            <span class="timer btn btn-sm btn-outline-success">LIVE</span>
                        </a>
                        <a class="nav-link" href="{{ url('telyu-racer') }}/mints">
                            <img src="{{ url('assets/img/telyu/logo.png') }}" alt="">
                            Telyu Racer
                            <span class="timer">30 days</span>
                        </a>
                    </div>
                    <div class="nav-title">
                        <i class="fa-solid fa-trophy me-2"></i> TOURNAMENTS
                    </div>
                    <div class="nav-content flex-column">
                        @foreach($sidebar_data['tournament_schedule']['ongoing'] as $row)
                        <a class="nav-link" href="{{ url($row->game_id) }}/tournament">
                            <img src="{{ $sidebar_data['game_data'][$row->game_id]->logo_image_url }}" alt="">
                            {{ $sidebar_data['game_data'][$row->game_id]->game_name }}
                            <span class="timer">LIVE</span>
                        </a>
                        @endforeach
                        @foreach($sidebar_data['tournament_schedule']['upcoming'] as $row)
                        <a class="nav-link" href="{{ url($row->game_id) }}/tournament">
                            <img src="{{ $sidebar_data['game_data'][$row->game_id]->logo_image_url }}" alt="">
                            {{ $sidebar_data['game_data'][$row->game_id]->game_name }}
                            <span class="timer">{{ date('j', strtotime($row->start_time.' - now')).' days' }}</span>
                        </a>
                        @endforeach
                    </div>
                    <div class="nav-title">
                        <i class="fa-solid fa-arrow-trend-up me-2"></i> TRENDING
                    </div>
                    <div class="nav-content flex-column">
                        <a class="nav-link" href="{{ url('komochess') }}">
                            #1 &nbsp;
                            <img src="{{ url('assets/img/komochess/icon.jpg') }}" alt="">
                            KomoChess
                        </a>
                        <a class="nav-link" href="{{ url('telyu-racer') }}">
                            #2 &nbsp;
                            <img src="{{ url('assets/img/telyu/logo.png') }}" alt="">
                            Telyu Racer
                        </a>
                    </div>
                    <div class="nav-title">
                        <i class="fa-solid fa-gamepad me-2"></i> PLAY NOW
                    </div>
                    <div class="nav-content flex-column">
                        <a class="nav-link" href="{{ url('komochess') }}/play-now">
                            <img src="{{ url('assets/img/komochess/icon.jpg') }}" alt="">
                            KomoChess
                        </a>
                        <a class="nav-link" href="{{ url('telyu-racer') }}/play-now">
                            <img src="{{ url('assets/img/telyu/logo.png') }}" alt="">
                            Telyu Racer
                        </a>
                        <a class="nav-link" href="{{ url('games') }}">
                            <i class="fa-solid fa-ellipsis"></i> Explore All Games
                        </a>
                    </div>
                    <div class="nav-title">
                        <i class="fa-solid fa-graduation-cap me-2"></i> RESOURCES
                    </div>
                    <div class="nav-content flex-column">
                        <a class="nav-link" href="https://discord.gg/komoverse" target="_blank">
                            <i class="fa-brands fa-discord"></i> Join Our Discord Community
                        </a>
                        <a class="nav-link" href="https://facebook.com/komoverse" target="_blank">
                            <i class="fa-brands fa-facebook"></i> Follow Us on Facebook
                        </a>
                        <a class="nav-link" href="https://twitter.com/komoverse" target="_blank">
                            <i class="fa-brands fa-twitter"></i> Follow Us on Twitter
                        </a>
                        <a class="nav-link" href="https://instagram.com/komoverse" target="_blank">
                            <i class="fa-brands fa-instagram"></i> Follow Us on Instagram
                        </a>
                        <a class="nav-link" href="{{ url('news') }}">
                            <i class="fa-solid fa-bullhorn"></i> News
                        </a>
                        <a class="nav-link" href="{{ url('partnership') }}">
                            <i class="fa-solid fa-handshake"></i> Partnership
                        </a>
                        <a class="nav-link" href="{{ url('academy') }}">
                            <i class="fa-solid fa-graduation-cap"></i> Academy
                        </a>
                        <a class="nav-link" href="https://docs.komoverse.io" target="_blank">
                            <i class="fa-solid fa-code"></i> Developer Documentation
                        </a>
                    </div>
                </div>
                <div class="flex-shrink-1 w-100" id="main-content">
                    <div><?php var_dump($errors); ?></div>
                    @yield('content')
                </div>
            </div>
        </div>


        <!-- Lofin Modal -->
        <div class="modal modal-lg fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content bg-dark">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="loginModalLabel">Login</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-6 p-5 bg-dark text-light left-login">
                                <form action="{{ url('auth/komo') }}" method="POST">
                                    @csrf
                                    <h4>KOMO Account</h4>
                                    Username
                                    <input type="text" name="komo_username" class="form-control my-1">
                                    Password
                                    <input type="password" name="password" class="form-control mt-1 mb-2">
                                    <div class="row">
                                        <div class="col pe-1">
                                            <button type="submit" class="btn form-control btn-success"><i class="fas fa-sign-in-alt" aria-hidden="true"></i> &nbsp; Login</button>
                                        </div>
                                        <div class="col ps-1">
                                            <a href="{{ url('register') }}" class="btn form-control btn-outline-success"><i class="fas fa-edit" aria-hidden="true"></i> &nbsp; Register</a>
                                        </div>
                                    </div>
                                </form>
                                <a href="{{ url('forgot-password') }}">Lost your password?</a>

                                <div class="or">
                                    OR
                                </div>
                            </div>
                            <div class="col-12 col-md-6 p-5 bg-dark text-light">
                                <button class="btn mt-2 form-control btn-sso btn-phantom" onclick="phantomLogin()">
                                    <i class="fas fa-wallet" aria-hidden="true"></i> Connect Phantom Wallet
                                </button>
                                <a href="{{ url('auth/google') }}" class="btn mt-2 form-control btn-sso btn-google">
                                    <i class="fab fa-google" aria-hidden="true"></i> Login with Google
                                </a>
                                <a href="{{ url('auth/facebook') }}" class="btn mt-2 form-control btn-sso btn-facebook">
                                    <i class="fab fa-facebook" aria-hidden="true"></i> Login with Facebook
                                </a>
                                {{-- <a href="{{ url('auth/twitter') }}" class="btn mt-2 form-control btn-sso btn-twitter">
                                    <i class="fab fa-twitter" aria-hidden="true"></i> Login with Twitter
                                </a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="display: none">
            <form action="{{ url('auth/phantom') }}" id="phantomLoginForm" method="POST">
                @csrf
                <input type="hidden" name="wallet_pubkey" id="phantomWalletPubkey">    
            </form>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){
                if ('{{ Request::path() }}' == '/') {
                    $('#sidebar').show();                    
                } else {
                    $('#sidebar').hide();                    
                }
            });
            function toggleSidebar() {
                $('#sidebar').toggle({ direction: "left" }, 1000);
            }
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
        <script>
            var isPhantomConnected = false;
            const isPhantomInstalled = window.phantom?.solana?.isPhantom;

            $(document).ready(function() {
                console.log("phantom " + isPhantomInstalled);
                console.log(solanaWeb3);
            });

            function phantomLogin() {
                event.preventDefault();
                if (isPhantomInstalled) {
                    // Check for Solana & Phantom
                    provider = window.solana;
                    provider.connect().then(function(value){
                        console.log(value.publicKey.toString());
                        $('#phantomWalletPubkey').val(value.publicKey.toString());
                        $('#phantomLoginForm').submit();
                    });
                }
            }
        </script>
        @yield('script')
    </body>
</html>