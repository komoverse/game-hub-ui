@extends('admin/template')
@section('content')
<div class="container-fluid p-0">
    <div class="row">
        <div class="col-12">
            <h2>Create Tournament</h2>
        </div>
    </div>
    <form action="{{ url('admin/game/tournament/create') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="row mt-2">
                <div class="col-4">Game <sup>*</sup></div>
                <div class="col-8">
                    <select name="game_id" class="form-select" required="required">
                        <option value="" disabled="disabled" selected="selected">Select Game...</option>
                        @foreach ($game_list as $row)
                        <option value="{{ $row->game_id }}">{{ $row->game_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-4">Tournament Name <sup>*</sup></div>
                <div class="col-8">
                    <input type="text" class="form-control" name="tournament_name" required="required">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-4">Image URL</div>
                <div class="col-8">
                    <input type="url" name="image_url" class="form-control" name="tournament_name">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-4">Tournament Type <sup>*</sup></div>
                <div class="col-8">
                    <select name="tournament_type" id="" class="form-select">
                        <option value="" disabled="disabled" selected="selected">Choose Type...</option>
                        <option value="leaderboard">Leaderboard</option>
                        <option value="single_elim">Single Elimination Bracket</option>
                        <option value="round_robin">Round Robin</option>
                    </select>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-4">Prize Pool <sup>*</sup></div>
                <div class="col-8">
                    <input type="text" class="form-control" name="prize_pool" required="required">
                </div>
            </div>
            
            <div class="row mt-2">
                <div class="col-4">Participant Limit <sup>*</sup></div>
                <div class="col-8">
                    <input step="1" type="number" value="0" class="form-control" name="participant_limit" required="required">
                </div>
            </div>
            
            <div class="row mt-2">
                <div class="col-4">Start Time <sup>*</sup></div>
                <div class="col-8">
                    <input type="datetime-local" class="form-control" name="start_time" required="required">
                </div>
            </div>
            
            <div class="row mt-2">
                <div class="col-4">End Time <sup>*</sup></div>
                <div class="col-8">
                    <input type="datetime-local" class="form-control" name="end_time" required="required">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-4">Description <sup>*</sup></div>
                <div class="col-8">
                    <textarea name="description" class="form-control" rows="5"></textarea>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-4"></div>
                <div class="col-8">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Submit</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
