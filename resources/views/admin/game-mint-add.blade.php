@extends('admin/template')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1>Create Game</h1>
        </div>
    </div>
    <form action="{{ url('admin/game/mints/add') }}" method="POST">
        @csrf
    <div class="row">
        <div class="col-6">
            <div class="row mb-2">
                <div class="col-4">Game</div>
                <div class="col-8">
                    <select name="game_id" class="form-select">
                        <option value="" disabled="disabled" selected="selected">Select Game...</option>
                        @foreach ($game_list as $game)
                        <option value="{{ $game->game_id }}">{{ $game->game_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-4">Mint Phase Name <sup>*</sup></div>
                <div class="col-8">
                    <input type="text" name="phase_name" required="required" placeholder="Presale Whitelist" class="form-control">
                </div>
            </div>
            
            <div class="row mb-2">
                <div class="col-4">Mint Start Time</div>
                <div class="col-8">
                    <input type="datetime-local" name="mint_start_date" required="required" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-4">Mint End Time</div>
                <div class="col-8">
                    <input type="datetime-local" name="mint_end_date" required="required" class="form-control">
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-4">Mint Price <sup>*</sup></div>
                <div class="col-8">
                    <input type="number" step="0.001" name="mint_price" placeholder="1.25" class="form-control" required="required">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-4">Supply <sup>*</sup></div>
                <div class="col-8">
                    <input type="number" step="1" required="required" placeholder="1000" name="supply" class="form-control">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-4">Allowlist <sup>*</sup></div>
                <div class="col-8"><textarea name="allowlist" row mb-2s="3" class="form-control" required="required"></textarea></div>
            </div>
            <div class="row mb-2">
                <div class="col-4">Mint Page URL</div>
                <div class="col-8">
                    <input type="url" name="mint_page_url" class="form-control" placeholder="https://someurl.com">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-4">Image URL (600x600)</div>
                <div class="col-8">
                    <input type="url" name="image_url" class="form-control" placeholder="https://someurl.com/image.webp">
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-4"></div>
                <div class="col-8">
                    <button class="btn btn-success"><i class="fas fa-save"></i> Submit</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
