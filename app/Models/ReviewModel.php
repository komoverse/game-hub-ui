<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class ReviewModel extends Model
{
    use HasFactory;

    static function getOverallReview($game_id) {
        $result = DB::table('tb_game_review')
                    ->where('game_id', $game_id)
                    ->select(DB::raw('AVG(rating) as overall_rating, COUNT(id) as total_reviews'))
                    ->first();
        return $result;
    }

    static function getReviewByGame($game_id) {
        $result = DB::table('tb_game_review')
                    ->where('game_id', $game_id)
                    ->orderBy('created_at', 'desc')
                    ->paginate(5);
        return $result;
    }

    static function getAverageMonthlyRating($game_id) {
        DB::statement("SET SQL_MODE=''");
        $result = DB::table('tb_game_review')
                    ->orderBy('created_at', 'asc')
                    ->where('created_at', '>=', date('Y-m-d', strtotime('first day of 5 months ago')).' 00:00:00')
                    ->groupBy(DB::raw("DATE_FORMAT(created_at,'%Y-%m')"))
                    ->select(DB::raw('AVG(rating) AS avg_rating, MONTHNAME(created_at) as review_month'))
                    ->get();
        return $result;
    }

    static function submitReview($req) {
        $insert = DB::table('tb_game_review')
                    ->insert($req);
        return $insert;
    }
}
