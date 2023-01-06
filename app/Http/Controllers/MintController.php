<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MintModel;
use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Validator;

class MintController extends Controller
{
    public function showMintForm() {
        $game_list = (new APIController)->komoAPI_V2('GET', '/v2/game');
        $data = [
            'game_list' => $game_list->data,
        ];
        return view('admin.game-mint-add')->with($data);
    }

    public function showMintList() {
        $data = [
            'mints' => MintModel::getAllMint(),
        ];
        return view('admin.game-mint-list')->with($data);
    }

    public function submitMint(Request $req) {
        Validator::make($req->all(), [
            'game_id' => 'required|string',
            'phase_name' => 'required|string',
            'allowlist' => 'required|string',
            'supply' => 'required|integer',
            'mint_price' => 'required|numeric',
            'mint_page_url' => 'nullable|url',
            'image_url' => 'nullable|url',
            'mint_start_date' => 'nullable|date',
            'mint_end_date' => 'nullable|date',
        ])->validate();

        if (MintModel::submitMint($req)) {
            return redirect('admin/game/mints')->with('success', 'Mint saved');
        } else {
            return redirect('admin/game/mints')->with('error', 'Mint failed to save');
        }
    }

    // USER

    public function getMintByGame(Request $req) {
        $game_data = (new APIController)->komoAPI_V2('GET', '/v2/game/'.$req->game_id, null);
        $data = [
            'game_data' => $game_data->data,
            'mints' => MintModel::getMintByGame($req->game_id),
        ];
        return view('user.game-mint')->with($data);
    }
}
