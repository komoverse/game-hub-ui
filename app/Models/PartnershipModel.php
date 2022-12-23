<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class PartnershipModel extends Model
{
    use HasFactory;
    
    static function getPartnership($lang) {
        $result = DB::table('tb_partners_'.$lang)
                    ->orderBy('is_pinned', 'desc')
                    ->orderBy('id', 'desc')
                    ->paginate(20);
        return $result;
    }

    static function getPartnershipFromSlug($lang, $slug) {
        $result = DB::table('tb_partners_'.$lang)
                    ->where('visibility', '=', '1')
                    ->where('slug', '=', $slug)
                    ->first();
        return $result;
    }
}
