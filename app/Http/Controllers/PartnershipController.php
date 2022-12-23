<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartnershipModel;

class PartnershipController extends Controller
{

    // USER

    function showPartner() {
        $partnerdata = PartnershipModel::getPartnership('en');
        $data = [
            'lang' => 'en',
            'partnercontent' => $partnerdata,
        ];
        return view('user.partner-list')->with($data);
    }

    function showSinglePartner(Request $req) {
        $data = [
            'lang' => 'en',
            'partnercontent' => PartnershipModel::getPartnershipFromSlug('en', $req->slug),
        ];
        return view('user.partner-single')->with($data);
    }
}
