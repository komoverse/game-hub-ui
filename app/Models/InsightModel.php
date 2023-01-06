<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class InsightModel extends Model
{
    use HasFactory;

    static function getInsightByGame($game_id) {
        $result = DB::table('tb_game_insight')
                    ->where('game_id', $game_id)
                    ->first();
        return $result;
    }

    static function upsertInsight($req) {
        $upsert = DB::table('tb_game_insight')
                    ->upsert($req, ['game_id'], [
                        'discord_member',
                        'discord_active',
                        'telegram_member',
                        'telegram_active',
                    ]);
        return $upsert;
    }

    static function getAllInsight() {
        $result = DB::table('tb_game_insight')
                    ->get();
        return $result;
    }
}
