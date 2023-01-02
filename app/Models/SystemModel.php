<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use Session;

class SystemModel extends Model
{
    use HasFactory;

    static function addSystemLog($action) {
        $insert = DB::table('tb_system_log')
                    ->insert([
                        'username' => Session::get('admindata')->username,
                        'action' => $action,
                    ]);
        return $insert;
    }

    static function getSystemLog() {
        $result = DB::table('tb_system_log')
                    ->orderBy('id', 'desc')
                    ->paginate(100);
        return $result;
    }
}
