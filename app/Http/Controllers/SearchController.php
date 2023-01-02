<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Validator;
use App\Models\NewsModel;
use App\Models\AcademyModel;
use App\Models\PartnershipModel;

class SearchController extends Controller
{
    public function search(Request $req) {
        Validator::make($req->all(), [
            'search_query' => 'required|string',
        ])->validate();

        $api_request = [
            'search_query' => $req->search_query,
        ];
        $game_search = (new APIController)->komoAPI_V2('POST', '/v2/game/search', $api_request);
        $news_search = NewsModel::search($req->search_query);
        $academy_search = AcademyModel::search($req->search_query);
        $partner_search = PartnershipModel::search($req->search_query);

        $response = [
            'search_query' => $req->search_query,
            'game' => $game_search->search_result,
            'news' => $news_search->toArray(),
            'academy' => $academy_search->toArray(),
            'partner' => $partner_search->toArray(),
        ];
        return view('user.search-result')->with($response);
    }
}
