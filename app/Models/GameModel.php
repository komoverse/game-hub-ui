<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class GameModel extends Model
{
    use HasFactory;

    static function getPlayLink($game_id) {
        $result = DB::table('tb_game_links')
                    ->where('game_id', $game_id)
                    ->get();
        return $result;
    }

    static function getPlayLinkAllGames() {
        $result = DB::table('tb_game_links')
                    ->get();
        return $result;
    }

    static function submitLinks($req) {
        $insert = DB::table('tb_game_links')
                    ->insert([
                        'game_id' => $req->game_id,
                        'fa_icons' => $req->fa_icons,
                        'download_for' => $req->download_for,
                        'link' => $req->link,
                    ]);
        return $insert;
    }

    static function deleteLinks($id) {
        $delete = DB::table('tb_game_links')
                    ->where('id', $id)
                    ->delete();
        return $delete;
    }
}
