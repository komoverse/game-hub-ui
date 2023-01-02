<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AcademyModel;
use App\Models\SystemModel;

class AcademyController extends Controller
{
    // ADMIN
    function adminShowAcademy() {
        $data = [
            'academy_en' => AcademyModel::getFiveAcademy('en'),
            'academy_id' => AcademyModel::getFiveAcademy('id'),
            'academy_zh' => AcademyModel::getFiveAcademy('zh'),
            'academy_ur' => AcademyModel::getFiveAcademy('ur'),
        ];
        return view('admin/academy-list')->with($data);
    }

    function adminShowAcademySingleLang(Request $req) {
        $data = [
            'lang' => $req->lang,
            'academy' => AcademyModel::getAcademy($req->lang),
        ];
        return view('admin/academy-list-single-lang')->with($data);
    }

    function showAddAcademyForm() {
        return view('admin/academy-add');
    }

    function submitAcademy(Request $req) {
        $featured_image = $req->featured_image;

        if (AcademyModel::submitAcademy($req, $featured_image)) {
            SystemModel::addSystemLog('Posted academy : '.$req->title);
            return redirect('admin/academy/list')->with('success', 'News published');
        } else {
            return redirect()->back()->with('error', 'Failed to publish academy');
        }
    }

    function deleteAcademy(Request $req) {
        $academydata = AcademyModel::getSingleAcademy($req->lang, $req->id);

        if (AcademyModel::deleteAcademy($req->lang, $req->id)) {
            SystemModel::addSystemLog('Deleted academy : '.$academydata->title);
            return redirect('admin/academy/list')->with('success', 'News deleted');
        }
    }

    function pinAcademy(Request $req) {
        if (AcademyModel::pinAcademy($req->lang, $req->id)) {
            return redirect('admin/academy/list');
        } else {
            return redirect('admin/academy/list')->with('error', 'Failed to change pinned academyship');
        }
    }

    function unpinAcademy(Request $req) {
        if (AcademyModel::unpinAcademy($req->lang)) {
            return redirect('admin/academy/list');
        } else {
            return redirect('admin/academy/list')->with('error', 'Failed to unpin academyship');
        }
    }

    function showEditAcademy(Request $req) {
        $data = [
            'academy' => AcademyModel::getSingleAcademy($req->lang, $req->id),
            'language' => $req->lang,
        ];
        return view('admin/academy-edit')->with($data);
    }

    function updateAcademy(Request $req) {
        AcademyModel::deleteAcademy($req->lang, $req->id);

        $featured_image = $req->featured_image;

        if (AcademyModel::submitAcademy($req, $featured_image)) {
            SystemModel::addSystemLog('Update academy : '.$req->title);
            return redirect('admin/academy/list')->with('success', 'News published');
        } else {
            return redirect()->back()->with('error', 'Failed to publish academy');
        }
    }



    // USER

    function showAcademy(Request $req) {
        (!$req->lang) ? $lang = 'en' : $lang = $req->lang;
        $academydata = AcademyModel::getAcademy($lang);
        $data = [
            'lang' => $lang,
            'academycontent' => $academydata,
        ];
        return view('user.academy-list')->with($data);
    }

    function showSingleAcademy(Request $req) {
        (!$req->lang) ? $lang = 'en' : $lang = $req->lang;
        $data = [
            'lang' => $lang,
            'academycontent' => AcademyModel::getAcademyFromSlug($lang, $req->slug),
        ];
        return view('user.academy-single')->with($data);
    }
}
