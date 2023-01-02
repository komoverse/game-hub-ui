<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Validator;
use App\Models\SystemModel;
use App\Models\GameModel;

class GameController extends Controller
{
    function adminShowGameList() {
        $api_request = [
            'orderBy' => 'game_name',
        ];
        $links = GameModel::getPlayLinkAllGames();
        $links_array = [];
        if (count($links) > 0) {
            foreach ($links as $row) {
                $links_array[$row->game_id][$row->id] = $row;
            }
        }
        $data = [
            'games' => (new APIController)->komoAPI_V2('GET', '/v2/game', $api_request)->data,
            'links_array' => $links_array,
        ];
        return view('admin.games')->with($data);
    }

    function createGameForm() {
        return view('admin.games-create');
    }

    function createGameSubmit(Request $req) {
        Validator::make($req->all(), [
            'game_id' => 'required|string',
            'game_name' => 'required|string',
            'genre' => 'required|string',
            'description' => 'required|string',
            'logo_image_url' => 'required|url',
            'hero_banner_url' => 'nullable|url',
            'developer_name' => 'required|string',
            'web_url' => 'nullable|url',
            'twitter_url' => 'nullable|url',
            'discord_url' => 'nullable|url',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'trailer_url' => 'nullable|url',
        ])->validate();

        $response = (new APIController)->komoAPI_V2('POST', '/v2/game/create', $req->all());
        if ($response) {
            SystemModel::addSystemLog('Add New Game ID : '.$req->game_id);
            return redirect('admin/game/list')->with('success', $response->message);
        } else {
            return redirect('admin/game/list')->with('error', $response->message);
        }
    }

    function showLinksForm(Request $req) {
        $links = GameModel::getPlayLink($req->game_id);
        $data = [
            'game_id' => $req->game_id,
            'links' => $links,
        ];
        return view('admin.game-links')->with($data);
    }

    function submitLinks(Request $req) {
        Validator::make($req->all(), [
            'game_id' => 'required|string',
            'fa_icons' => 'nullable|string',
            'download_for' => 'nullable|string',
            'link' => 'required|url',
        ])->validate();

        if (GameModel::submitLinks($req)) {
            return redirect()->back()->with('success', 'Link Added');
        } else {
            return redirect()->back()->with('error', 'Link Failed');
        }
    }

    function deleteLinks(Request $req) {
        if (GameModel::deleteLinks($req->id)) {
            return redirect()->back()->with('success', 'Link Deleted');
        } else {
            return redirect()->back()->with('error', 'Failed Delete');
        }
    }

    // USER

    function showGameList() {
        $api_request = [
            'orderBy' => 'game_name',
        ];
        $data = [
            'games' => (new APIController)->komoAPI_V2('GET', '/v2/game', $api_request)->data,
        ];
        return view('user.games')->with($data);
    }

    function showGameOverview(Request $req) {
        $response = (new APIController)->komoAPI_V2('GET', '/v2/game/'.$req->game_id);
        $data = [
            'game_data' => $response->data,
        ];
        if (!empty($response->data)) {
            return view('user.game-overview')->with($data);
        } else {
            abort(404);
        }
    }

    function showPlayNow(Request $req) {
        $response = (new APIController)->komoAPI_V2('GET', '/v2/game/'.$req->game_id);
        $data = [
            'game_data' => $response->data,
            'links' => GameModel::getPlayLink($req->game_id),
        ];
        return view('user.game-play-now')->with($data);
    }
}
