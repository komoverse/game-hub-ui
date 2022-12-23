<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsModel;
use App\Models\SystemModel;

class NewsController extends Controller
{
    // ADMIN

    function adminShowNews() {
        $data = [
            'news_en' => NewsModel::getFiveNews('en'),
            'news_id' => NewsModel::getFiveNews('id'),
            'news_zh' => NewsModel::getFiveNews('zh'),
            'news_ur' => NewsModel::getFiveNews('ur'),
        ];
        return view('admin.news-list')->with($data);
    }

    function adminShowNewsSingleLang(Request $req) {
        $data = [
            'lang' => $req->lang,
            'news' => NewsModel::getNews($req->lang),
        ];
        return view('admin.news-list-single-lang')->with($data);
    }

    function showAddNewsForm() {
        return view('admin.news-add');
    }

    function submitNews(Request $req) {
        $featured_image = $req->featured_image;

        if (NewsModel::submitNews($req, $featured_image)) {
            SystemModel::addSystemLog('Posted news : '.$req->title);
            return redirect('admin/news/list')->with('success', 'News published');
        } else {
            return redirect()->back()->with('error', 'Failed to publish news');
        }
    }

    function deleteNews(Request $req) {
        $newsdata = NewsModel::getSingleNews($req->lang, $req->id);

        if (NewsModel::deleteNews($req->lang, $req->id)) {
            SystemModel::addSystemLog('Deleted news : '.$newsdata->title);
            return redirect('admin/news/list')->with('success', 'News deleted');
        } else {
            return redirect('admin/news/list')->with('error', 'Failed to delete news');
        }
    }

    function pinNews(Request $req) {
        if (NewsModel::pinNews($req->lang, $req->id)) {
            return redirect('admin/news/list');
        }
    }

    function unpinNews(Request $req) {
        if (NewsModel::unpinNews($req->lang, )) {
            return redirect('admin/news/list');
        } else {
            return redirect('admin/news/list')->with('error', 'Failed to unpin headline');
        }
    }
    function pinRightNews(Request $req) {
        if (NewsModel::pinRightNews($req->lang, $req->id)) {
            return redirect('admin/news/list');
        } else {
            return redirect('admin/news/list')->with('error', 'Failed to change pinned headline');
        }
    }

    function unpinRightNews(Request $req) {
        if (NewsModel::unpinRightNews($req->lang, )) {
            return redirect('admin/news/list');
        } else {
            return redirect('admin/news/list')->with('error', 'Failed to unpin headline');
        }
    }


    // USER

    function showNews() {
        $newsdata = NewsModel::getNews('en');
        $data = [
            'lang' => 'en',
            'newscontent' => $newsdata,
        ];
        return view('user.news-list')->with($data);
    }

    function showSingleNews(Request $req) {
        $data = [
            'lang' => 'en',
            'newscontent' => NewsModel::getNewsFromSlug('en', $req->slug),
        ];
        return view('user.news-single')->with($data);
    }
}
