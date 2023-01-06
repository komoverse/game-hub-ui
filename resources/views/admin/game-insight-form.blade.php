@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h2>Update Insight</h2>
        </div>
    </div>
    <form action="{{ url('admin/game/insight/update') }}" method="POST">
        @csrf
        <div class="row mb-1">
            <div class="col-4">
                Game ID
            </div>
            <div class="col-4">
                @if (request()->game_id)
                <input type="text" class="form-control" name="game_id" value="{{ request()->game_id }}">
                @else 
                <select name="game_id" class="form-select">
                    @foreach ($game_list as $game)
                    <option value="{{ $game->game_id }}">{{ $game->game_name }}</option>
                    @endforeach
                </select>
                @endif
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-4">
                Discord Member
            </div>
            <div class="col-4">
                <input type="number" class="form-control" name="discord_member" value="{{ $insight->discord_member ?? '0' }}">
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-4">
                Discord Active
            </div>
            <div class="col-4">
                <input type="number" class="form-control" name="discord_active" value="{{ $insight->discord_active ?? '0' }}">
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-4">
                Telegram Member
            </div>
            <div class="col-4">
                <input type="number" class="form-control" name="telegram_member" value="{{ $insight->telegram_member ?? '0' }}">
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-4">
                Telegram Active
            </div>
            <div class="col-4">
                <input type="number" class="form-control" name="telegram_active" value="{{ $insight->telegram_active ?? '0' }}">
            </div>
        </div>
        <div class="row mb-1">
            <div class="col-4">
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save</button>
            </div>
        </div>
    </form>
</div>
@endsection
