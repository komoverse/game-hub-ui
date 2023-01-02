@extends('user.game-detail')
@section('game-content')
<div class="container-fluid p-5">
    @foreach ($ongoing_tournaments as $tournament)
    <div class="row">
        <div class="col-12 col-md-4">
            <img src="{{ $tournament->image_url }}" onerror="this.onerror=null;this.src='https://via.placeholder.com/600';" alt="">
        </div>
        <div class="col-12 col-md-8">
            <div class="bg-grey mb-3 p-3">
                <h3>{{ $tournament->tournament_name }}</h3>
                <a href="{{ url($tournament->game_id.'/play-now') }}" class="btn btn-success my-2 px-5">
                    PLAY NOW
                </a>

                <div class="row fs-7 mt-3">
                    <div class="col-12 col-md-3 p-2">
                        <div class="bg-lightgrey p-2 h-100">
                            <span class="limegreen">Prize</span>
                            <p>{{ $tournament->prize_pool }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 p-2">
                        <div class="bg-lightgrey p-2 h-100">
                            <span class="limegreen">Tournament Dates</span>
                            <p>{{ $tournament->start_time }}<br>to<br>{{ $tournament->end_time }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 p-2">
                        <div class="bg-lightgrey p-2 h-100">
                            <span class="limegreen">Description</span>
                            <p>{{ $tournament->description }}</p>
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
    @endforeach
    @foreach ($upcoming_tournaments as $tournament)
    <div class="row">
        <div class="col-12 col-md-4">
            <img src="{{ $tournament->image_url }}" onerror="this.onerror=null;this.src='https://via.placeholder.com/600';" alt="">
        </div>
        <div class="col-12 col-md-8">
            <div class="bg-grey mb-3 p-3">
                <h3>{{ $tournament->tournament_name }}</h3>
                <button class="btn btn-secondary disabled my-2 px-5">
                    PLAY NOW
                </button>

                <div class="row fs-7 mt-3">
                    <div class="col-12 col-md-3 p-2">
                        <div class="bg-lightgrey p-2 h-100">
                            <span class="limegreen">Prize</span>
                            <p>{{ $tournament->prize_pool }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-3 p-2">
                        <div class="bg-lightgrey p-2 h-100">
                            <span class="limegreen">Tournament Dates</span>
                            <p>{{ $tournament->start_time }}<br>to<br>{{ $tournament->end_time }}</p>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 p-2">
                        <div class="bg-lightgrey p-2 h-100">
                            <span class="limegreen">Description</span>
                            <p>{{ $tournament->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection