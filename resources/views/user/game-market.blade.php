@extends('user.game-detail')
@section('game-content')
<div class="container-fluid p-0">
    <div class="d-flex mb-3 filter-wrapper">
        <div class="border-right-white w-25">
            <div class="fs-6 p-3">FILTERS</div>
            <div class="bg-grey p-3">
                <div class="row">
                    <div class="col-3 img-preview">
                        <img src="{{ url('assets/img/shiwudu_wallpaper.webp') }}" alt="">
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
                    Head
                    </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <select class="form-select bg-dark text-light" multiple>
                                <option value="">Lizard Dark</option>
                                <option value="">Lizard Earth</option>
                                <option value="">Lizard Fire</option>
                                <option value="">Lizard Light</option>
                                <option value="">Lizard Water</option>
                                <option value="">Lizard Wind</option>
                                <option value="">Chameleon Dark</option>
                                <option value="">Chameleon Earth</option>
                                <option value="">Chameleon Fire</option>
                                <option value="">Chameleon Light</option>
                                <option value="">Chameleon Water</option>
                                <option value="">Chamelon Wind</option>
                                <option value="">Komodo Dark</option>
                                <option value="">Komodo Earth</option>
                                <option value="">Komodo Fire</option>
                                <option value="">Komodo Light</option>
                                <option value="">Komodo Water</option>
                                <option value="">Komodo Wind</option>
                                <option value="">Dragon Dark</option>
                                <option value="">Dragon Earth</option>
                                <option value="">Dragon Fire</option>
                                <option value="">Dragon Light</option>
                                <option value="">Dragon Water</option>
                                <option value="">Dragon Wind</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Body
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <select name="" id="" class="form-select bg-dark text-light" multiple>
                                <option value="">Aztec Warrior</option>
                                <option value="">Batik</option>
                                <option value="">Camo Armor</option>
                                <option value="">Desert Armor</option>
                                <option value="">Joseon</option>
                                <option value="">Julius Caesar</option>
                                <option value="">Mage</option>
                                <option value="">Medieval Armor</option>
                                <option value="">Monk</option>
                                <option value="">Pirate</option>
                                <option value="">Samurai</option>
                                <option value="">Sherwani</option>
                                <option value="">Space Suit</option>
                                <option value="">Tuxedo</option>
                                <option value="">Viking</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Headpieces
                    </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <select name="" id="" class="form-select bg-dark text-light" multiple>
                                <option value="">Blangkon</option>
                                <option value="">Caesar Golden Leaf Crown</option>
                                <option value="">Chinese Vampire</option>
                                <option value="">Halo</option>
                                <option value="">Kamikaze Headband</option>
                                <option value="">King Crown</option>
                                <option value="">Magician Hat</option>
                                <option value="">Monocle</option>
                                <option value="">Pilot Helmet</option>
                                <option value="">Pirate Hat</option>
                                <option value="">Roman Helmet</option>
                                <option value="">Samurai Helmet</option>
                                <option value="">Viking Helmet</option>
                                <option value="">Visor</option>
                                <option value="">Wizard Hat</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Weapon
                    </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <select name="" id="" class="form-select bg-dark text-light" multiple>
                                <option value="">Barbed Wire Baseball Bat</option>
                                <option value="">Boomerang</option>
                                <option value="">Butterfly Knife</option>
                                <option value="">Deagle</option>
                                <option value="">Katana</option>
                                <option value="">Kris</option>
                                <option value="">Orb</option>
                                <option value="">Pudao</option>
                                <option value="">Revolver</option>
                                <option value="">Sci Fi Gun</option>
                                <option value="">Schyte</option>
                                <option value="">Staff</option>
                                <option value="">Tridents</option>
                                <option value="">Viking Axe</option>
                                <option value="">Zeus Lightning Bolt</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-75">
            <div class="container-fluid">
                <div class="row px-3" id="nft-wrapper">
                    @foreach ($mp_listing->listings as $listing)
                    <div class="col-12 col-lg-3 p-2">
                        <a href="{{ url(request()->game_id.'/item').'/'.$listing->listing_id }}" class="no-decor-link">
                            <div class="bg-grey">
                                <div class="image-wrapper">
                                    <img src="{{ $listing->NFTs->image_uri }}" alt="">
                                </div>
                                {{ $listing->NFTs->name }}
                                <div class="price">
                                    <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> {{ $listing->listing_price }} SOL
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection