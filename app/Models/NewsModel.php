<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class NewsModel extends Model
{
    use HasFactory;

    static function getFiveNews($lang) {
        $result = DB::table('tb_news_'.$lang)
                    ->orderBy('is_pinned', 'desc')
                    ->orderBy('right_pinned', 'desc')
                    ->orderBy('id', 'desc')
                    ->limit(5)
                    ->get();
        return $result;
    }

    static function getNews($lang) {
        $result = DB::table('tb_news_'.$lang)
                    ->orderBy('is_pinned', 'desc')
                    ->orderBy('right_pinned', 'desc')
                    ->orderBy('id', 'desc')
                    ->paginate(20);
        return $result;
    }

    static function submitNews($req, $featured_image) {
        $left_pinned = 0;
        $right_pinned = 0;
        if ($req->pinned_post == 'left') {
            self::unpinNews($req->language);
            $left_pinned = 1;
        } else if ($req->pinned_post == 'right') {
            self::unpinRightNews($req->language);
            $right_pinned = 1;
        }

        $insert = DB::table('tb_news_'.$req->language)
                    ->insert([
                        'slug' => $req->slug,
                        'title' => $req->title,
                        'featured_image' => $featured_image,
                        'news_content' => $req->news_content,
                        'posted_by' => Session::get('fullname'),
                        'is_pinned' => $left_pinned,
                        'right_pinned' => $right_pinned,
                        'visibility' => $req->visibility,
                    ]);
        return $insert;
    }

    static function getSingleNews($lang, $id) {
        $result = DB::table('tb_news_'.$lang)
                    ->where('id', '=', $id)
                    ->first();
        return $result;
    }

    static function deleteNews($lang, $id) {
        $delete = DB::table('tb_news_'.$lang)
                    ->where('id', '=', $id)
                    ->delete();
        return $delete;
    }

    static function unpinNews($lang) {
        $update = DB::table('tb_news_'.$lang)
                        ->update([
                            'is_pinned' => "0",
                        ]);
        return $update;
    }

    static function pinNews($lang, $id) {
        self::unpinNews($lang);
        $update = DB::table('tb_news_'.$lang)
                        ->where('id', '=', $id)
                        ->update([
                            'is_pinned' => "1",
                        ]);
        return $update;
    }

    static function unpinRightNews($lang) {
        $update = DB::table('tb_news_'.$lang)
                        ->update([
                            'right_pinned' => "0",
                        ]);
        return $update;
    }

    static function pinRightNews($lang, $id) {
        self::unpinRightNews($lang);
        $update = DB::table('tb_news_'.$lang)
                        ->where('id', '=', $id)
                        ->update([
                            'right_pinned' => "1",
                        ]);
        return $update;
    }
    
    static function getNewsFromSlug($lang, $slug) {
        $result = DB::table('tb_news_'.$lang)
                    ->where('visibility', '=', '1')
                    ->where('slug', '=', $slug)
                    ->first();
        return $result;
    }
}
