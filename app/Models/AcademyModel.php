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

    static function getFiveAcademy($lang) {
        $result = DB::table('tb_academy_'.$lang)
                    ->orderBy('is_pinned', 'desc')
                    ->orderBy('id', 'desc')
                    ->limit(5)
                    ->get();
        return $result;
    }

    static function submitAcademy($req, $featured_image) {
        if ($req->is_pinned == 1) {
            self::unpinAcademy($req->language);
        }

        $insert = DB::table('tb_academy_'.$req->language)
                    ->insert([
                        'slug' => $req->slug,
                        'title' => $req->title,
                        'featured_image' => $featured_image,
                        'news_content' => $req->news_content,
                        'posted_by' => Session::get('admindata')->fullname,
                        'is_pinned' => $req->is_pinned,
                        'visibility' => $req->visibility,
                        'level' => $req->level,
                    ]);
        return $insert;
    }

    static function getSingleAcademy($lang, $id) {
        $result = DB::table('tb_academy_'.$lang)
                    ->where('id', '=', $id)
                    ->first();
        return $result;
    }

    static function deleteAcademy($lang, $id) {
        $delete = DB::table('tb_academy_'.$lang)
                    ->where('id', '=', $id)
                    ->delete();
        return $delete;
    }

    static function unpinAcademy($lang) {
        $update = DB::table('tb_academy_'.$lang)
                        ->update([
                            'is_pinned' => "0",
                        ]);
        return $update;
    }

    static function pinAcademy($lang, $id) {
        self::unpinAcademy($lang);
        $update = DB::table('tb_academy_'.$lang)
                        ->where('id', '=', $id)
                        ->update([
                            'is_pinned' => "1",
                        ]);
        return $update;
    }
}
