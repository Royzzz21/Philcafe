<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\philcafe;
use App\Comment;
use DB;

class PagesController extends Controller
{
    public function index()
    {
        $title = 'Welcome To Pato!';
        //return view('pages.index', compact('title'));
        // Test database connection

        //get the categories from database
        //$categories = DB::table('xe_document_categories')->get()->first();
        //$categories = Philcafe::all()->take(1);
        $navs = DB::table('xe_menu_item')->where('menu_srl', 62)->orderBy('menu_item_srl', 'desc')->get();

        $categories = Philcafe::all()->take(1);

        $latest_news = DB::table('xe_modules')
            ->join('xe_documents', 'xe_modules.module_srl', '=', 'xe_documents.module_srl')
            ->select('xe_documents.module_srl', 'xe_documents.title', 'xe_documents.content', 'xe_documents.regdate', 'xe_documents.document_srl', 'xe_documents.content')
            ->where('xe_documents.module_srl', 181)
            ->orderBy('regdate', 'desc')->limit(1)->get();

        preg_match('/<img[^>]+>/i', $latest_news['0']->content, $result);


        $xe_modules = DB::table('xe_modules')
            ->join('xe_documents', 'xe_modules.module_srl', '=', 'xe_documents.module_srl')
            ->select('xe_documents.module_srl', 'xe_documents.title', 'xe_documents.content', 'xe_documents.regdate', 'xe_documents.document_srl', 'xe_documents.content')
            ->where('xe_documents.module_srl', 181)
            ->orderBy('regdate', 'desc')->take(5)->get();// Philnews

        return view('pages.index', compact('latest_news', 'single_content', 'result', 'xe_modules', 'navigation', 'navs'))->with('categories', $categories);
    }

    public function about()
    {
        $title = 'About Us';
        return view('pages.about')->with('title', $title);
    }

    public function services()
    {
        $data = array(
            'title' => 'Services',
            'services' => ['PatoCo Chairman - Gerold', 'PHP master - MR.Tomas ', 'Server master - MR.Tomas', 'Korean Movie master - MR.Jo', 'PM-2 master - MR.G']
        );
        return view('pages.services')->with($data);
    }

    public function content()
    {
        return view('pages.content');
    }

    public function navigation()
    {
        $navs = DB::table('xe_menu_item')->where('menu_srl', 62)->get();
        return view('pages.nav', compact('navs'));
    }

    public function navigation_id($nav_url)
    {
        $nav_contents = DB::table('xe_documents')
            ->join('xe_modules', 'xe_documents.module_srl', '=', 'xe_modules.module_srl')//get the same module_srl
            ->select('xe_documents.title',
                'xe_documents.content',
                'xe_documents.regdate as document_regdate',
                'xe_documents.document_srl',
                'xe_documents.readed_count',
                'xe_documents.user_id as document_user_id',
                'xe_documents.nick_name as nickname',
                'xe_modules.browser_title',
                'xe_documents.comment_count')//select column
            ->orderBy('document_regdate', 'desc')
            ->where('xe_modules.mid', $nav_url)->paginate(12);// where xe_module.mid is the same with nav url

        $nav_title = DB::table('xe_modules')
            ->where('xe_modules.mid', $nav_url)->get();

        return view('pages.nav_content', compact('nav_contents', 'nav_url', 'nav_title'));
    }

    public function subject_content($nav_url, $document_srl)
    {
        $single_content = DB::table('xe_documents')->where('document_srl', $document_srl)->get();
        $comments = DB::table('xe_comments')->where('document_srl', $document_srl)->get();

        return view('pages.single_content', compact('single_content', 'comments'));
    }


    public static function getCategoryId($id)
    {
        $qna = DB::table('xe_modules')
            ->join('xe_documents', 'xe_modules.module_srl', '=', 'xe_documents.module_srl')
            ->addselect('xe_documents.module_srl', 'xe_documents.title', 'xe_documents.user_id', 'xe_documents.regdate', 'xe_documents.document_srl', 'xe_modules.mid')
            ->orderBy('xe_documents.regdate', 'desc')
            ->where('xe_documents.module_srl', $id)
            ->limit(1)->get();
        return $qna;
    }


    public static function getNavTitle($nav)
    {
        $qna = DB::table('xe_modules')
            ->where('mid', $nav)->get();
        return $qna;
    }

    public static function getCount($id)
    {
        $count = DB::table('xe_modules')
            ->join('xe_documents', 'xe_modules.module_srl', '=', 'xe_documents.module_srl')
            ->addselect('xe_documents.module_srl', 'xe_documents.title', 'xe_documents.user_id', 'xe_documents.regdate', 'xe_documents.document_srl')
            ->orderBy('xe_documents.regdate', 'desc')
            ->where('xe_documents.module_srl', $id)
            ->get()->count();
        return $count;
    }

    public static function getLatest($id)
    {
        $count = DB::table('xe_modules')
            ->join('xe_documents', 'xe_modules.module_srl', '=', 'xe_documents.module_srl')
            ->addselect('xe_documents.module_srl', 'xe_documents.title', 'xe_documents.user_id', 'xe_documents.regdate', 'xe_documents.document_srl')
            ->orderBy('xe_documents.regdate', 'desc')
            ->where('xe_documents.module_srl', $id)
            ->get()->count();
        return $count;
    }
}
