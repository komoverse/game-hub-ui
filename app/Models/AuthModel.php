<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class AuthModel extends Model
{
    use HasFactory;

    static function checkLogin($req) {
        $result = DB::table('tb_useradmin_new')
                    ->where('username', $req->username)
                    ->first();
        return $result;
    }
}
