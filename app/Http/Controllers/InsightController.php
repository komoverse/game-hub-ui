<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InsightModel;
use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Validator;

class InsightController extends Controller
{
    function getInsightByGame(Request $req) {
        $insight = InsightModel::getInsightByGame($req->game_id);
        $game_data = (new APIController)->komoAPI_V2('GET', '/v2/game/'.$req->game_id);
        $data = [
            'game_data' => $game_data->data,
            'insight' => $insight,
        ];
        return view('user.game-insight')->with($data);
    }

    function updateInsight(Request $req) {
        Validator::make($req->all(), [
            'game_id' => 'required|string',
            'discord_member' => 'nullable|int',
            'discord_active' => 'nullable|int',
            'telegram_member' => 'nullable|int',
            'telegram_active' => 'nullable|int',
        ])->validate();

        $response = InsightModel::upsertInsight($req->except('_token'));
        if ($response) {
            return redirect('admin/game/insight')->with('success', 'Insight Updated');
        } else {
            return redirect('admin/game/insight')->with('error', 'Failed to update');
        }
    }

    function showGameInsight() {
        $data = [
            'insights' => InsightModel::getAllInsight(),
        ];
        return view('admin.game-insight')->with($data);
    }

    function showInsightForm(Request $req) {
        $gamedata = (new APIController)->komoAPI_V2('GET', '/v2/game');
        $data = [
            'game_list' => $gamedata->data,
            'insight' => InsightModel::getInsightByGame($req->game_id),
        ];
        return view('admin.game-insight-form')->with($data);
    }
}
