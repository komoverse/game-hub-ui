<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Hash;
use Session;

class AuthModel extends Model
{
    use HasFactory;

    static function getAdmin($username) {
        $result = DB::table('tb_useradmin_new')
                    ->where('username', $username)
                    ->first();
        return $result;
    }

    static function changeAdminPassword($req) {
        $update = DB::table('tb_useradmin_new')
                    ->where('username', Session::get('admindata')->username)
                    ->update([
                        'password' => Hash::make($req->new_password)
                    ]);
        return $update;
    }
}
