<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use DB;
class NewsController extends Controller
{
    public function index(){
        
        $news = News::all();
        
        return view('admin.news.index', compact('news'));
    }

    public function add_news(){
        // dd('tae');

        return view('admin.news.create');
    }
}
