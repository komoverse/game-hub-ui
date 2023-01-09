<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Validator;

class MarketplaceController extends Controller
{
    public function showMarketplace() {
        $marketplace_list = (new APIController)->komoAPI_V2('GET', '/v2/market/list');
        $data = [
            'marketplace_list' => $marketplace_list->data,
        ];
        return view('admin.game-marketplace')->with($data);
    }

    public function showMarketplaceCreateForm() {
        $game_list = (new APIController)->komoAPI_V2('GET', '/v2/game');
        $data = [
            'game_list' => $game_list->data,
        ];
        return view('admin.game-marketplace-add')->with($data);
    }

    public function submitCreateMarketplace(Request $req) {
        Validator::make($req->all(), [
            'game_id' => 'required|string',
            'nft_creator_wallet' => 'required|string|min:30|max:50',
        ])->validate();

        $exec_create = (new APIController)->komoAPI_V2('POST', '/v2/market/create', $req->all());
        if ($exec_create->error) {
            return redirect()->back()->with('error', $exec_create->error);
        }
        dd($exec_create);
    }

    // USER
    public function showGameMarketplaceListing(Request $req) {
        $api_data = [
            'game_id' => $req->game_id,
        ];
        $mp_data = (new APIController)->komoAPI_V2('GET', '/v2/market/listings', $api_data);

        $game_data = (new APIController)->komoAPI_V2('GET', '/v2/game/'.$req->game_id);
        $data = [
            'game_data' => $game_data->data,
            'mp_listing' => $mp_data,
        ];
        return view('user.game-market')->with($data);
    }

    public function showSingleListing(Request $req) {
        $api_data = [
            'game_id' => $req->game_id,
            'list_id' => $req->list_id,
        ];
        $mp_data = (new APIController)->komoAPI_V2('GET', '/v2/market/item/'.$req->game_id.'/'.$req->list_id);

        $game_data = (new APIController)->komoAPI_V2('GET', '/v2/game/'.$req->game_id);
        $data = [
            'game_data' => $game_data->data,
            'listing' => $mp_data,
        ];
        return view('user.game-market-listing')->with($data);
    }
}
