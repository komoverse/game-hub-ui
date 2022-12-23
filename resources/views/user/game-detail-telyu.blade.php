@extends('user.template')
@section('content')
<div class="hero-banner">
    <img src="{{ url('assets/img/telyu/hero.png') }}" alt="" class="hero-img">
    <div class="hero-content p-2 p-md-5">
        <img src="{{ url('assets/img/telyu/logo.png') }}" alt="" class="logo">
        <div class="social-icon">
            <a href="https://discord.gg" target="_blank">
                <i class="fa-brands fa-discord"></i>
            </a>
            <a href="https://instagram.com" target="_blank">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://twitter.com" target="_blank">
                <i class="fa-brands fa-twitter"></i>
            </a>
        </div>
        <h1>Telyu Racer</h1>
        <div class="my-3">
            <button class="btn px-4 btn-success">
            <i class="fa-solid fa-gamepad me-2"></i> PLAY NOW
            </button>
            <button class="btn px-4 btn-outline-success">
            <i class="fa-solid fa-play me-2"></i> WATCH TRAILER
            </button>
        </div>
        <div class="description">
            by <b>Komoverse</b>
            <br>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum sunt ad, repudiandae eaque repellendus natus eveniet modi suscipit iure odit dolorum, perferendis sed officia mollitia vitae nobis alias reiciendis fugit.
        </div>
    </div>
