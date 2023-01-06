@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h2>Marketplace Create</h2>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12 col-md-6">
            <form action="{{ url('admin/game/marketplace/create') }}" method="POST">
                @csrf
                Game ID
                <select name="game_id" class="form-select mb-2">
                    <option value="" disabled="disabled" selected="selected">Choose Game...</option>
                    @foreach ($game_list as $game)
                    <option value="{{ $game->game_id }}">{{ $game->game_name }}</option>
                    @endforeach
                </select>
                NFT Creator Wallet Address <sup>*</sup>
                <input type="text" required="required" name="nft_creator_wallet" class="form-control mb-2">
                <button class="btn btn-success"><i class="fas fa-save"></i> Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
