<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\APIController;
use App\Models\ReviewModel;
use Illuminate\Support\Facades\Validator;
use Session;

class ReviewController extends Controller
{

    // USER
    public function showGameReview(Request $req) {
        $game_data = (new APIController)->komoAPI_V2('GET', '/v2/game/'.$req->game_id, null);
        $data = [
            'game_data' => $game_data->data,
            'reviews' => ReviewModel::getReviewByGame($req->game_id),
            'overall' => ReviewModel::getOverallReview($req->game_id),
            'monthly_review' => ReviewModel::getAverageMonthlyRating($req->game_id),
        ];
        return view('user.game-review')->with($data);
    }

    public function submitReview(Request $req) {
        Validator::make($req->all(), [
            'game_id' => 'required|string',
            'rating' => 'required|numeric|min:0|max:5',
            'comment' => 'nullable|string',
        ])->validate();

        $review_data = [
            'game_id' => $req->game_id,
            'komo_username' => Session::get('userdata')->komo_username,
            'reviewer_photo_url' => Session::get('userdata')->profile_picture_url,
            'rating' => $req->rating,
            'comment' => $req->comment,
        ];

        if (ReviewModel::submitReview($review_data)) {
            return redirect()->back()->with('success', 'Review saved');
        } else {
            return redirect()->back()->with('error', 'Failed to review');
        }
    }
}
