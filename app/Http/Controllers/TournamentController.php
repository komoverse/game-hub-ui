<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\SystemModel;
use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Validator;

class TournamentController extends Controller
{
    function adminShowTournament() {
        $tournaments = (new APIController)->komoAPI_V2('GET', '/v2/tournament/list', null);
        $data = [
            'tournaments' => $tournaments->data,
        ];
        return view('admin.tournament-list')->with($data);
    }

    function createTournamentForm() {
        $data = [
            'game_list' => (new APIController)->komoAPI_V2('GET', '/v2/game', null)->data,
        ];
        return view('admin.tournament-create')->with($data);
    }

    function createTournamentSubmit(Request $req) {
        $response = (new APIController)->komoAPI_V2('POST', '/v2/tournament/create', $req->all());
        if ($response->status == 'success') {
            return redirect('admin/game/tournament')->with('success', $response->message);
        } else {
            return back()->withInput()->with('error', $response->message);
        }
    }

    // USER
    function showTournament(Request $req) {
        $api_request = [
            'game_id' => $req->game_id,
            'status' => 'ongoing',
        ];
        $ongoing_tournaments = (new APIController)->komoAPI_V2('GET', '/v2/tournament/list', $api_request);

        $api_request = [
            'game_id' => $req->game_id,
            'status' => 'upcoming',
        ];
        $upcoming_tournaments = (new APIController)->komoAPI_V2('GET', '/v2/tournament/list', $api_request);
        $game_data = (new APIController)->komoAPI_V2('GET', '/v2/game/'.$req->game_id, null);
        $data = [
            'game_data' => $game_data->data,
            'ongoing_tournaments' => $ongoing_tournaments->data,
            'upcoming_tournaments' => $upcoming_tournaments->data,
        ];
        if (!empty($game_data->data)) {
            return view('user.game-overview')->with($data);
        } else {
            abort(404);
        }
        return view('user.tournament')->with($data);
    }
}
