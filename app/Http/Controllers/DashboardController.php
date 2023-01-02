<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SystemModel;

class DashboardController extends Controller
{
    function showDashboard() {
        return view('admin.dashboard');
    }

    function showSystemLog() {
        $data = [
            'log' => SystemModel::getSystemLog(),
        ];
        return view('admin/system-log')->with($data);
    }
}