</div>
<div class="container-fluid bg-black position-relative">
    <div class="row">
        <div class="col-12 p-0">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" href="#items" id="items-tab" data-bs-toggle="tab" data-bs-target="#items" type="button" role="tab" aria-controls="items" aria-selected="true">ITEMS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" href="#activity" id="activity-tab" data-bs-toggle="tab" data-bs-target="#activity" type="button" role="tab" aria-controls="activity" aria-selected="false">ACTIVITY</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" href="#mints" id="mints-tab" data-bs-toggle="tab" data-bs-target="#mints" type="button" role="tab" aria-controls="mints" aria-selected="false">MINTS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" href="#tournament" id="tournament-tab" data-bs-toggle="tab" data-bs-target="#tournament" type="button" role="tab" aria-controls="tournament" aria-selected="false">TOURNAMENTS</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" href="#play" id="play-tab" data-bs-toggle="tab" data-bs-target="#play" type="button" role="tab" aria-controls="play" aria-selected="false">PLAY NOW</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" href="#review" id="review-tab" data-bs-toggle="tab" data-bs-target="#review" type="button" role="tab" aria-controls="review" aria-selected="false">REVIEW</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" href="#insight" id="insight-tab" data-bs-toggle="tab" data-bs-target="#insight" type="button" role="tab" aria-controls="insight" aria-selected="false">INSIGHT</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">

                {{-- ITEMS TAB --}}
                <div class="tab-pane fade show active" id="items" role="tabpanel" aria-labelledby="items-tab" tabindex="0">
                    <div class="container-fluid p-0">
                        <div class="d-flex mb-3 filter-wrapper">
                            <div class="border-right-white w-25">
                                <div class="fs-6 p-3">FILTERS</div>
                                <div class="bg-grey p-3">
                                    <div class="row">
                                        <div class="col-3 img-preview">
                                            <img src="{{ url('assets/img/telyu/logo.png') }}" alt="">
                                        </div>
                                        <div class="col-9">
                                            NFT
                                            <br>
                                            <img style="width: 25px;" src="{{ url('assets/img/solana.png') }}" alt=""> 1.24 SOL
                                            &nbsp;
                                            &nbsp;
                                            <i class="fa-solid fa-layer-group"></i> 10k volume
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Car Color
                                        </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <select class="form-select bg-dark text-light" multiple>
                                                    <option value="">Black</option>
                                                    <option value="">Blue</option>
                                                    <option value="">Red</option>
                                                    <option value="">Yellow</option>
                                                    <option value="">White</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Car Type
                                        </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <select class="form-select bg-dark text-light" multiple>
                                                    <option value="">SUV</option>
                                                    <option value="">Sedan</option>
                                                    <option value="">Hatchback</option>
                                                    <option value="">Coupe</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Tyres
                                        </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <select class="form-select bg-dark text-light" multiple>
                                                    <option value="">Bridgestone</option>
                                                    <option value="">GT Radial</option>
                                                    <option value="">Michelin</option>
                                                    <option value="">Pirelli</option>
                                                    <option value="">Yokohama</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="w-75">
                                <div class="container-fluid">
                                    <div class="row px-3" id="nft-wrapper">
                                        <div class="col-12 col-lg-3 p-2">
                                            <div class="bg-grey">
                                                <div class="image-wrapper">
                                                    <img src="{{ url('assets/img/telyu/1.jpg') }}" alt="">
                                                </div>
                                                Race Car #121
                                                <div class="price">
                                                    <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> 1.24 SOL
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 p-2">
                                            <div class="bg-grey">
                                                <div class="image-wrapper">
                                                    <img src="{{ url('assets/img/telyu/2.jpg') }}" alt="">
                                                </div>
                                                Race Car #126
                                                <div class="price">
                                                    <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> 1.24 SOL
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 p-2">
                                            <div class="bg-grey">
                                                <div class="image-wrapper">
                                                    <img src="{{ url('assets/img/telyu/3.jpg') }}" alt="">
                                                </div>
                                                Race Car #142
                                                <div class="price">
                                                    <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> 1.24 SOL
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 p-2">
                                            <div class="bg-grey">
                                                <div class="image-wrapper">
                                                    <img src="{{ url('assets/img/telyu/4.jpg') }}" alt="">
                                                </div>
                                                Race Car #243
                                                <div class="price">
                                                    <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> 1.24 SOL
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 p-2">
                                            <div class="bg-grey">
                                                <div class="image-wrapper">
                                                    <img src="{{ url('assets/img/telyu/5.jpg') }}" alt="">
                                                </div>
                                                Race Car #356
                                                <div class="price">
                                                    <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> 1.24 SOL
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 p-2">
                                            <div class="bg-grey">
                                                <div class="image-wrapper">
                                                    <img src="{{ url('assets/img/telyu/6.jpg') }}" alt="">
                                                </div>
                                                Race Car #361
                                                <div class="price">
                                                    <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> 1.24 SOL
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 p-2">
                                            <div class="bg-grey">
                                                <div class="image-wrapper">
                                                    <img src="{{ url('assets/img/telyu/7.jpg') }}" alt="">
                                                </div>
                                                Race Car #521
                                                <div class="price">
                                                    <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> 1.24 SOL
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 p-2">
                                            <div class="bg-grey">
                                                <div class="image-wrapper">
                                                    <img src="{{ url('assets/img/telyu/8.jpg') }}" alt="">
                                                </div>
                                                Race Car #622
                                                <div class="price">
                                                    <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> 1.24 SOL
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 p-2">
                                            <div class="bg-grey">
                                                <div class="image-wrapper">
                                                    <img src="{{ url('assets/img/telyu/9.jpg') }}" alt="">
                                                </div>
                                                Race Car #675
                                                <div class="price">
                                                    <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> 1.24 SOL
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 p-2">
                                            <div class="bg-grey">
                                                <div class="image-wrapper">
                                                    <img src="{{ url('assets/img/telyu/10.jpg') }}" alt="">
                                                </div>
                                                Race Car #742
                                                <div class="price">
                                                    <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> 1.24 SOL
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-lg-3 p-2">
                                            <div class="bg-grey">
                                                <div class="image-wrapper">
                                                    <img src="{{ url('assets/img/telyu/11.jpg') }}" alt="">
                                                </div>
                                                Race Car #893
                                                <div class="price">
                                                    <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> 1.24 SOL
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                {{-- ACTIVITY TABS --}}
                <div class="tab-pane fade" id="activity" role="tabpanel" aria-labelledby="activity-tab" tabindex="0">
                    <div class="container p-5">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="pb-3 text-center">Recent Sales</h2>
                                <table class="table table-dark table-striped text-center table-activity">
                                    <thead>
                                        <tr>
                                            <th>ITEM</th>
                                            <th>BUYER</th>
                                            <th>SELLER</th>
                                            <th>PRICE</th>
                                            <th>TIME</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-start">
                                        <tr>
                                            <td>
                                                <div class="thumbnail-wrapper">
                                                    <img src="{{ url('assets/img/telyu/11.jpg') }}" alt="">
                                                </div>
                                                Race Car #742
                                            </td>
                                            <td>
                                                Aviabee 
                                                <span class="fs-7">(nikk...kUaP)</span>
                                            </td>
                                            <td>
                                                polycrest 
                                                <span class="fs-7">(BwkQ...prW7)</span>
                                            </td>
                                            <td>
                                                <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> 1.24 SOL SOL
                                            </td>
                                            <td>
                                                <span class="limegreen">
                                                    1 hour ago
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="thumbnail-wrapper">
                                                    <img src="{{ url('assets/img/telyu/1.jpg') }}" alt="">
                                                </div>
                                                Race Car #421
                                            </td>
                                            <td>
                                                Aviabee 
                                                <span class="fs-7">(nikk...kUaP)</span>
                                            </td>
                                            <td>
                                                polycrest 
                                                <span class="fs-7">(BwkQ...prW7)</span>
                                            </td>
                                            <td>
                                                <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> 1.24 SOL SOL
                                            </td>
                                            <td>
                                                <span class="limegreen">
                                                    1 hour ago
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="thumbnail-wrapper">
                                                    <img src="{{ url('assets/img/telyu/4.jpg') }}" alt="">
                                                </div>
                                                Race Car #477
                                            </td>
                                            <td>
                                                Aviabee 
                                                <span class="fs-7">(nikk...kUaP)</span>
                                            </td>
                                            <td>
                                                polycrest 
                                                <span class="fs-7">(BwkQ...prW7)</span>
                                            </td>
                                            <td>
                                                <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> 1.24 SOL SOL
                                            </td>
                                            <td>
                                                <span class="limegreen">
                                                    1 hour ago
                                                </span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- MINTS TABS --}}
                <div class="tab-pane fade" id="mints" role="tabpanel" aria-labelledby="mints-tab" tabindex="0">
                    <div class="container-fluid p-5">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <img src="https://via.placeholder.com/600" alt="">
                            </div>
                            <div class="col-12 col-md-8">

                                <div class="bg-grey p-3 mb-3">
                                    <h3>Presale Whitelist</h3>
                                    <button class="d-block btn btn-success my-2 px-5">
                                        MINT NOW
                                    </button>

                                    <div class="row mt-3">
                                        <div class="col-6 col-md-2">
                                            <div class="h-100">
                                                <span class="limegreen">Total Sold</span>
                                                <p>1,000</p>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2">
                                            <div class="h-100">
                                                <span class="limegreen">Mint Price</span>
                                                <p>0.5 SOL</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="h-100">
                                                <span class="limegreen">Mint Schedule</span>
                                                <p>31 Dec 22 10:00 (UTC) to 01 Jan 23 22:00 (UTC)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="limegreen">Allowlist</span>
                                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto, aliquam veniam, nostrum accusantium quasi beatae amet. Odit eaque culpa, architecto voluptate reprehenderit repudiandae commodi quos numquam tempora, quis sit obcaecati!</p>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="bg-grey p-3 mb-3">
                                    <h3>Community Mint</h3>
                                    <button class="d-block btn btn-secondary disabled my-2 px-5">
                                        Coming Soon
                                    </button>

                                    <div class="row mt-3">
                                        <div class="col-6 col-md-2">
                                            <div class="h-100">
                                                <span class="limegreen">Total Sold</span>
                                                <p>10,000</p>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2">
                                            <div class="h-100">
                                                <span class="limegreen">Mint Price</span>
                                                <p>1 SOL</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="h-100">
                                                <span class="limegreen">Mint Schedule</span>
                                                <p>31 Dec 22 10:00 (UTC) to 01 Jan 23 22:00 (UTC)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="limegreen">Allowlist</span>
                                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto, aliquam veniam, nostrum accusantium quasi beatae amet. Odit eaque culpa, architecto voluptate reprehenderit repudiandae commodi quos numquam tempora, quis sit obcaecati!</p>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="bg-grey p-3 mb-3">
                                    <h3>Public Mint</h3>
                                    <button class="d-block btn btn-secondary disabled my-2 px-5">
                                        Coming Soon
                                    </button>

                                    <div class="row mt-3">
                                        <div class="col-6 col-md-2">
                                            <div class="h-100">
                                                <span class="limegreen">Total Sold</span>
                                                <p>89,000</p>
                                            </div>
                                        </div>
                                        <div class="col-6 col-md-2">
                                            <div class="h-100">
                                                <span class="limegreen">Mint Price</span>
                                                <p>2 SOL</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-8">
                                            <div class="h-100">
                                                <span class="limegreen">Mint Schedule</span>
                                                <p>31 Dec 22 10:00 (UTC) to 01 Jan 23 22:00 (UTC)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <span class="limegreen">Allowlist</span>
                                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto, aliquam veniam, nostrum accusantium quasi beatae amet. Odit eaque culpa, architecto voluptate reprehenderit repudiandae commodi quos numquam tempora, quis sit obcaecati!</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                {{-- TOURNAMENT TAB --}}
                <div class="tab-pane fade" id="tournament" role="tabpanel" aria-labelledby="tournament-tab" tabindex="0">
                    <div class="container-fluid p-5">
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <img src="https://via.placeholder.com/600" alt="">
                            </div>
                            <div class="col-12 col-md-8">
                                <div class="bg-grey p-3">
                                    <h3>Tournament Name</h3>
                                    <button class="d-block btn btn-success my-2 px-5">
                                        PLAY NOW
                                    </button>

                                    <div class="row fs-7 mt-3">
                                        <div class="col-12 col-md-3 p-2">
                                            <div class="bg-lightgrey p-2 h-100">
                                                <span class="limegreen">Prize</span>
                                                <p>$10000 (~356 SOL)</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3 p-2">
                                            <div class="bg-lightgrey p-2 h-100">
                                                <span class="limegreen">Tournament Dates</span>
                                                <p>31 Dec 22 10:00 (UTC) <br>to<br> 01 Jan 23 22:00 (UTC)</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 p-2">
                                            <div class="bg-lightgrey p-2 h-100">
                                                <span class="limegreen">Description</span>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit modi ipsum voluptate consequuntur quia, similique ducimus, dolorum dolore tempore voluptates distinctio nemo, placeat, ipsam in sit dolorem. Doloremque quae</p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <table class="table table-striped table-dark">
                                                <thead>
                                                    <tr class="limegreen">
                                                        <th>Rank</th>
                                                        <th>Player</th>
                                                        <th>Score</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>leoleo</td>
                                                        <td>5205</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>maymay</td>
                                                        <td>5112</td>
                                                    </tr>
                                                    <tr>
                                                        <td>3</td>
                                                        <td>Aviabee</td>
                                                        <td>4821</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>pigroast</td>
                                                        <td>4288</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>ainuka</td>
                                                        <td>4129</td>
                                                    </tr>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Aviabee</td>
                                                        <td>5205</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- PLAY TABS --}}
                <div class="tab-pane fade" id="play" role="tabpanel" aria-labelledby="play-tab" tabindex="0">
                    <div class="container p-5">
                        <div class="row text-center">
                            <div class="row mt-3">
                                <div class="col"></div>
                                <div class="col-12 col-md-4">
                                    <button class="btn btn-lg form-control btn-success">
                                        <i class="fa-brands fa-windows"></i> Download for Windows (PC)
                                    </button>
                                </div>
                                <div class="col"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col"></div>
                                    <div class="col-12 col-md-4">
                                        <button class="btn btn-lg form-control btn-success">
                                            <i class="fa-brands fa-android"></i> Download for Android
                                        </button>
                                    </div>
                                <div class="col"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col"></div>
                                    <div class="col-12 col-md-4">
                                        <button class="btn btn-lg form-control btn-success">
                                            <i class="fa-brands fa-apple"></i> Download for iOS
                                        </button>
                                    </div>
                                <div class="col"></div>
                            </div>
                        </div>
                    </div>
                </div>
                

                {{-- REVIEW TABS --}}
                <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab" tabindex="0">
                    <div class="container-fluid px-5 pt-2">
                        <div class="row text-center">
                            <div class="row mt-3">
                                <div class="col-12 col-md-3">
                                    <div class="bg-lightgrey p-3">
                                        Overall Ratings

                                        {{-- <div id="progress">
                                            <svg viewbox="0 0 110 100">
                                            <linearGradient id="gradient" x1="0" y1="0" x2="0" y2="100%">
                                            <stop offset="0%" stop-color="limegreen" />
                                            <stop offset="100%" stop-color="limegreen" />
                                            </linearGradient>
                                            <path class="grey" d="M30,90 A40,40 0 1,1 80,90" fill='none' />
                                            <path id="green" fill='none'  class="green" d="M30,90 A40,40 0 1,1 80,90" />

                                            <text x="50%" y="55%" dominant-baseline="middle" text-anchor="middle" class="rating">0.0</text>
                                            <text x="50%" y="75%" dominant-baseline="middle" text-anchor="middle" class="num-review">322 reviews</text>

                                            </svg>
                                        </div> --}}
                                        <br>
                                        <b class="fs-xxxl">3.6</b>
                                        <div class="star-review">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                            <i class="fa-regular fa-star"></i>
                                        </div>
                                        <p class="mt-3 mb-5">320 reviews</p>

                                        <b class="mt-5">Monthly Avg Rating</b>
                                        <div class="chart-wrapper">
                                            <canvas id="review_trend_chart"></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="testi-wrapper bg-grey">
                                        <img src="https://via.placeholder.com/50" alt="" class="profile-pic">
                                        <div class="author">
                                            Aviabee
                                            <br>
                                            <span class="since">
                                                Played since June 22
                                            </span>
                                        </div>

                                        <div class="star-review-sm">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                            <i class="fa-regular fa-star"></i>
                                        </div>

                                        <p class="comment">Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Magnam nihil, eaque amet nostrum cupiditate sapiente maxime cumque. Mollitia ab, pariatur alias nulla a quasi, veritatis odit necessitatibus debitis itaque? Dolorem mollitia modi iste magni sapiente sunt possimus aperiam totam temporibus consectetur. Dolor perspiciatis atque quae mollitia, explicabo culpa quam architecto.</p>
                                        <img src="https://via.placeholder.com/600x300" alt="" class="review-img">
                                        <img src="https://via.placeholder.com/600x300" alt="" class="review-img">
                                    </div>
                                    <div class="testi-wrapper bg-grey">
                                        <img src="https://via.placeholder.com/50" alt="" class="profile-pic">
                                        <div class="author">
                                            Aviabee
                                            <br>
                                            <span class="since">
                                                Played since June 22
                                            </span>
                                        </div>

                                        <div class="star-review-sm">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                            <i class="fa-regular fa-star"></i>
                                        </div>
                                        <p class="comment">Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Magnam nihil, eaque amet nostrum cupiditate sapiente maxime cumque. Mollitia ab, pariatur alias nulla a quasi, veritatis odit necessitatibus debitis itaque? Dolorem mollitia modi iste magni sapiente sunt possimus aperiam totam temporibus consectetur. Dolor perspiciatis atque quae mollitia, explicabo culpa quam architecto.</p>
                                        <img src="https://via.placeholder.com/300x600" alt="" class="review-img">
                                        <img src="https://via.placeholder.com/300x600" alt="" class="review-img">
                                    </div>
                                    <div class="testi-wrapper bg-grey">
                                        <img src="https://via.placeholder.com/50" alt="" class="profile-pic">
                                        <div class="author">
                                            Aviabee
                                            <br>
                                            <span class="since">
                                                Played since June 22
                                            </span>
                                        </div>

                                        <div class="star-review-sm">
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star"></i>
                                            <i class="fa-solid fa-star-half-stroke"></i>
                                            <i class="fa-regular fa-star"></i>
                                        </div>
                                        <p class="comment">Lorem ipsum, dolor sit amet consectetur, adipisicing elit. Magnam nihil, eaque amet nostrum cupiditate sapiente maxime cumque. Mollitia ab, pariatur alias nulla a quasi, veritatis odit necessitatibus debitis itaque? Dolorem mollitia modi iste magni sapiente sunt possimus aperiam totam temporibus consectetur. Dolor perspiciatis atque quae mollitia, explicabo culpa quam architecto.</p>
                                        <img src="https://via.placeholder.com/600x300" alt="" class="review-img">
                                        <img src="https://via.placeholder.com/600x300" alt="" class="review-img">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- INSIGHT TABS --}}
                <div class="tab-pane fade" id="insight" role="tabpanel" aria-labelledby="insight-tab" tabindex="0">
                    <div class="container-fluid p-5">
                        <div class="row text-center">
                            <div class="row mt-3">
                                <div class="col">
                                    <div class="bg-grey">
                                        <div class="row">
                                            <div class="col p-5 text-start">
                                                Discord Member
                                                <br>
                                                <span class="fs-1">200K</span>
                                                <br><br>
                                                Active Member
                                                <br>
                                                <span class="fs-1">3.3K</span>
                                                <br>
                                                <br>
                                                <button class="btn btn-success">
                                                    <i class="fa-brands fa-discord"></i> Join Discord
                                                </button>
                                            </div>
                                            <div class="col p-5">
                                                <div class="chart-wrapper-square">
                                                    <canvas id="discord_chart"></canvas>
                                                    <div class="percentage-active">1.64%<br>Active</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-grey mt-5">
                                        <div class="row">
                                            <div class="col p-5 text-start">
                                                Telegram Member
                                                <br>
                                                <span class="fs-1">200K</span>
                                                <br><br>
                                                Active Member
                                                <br>
                                                <span class="fs-1">3.3K</span>
                                                <br>
                                                <br>
                                                <button class="btn btn-success">
                                                    <i class="fa-brands fa-telegram"></i> Join Telegram
                                                </button>
                                            </div>
                                            <div class="col p-5">
                                                <div class="chart-wrapper-square">
                                                    <canvas id="tele_chart"></canvas>
                                                    <div class="percentage-active">1.64%<br>Active</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <a class="twitter-timeline" data-height="900" data-theme="dark" href="https://twitter.com/komoverse?ref_src=twsrc%5Etfw">Tweets by komoverse</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection

