<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class PartnershipModel extends Model
{
    use HasFactory;

    static function getPartnershipFromSlug($lang, $slug) {
        $result = DB::table('tb_partners_'.$lang)
                    ->where('visibility', '=', '1')
                    ->where('slug', '=', $slug)
                    ->first();
        return $result;
    }

    static function getFivePartners($lang) {
        $result = DB::table('tb_partners_'.$lang)
                    ->orderBy('is_pinned', 'desc')
                    ->orderBy('id', 'desc')
                    ->limit(5)
                    ->get();
        return $result;
    }

    static function getPartners($lang) {
        $result = DB::table('tb_partners_'.$lang)
                    ->orderBy('is_pinned', 'desc')
                    ->orderBy('id', 'desc')
                    ->paginate(20);
        return $result;
    }

    static function submitPartner($req, $featured_image) {
        if ($req->is_pinned == 1) {
            self::unpinPartner($req->language);
        }

        $insert = DB::table('tb_partners_'.$req->language)
                    ->insert([
                        'slug' => $req->slug,
                        'title' => $req->title,
                        'featured_image' => $featured_image,
                        'news_content' => $req->news_content,
                        'posted_by' => Session::get('admindata')->fullname,
                        'is_pinned' => $req->is_pinned,
                        'visibility' => $req->visibility,
                    ]);
        return $insert;
    }

    static function getSinglePartner($lang, $id) {
        $result = DB::table('tb_partners_'.$lang)
                    ->where('id', '=', $id)
                    ->first();
        return $result;
    }

    static function deletePartner($lang, $id) {
        $delete = DB::table('tb_partners_'.$lang)
                    ->where('id', '=', $id)
                    ->delete();
        return $delete;
    }

    static function unpinPartner($lang) {
        $update = DB::table('tb_partners_'.$lang)
                        ->update([
                            'is_pinned' => "0",
                        ]);
        return $update;
    }

    static function pinPartner($lang, $id) {
        self::unpinPartner($lang);
        $update = DB::table('tb_partners_'.$lang)
                        ->where('id', '=', $id)
                        ->update([
                            'is_pinned' => "1",
                        ]);
        return $update;
    }
}
