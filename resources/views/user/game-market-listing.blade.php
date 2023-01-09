@extends('user.game-detail')
@section('content')
<div class="container-fluid">
    <div class="row px-5">
        <div class="col-12">
            <span class="fs-2">Buy NFT</span>
            <br>
            <a style="text-decoration: none" href="{{ url(request()->game_id.'/items') }}"><i class="fas fa-chevron-left my-3"></i> Return to Items</a>
        </div>
        <div class="col-12 col-md-5 mb-3">
            <img src="{{ $listing->data->nft->cached_image_uri }}" alt="">
        </div>
        <div class="col-12 col-md-7">
            <div class="bg-grey">
                <div class="row mb-3 p-3">
                    <div class="col-12 col-md-6">
                        <span class="nft-number fs-2">{{ $listing->data->nft->name }}</span>
                    </div>
                    <div class="col-12 col-md-3 d-flex justify-content-end">
                        <table>
                            <tr>
                                <td>
                                    <img src="https://solana.com/src/img/branding/solanaLogoMark.svg" style="height: 30px" alt="">
                                </td>
                                <td class="ps-3 text-center">
                                    <b class="fs-5">{{ $listing->data->price }} {{ $listing->data->currency_symbol }}</b>
                                    {{-- <br>20.52 USD --}}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12 col-md-3 d-flex justify-content-end">
                        <button class="btn btn-success form-control">BUY NOW</button>
                    </div>
                </div>
            </div>

            <div class="bg-grey px-3 py-2 mb-3">
                <div class="row">
                    <div class="col-12 mt-3">
                        <span class="grey d-block">Seller</span>
                        <span class="fs-4">{{ $listing->data->seller_username }}</span> <span class="grey" style="font-size:0.8rem">({{ substr($listing->data->seller_address, 0, 4).'...'.substr($listing->data->seller_address, strlen($listing->data->seller_address) - 4, 4) }})</span>
                    </div>
                    <div class="col-12 mt-5">
                        <p class="d-block grey">Attributes</p>
                        <div class="row">
                            @foreach ($listing->data->nft->attributes_array as $attr)
                            <div class="col-12 col-md-6 mb-2">
                                <span class="d-block grey">{{ $attr->trait_type }}</span>
                                <p>
                                {{ $attr->value }}
                                </p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
           {{--  <div class="bg-grey px-3 py-2 mb-5">
                <table class="table table-dark table-striped text-center table-activity">
                    <thead>
                        <tr>
                            <th>BUYER</th>
                            <th>SELLER</th>
                            <th>PRICE</th>
                            <th>TIME</th>
                        </tr>
                    </thead>
                    <tbody class="text-start">
                        <tr>
                            <td>
                                polycrest 
                                <span class="fs-7">(BwkQ...prW7)</span>
                            </td>
                            <td>
                                Aviabee 
                                <span class="fs-7">(nikk...kUaP)</span>
                            </td>
                            <td>
                                <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> 1.24 SOL
                            </td>
                            <td>
                                <span class="limegreen">
                                    1 hour ago
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Aviabee 
                                <span class="fs-7">(nikk...kUaP)</span>
                            </td>
                            <td>
                                polycrest 
                                <span class="fs-7">(BwkQ...prW7)</span>
                            </td>
                            <td>
                                <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> 1.24 SOL
                            </td>
                            <td>
                                <span class="limegreen">
                                    1 hour ago
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                polycrest 
                                <span class="fs-7">(BwkQ...prW7)</span>
                            </td>
                            <td>
                                Aviabee 
                                <span class="fs-7">(nikk...kUaP)</span>
                            </td>
                            <td>
                                <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> 1.24 SOL
                            </td>
                            <td>
                                <span class="limegreen">
                                    1 hour ago
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Aviabee 
                                <span class="fs-7">(nikk...kUaP)</span>
                            </td>
                            <td>
                                polycrest 
                                <span class="fs-7">(BwkQ...prW7)</span>
                            </td>
                            <td>
                                <img src="{{ url('assets/img/solana.png') }}" alt="" style="height: 20px"> 1.24 SOL
                            </td>
                            <td>
                                <span class="limegreen">
                                    1 hour ago
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div> --}}
        </div> 
    </div>
</div>
@endsection