@section ('script')
<script>
var rating = 8.2;
var progress = (10 - rating) / 10;
$('.rating').text(rating);
$('#progress').find('#green').animate({'stroke-dashoffset': 198 * progress}, 1000);
</script>


<script>
  const ctx = document.getElementById('review_trend_chart');
    Chart.defaults.color = "rgba(200,200,200,0.6)";
    Chart.defaults.borderColor = "rgba(200,200,200,0.3)";
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
      datasets: [{
        label: '# Avg Review per Month',
        data: [3.4, 2.8, 4.2, 4.1, 3.8, 3.9, 3.4],
        borderWidth: 1,
        backgroundColor: ['rgba(0,200,0,0.5)'],
        borderColor: ['rgba(0,200,0,1)'],
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins: {
          legend: {
            display: false
          }
      }
    }
  });

    
  const discord_chart = document.getElementById('discord_chart');
  new Chart(discord_chart, {
    type: 'doughnut',
    data: {
      labels: ['Active Users', 'Total Users'],
      datasets: [{
        label: '# Users',
        data: [3300, 200000],
        borderColor: ['rgba(0,0,0,0.2)'],
        backgroundColor: ['#00FF00', 'grey'],
        borderWidth: 0,
      }]
    },
    options: {
      plugins: {
          legend: {
            display: false
          }
      }
    }
  });

  const tele_chart = document.getElementById('tele_chart');
  new Chart(tele_chart, {
    type: 'doughnut',
    data: {
      labels: ['Active Users', 'Total Users'],
      datasets: [{
        label: '# Users',
        data: [3300, 200000],
        borderColor: ['rgba(0,0,0,0.2)'],
        backgroundColor: ['#00FF00', 'grey'],
        borderWidth: 0,
      }]
    },
    options: {
      plugins: {
          legend: {
            display: false
          }
      }
    }
  });

</script>

<script>
function checkHash() {
    var hash = window.location.hash;
    if (hash == '') {
        hash = '#items';
    }
    $('.tab-pane').removeClass('active show');
    $(hash).addClass('active show');

    $('.nav-link').removeClass('active show');
    $('button[data-bs-target="'+hash+'"]').addClass('active show');
}

$(document).ready(function(){
    checkHash();
});

$(".nav-link").on('click', function(){
    var hashnew = $(this).attr('href');
    history.pushState(null, null, hashnew);
    checkHash();
});


$('#nft-wrapper div').on('click', function(){
    window.location.href = 'komochess/items/117';
})
</script>
@endsection