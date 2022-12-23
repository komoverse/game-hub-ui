<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademyModel;

class AcademyController extends Controller
{
    // USER

    function showAcademy() {
        $academydata = AcademyModel::getAcademy('en');
        $data = [
            'lang' => 'en',
            'academycontent' => $academydata,
        ];
        return view('user.academy-list')->with($data);
    }

    function showSingleAcademy(Request $req) {
        $data = [
            'lang' => 'en',
            'academycontent' => AcademyModel::getAcademyFromSlug('en', $req->slug),
        ];
        return view('user.academy-single')->with($data);
    }
}
