<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class MintModel extends Model
{
    use HasFactory;

    static function submitMint($req) {
        $insert = DB::table('tb_game_nft_mint')
                    ->insert([
                        'game_id' => $req->game_id,
                        'phase_name' => $req->phase_name,
                        'allowlist' => $req->allowlist,
                        'supply' => $req->supply,
                        'mint_price' => $req->mint_price,
                        'mint_page_url' => $req->mint_page_url,
                        'image_url' => $req->image_url,
                        'mint_start_date' => $req->mint_start_date,
                        'mint_end_date' => $req->mint_end_date,
                    ]);
        return $insert;
    }

    static function getMintByGame($game_id) {
        $result = DB::table('tb_game_nft_mint')
                    ->where('game_id', $game_id)
                    ->orderBy('mint_start_date', 'asc')
                    ->get();
        return $result;
    }

    static function getAllMint() {
        $result = DB::table('tb_game_nft_mint')
                    ->get();
        return $result;
    }
}
