@extends('user.game-detail')
@section('game-content')
<div class="container-fluid p-5">
    @if (count($mints) == 0) 
        <div class="row py-5">
            <div class="col"></div>
            <div class="col-4 py-5">
                <center>
                <h2>No Mint Schedule</h2>
                Game currently don't have mint schedule
                </center>
            </div>
            <div class="col"></div>
        </div>
    @endif
    @foreach ($mints as $mint)
    <div class="row bg-grey mb-5">
        <div class="col-12 col-md-4">
            <img src="{{ $mint->image_url }}" onerror="this.onerror=null;this.src='https://via.placeholder.com/600';" alt="">
        </div>
        <div class="col-12 col-md-8">
            <div class="mb-3 p-3">
                <h3>{{ $mint->phase_name }}</h3>
                @if ((strtotime('now') >= strtotime($mint->mint_start_date)) && (strtotime('now') <= strtotime($mint->mint_end_date)))
                <a href="{{ $mint->mint_page_url }}" class="btn btn-success my-2 px-5">
                    MINT NOW
                </a>
                @else
                <button class="btn btn-secondary disabled my-2 px-5">COMING SOON</button>
                @endif

                <div class="row fs-7 mt-3">
                    <div class="col-12 col-md-3 p-2">
                        <div class="bg-lightgrey p-2 h-100">
                            <span class="limegreen">Supply</span>
                            <p>{{ $mint->supply }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 p-2">
                        <div class="bg-lightgrey p-2 h-100">
                            <span class="limegreen">Mint Price</span>
                            <p>{{ $mint->mint_price }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 p-2">
                        <div class="bg-lightgrey p-2 h-100">
                            <span class="limegreen">Mint Schedule</span>
                            <p>{{ $mint->mint_start_date }} to {{ $mint->mint_end_date }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 p-2">
                        <div class="bg-lightgrey p-2 h-100">
                            <span class="limegreen">Allowlist</span>
                            <p>{{ $mint->allowlist }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection