<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class MediaModel extends Model
{
    use HasFactory;

    static function getMedia() {
        $result = DB::table('tb_media_upload')
                    ->orderBy('uploaded', 'desc')
                    ->paginate(100);
        return $result;
    }

    static function addMediaDatabase($filename) {
        $insert = DB::table('tb_media_upload')
                    ->insert([
                        'filename' => $filename,
                        'upload_by' => Session::get('admindata')->username,
                    ]);
        return $insert;
    }
}
