<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Philcafe;
use App\Comment;
use App\Company;
use DB;
use Carbon\Carbon;
use App\News;
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
        $companies = Company::all();

        $news = News::where('status', 1)->orderBy('created_at', 'desc')->take(8)->get();

        $latest_news = DB::table('xe_modules')
            ->join('xe_documents', 'xe_modules.module_srl', '=', 'xe_documents.module_srl')
            ->select('xe_documents.module_srl', 'xe_documents.title', 'xe_documents.content', 'xe_documents.regdate', 'xe_documents.document_srl', 'xe_documents.content')
            ->where('xe_documents.module_srl', 181)
            ->orderBy('regdate', 'desc')->take(4)->get();

        preg_match('/src="([^"]+)"/', $latest_news['1']->content, $matches);
//            preg_match('/<img[^>]+>/i', $latest_news[$i]->content, $result);



        $xe_modules = DB::table('xe_modules')
            ->join('xe_documents', 'xe_modules.module_srl', '=', 'xe_documents.module_srl')
            ->select('xe_documents.module_srl', 'xe_documents.title', 'xe_documents.content', 'xe_documents.regdate', 'xe_documents.document_srl', 'xe_documents.content')
            ->where('xe_documents.module_srl', 181)
            ->orderBy('regdate', 'desc')->take(4)->get();// Philnews


        return view('pages.index', compact('news', 'latest_news', 'single_content', 'xe_modules', 'navigation', 'navs','companies'))->with('categories', $categories);
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
                'xe_documents.created_at',
                'xe_documents.regdate as document_regdate',
                'xe_documents.document_srl',
                'xe_documents.readed_count',
                'xe_documents.user_id as document_user_id',
                'xe_documents.nick_name as nickname',
                'xe_modules.browser_title',
                'xe_documents.user_name',
                'xe_documents.comment_count')//select column
            ->orderBy('document_regdate', 'desc')
            ->where('xe_modules.mid', $nav_url)->paginate(12);// where xe_module.mid is the same with nav url

        $nav_title = DB::table('xe_modules')
            ->where('xe_modules.mid', $nav_url)->get();

        return view('pages.nav_content', compact('nav_contents', 'nav_url', 'nav_title'));
    }

    public function subject_content($nav_url, $document_srl)
    {
        $single_content = Post::where('document_srl', $document_srl)->get();
        $comments = DB::table('xe_comments')->where('document_srl', $document_srl)->get();

        $post = Post::find($document_srl);
        // $post->increment('readed_count');

        return view('pages.single_content', compact('single_content', 'comments', 'post'));
    }


    public static function getCategoryId($id)
    {
        $qna = DB::table('xe_modules')
            ->join('xe_documents', 'xe_modules.module_srl', '=', 'xe_documents.module_srl')
            ->addselect('xe_documents.module_srl', 'xe_documents.title', 'xe_documents.user_name','xe_documents.user_id', 'xe_documents.regdate', 'xe_documents.document_srl', 'xe_modules.mid')
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

    public static function new_post_count($module_srl){
        $current_date = Carbon::now()->format('Y-m-d');

        $new_post = DB::table('xe_documents')->where('module_srl', $module_srl)
        ->where(DB::raw("(DATE_FORMAT(created_at,'%Y-%m-%d'))"), $current_date)->get()->count();
       
        return $new_post;
    }
}
