<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartnershipModel;
use App\Models\SystemModel;

class PartnershipController extends Controller
{
    // ADMIN
    function adminShowPartners() {
        $data = [
            'partners_en' => PartnershipModel::getFivePartners('en'),
            'partners_id' => PartnershipModel::getFivePartners('id'),
            'partners_zh' => PartnershipModel::getFivePartners('zh'),
            'partners_ur' => PartnershipModel::getFivePartners('ur'),
        ];
        return view('admin/partner-list')->with($data);
    }

    function adminShowPartnersSingleLang(Request $req) {
        $data = [
            'lang' => $req->lang,
            'partner' => PartnershipModel::getPartners($req->lang),
        ];
        return view('admin/partner-list-single-lang')->with($data);
    }

    function showAddPartnerForm() {
        return view('admin/partner-add');
    }

    function submitPartner(Request $req) {
        $featured_image = $req->featured_image;

        if (PartnershipModel::submitPartner($req, $featured_image)) {
            SystemModel::addSystemLog('Posted partner : '.$req->title);
            return redirect('admin/partner/list')->with('success', 'News published');
        } else {
            return redirect()->back()->with('error', 'Failed to publish partner');
        }
    }

    function deletePartner(Request $req) {
        $partnerdata = PartnershipModel::getSinglePartner($req->lang, $req->id);

        if (PartnershipModel::deletePartner($req->lang, $req->id)) {
            SystemModel::addSystemLog('Deleted partner : '.$partnerdata->title);
            return redirect('admin/partner/list')->with('success', 'News deleted');
        }
    }

    function pinPartner(Request $req) {
        if (PartnershipModel::pinPartner($req->lang, $req->id)) {
            return redirect('admin/partner/list');
        } else {
            return redirect('admin/partner/list')->with('error', 'Failed to change pinned partnership');
        }
    }

    function unpinPartner(Request $req) {
        if (PartnershipModel::unpinPartner($req->lang)) {
            return redirect('admin/partner/list');
        } else {
            return redirect('admin/partner/list')->with('error', 'Failed to unpin partnership');
        }
    }
    function showEditPartner(Request $req) {
        $data = [
            'partner' => PartnershipModel::getSinglePartner($req->lang, $req->id),
            'language' => $req->lang,
        ];
        return view('admin/partner-edit')->with($data);
    }

    function updatePartner(Request $req) {
        PartnershipModel::deletePartner($req->lang, $req->id);

        $featured_image = $req->featured_image;

        if (PartnershipModel::submitPartner($req, $featured_image)) {
            SystemModel::addSystemLog('Update partner : '.$req->title);
            return redirect('admin/partner/list')->with('success', 'Partner published');
        } else {
            return redirect()->back()->with('error', 'Failed to publish partner');
        }
    }

    // USER

    function showPartner(Request $req) {
        (!$req->lang) ? $lang = 'en' : $lang = $req->lang;
        $partnerdata = PartnershipModel::getPartners($lang);
        $data = [
            'lang' => $lang,
            'partnercontent' => $partnerdata,
        ];
        return view('user.partner-list')->with($data);
    }

    function showSinglePartner(Request $req) {
        (!$req->lang) ? $lang = 'en' : $lang = $req->lang;
        $data = [
            'lang' => $lang,
            'partnercontent' => PartnershipModel::getPartnershipFromSlug($lang, $req->slug),
        ];
        return view('user.partner-single')->with($data);
    }
}
