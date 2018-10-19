<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use Countries;

class NewsController extends Controller
{
    public function index(){

        $news = News::orderBy('created_at', 'desc')->paginate(12);
        $featured_news = News::where('status', 3)->first();
        
        return view('news.index', compact('news', 'featured_news'));
    }

    public function single_news($id){
        $news = News::find($id);

        return view('news.single_news', compact(
            'news'
        ));
    }
}
