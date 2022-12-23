<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class AcademyModel extends Model
{
    use HasFactory;
    
    static function getAcademy($lang) {
        $result = DB::table('tb_academy_'.$lang)
                    ->orderBy('is_pinned', 'desc')
                    ->orderBy('id', 'desc')
                    ->paginate(20);
        return $result;
    }

    static function getAcademyFromSlug($lang, $slug) {
        $result = DB::table('tb_academy_'.$lang)
                    ->where('visibility', '=', '1')
                    ->where('slug', '=', $slug)
                    ->first();
        return $result;
    }
}
