<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use DB;
use Auth;

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

    public function store(Request $request){
        $news = new News;
        $user = Auth::user();

        if ($request->file != '') {
            $file = $request->file('file');
            $destination_path = public_path().'/upload/news'; //PATH
            $file_type = $file->getClientOriginalExtension(); //EXTENSION
            $filename = time().'.'.$file_type;  // FILENAME
            
            $file->move($destination_path, $filename); // move to public/uploads the upload file
            
            $news->image = $filename;
        }

        $news->user_id = $user->id;
        $news->title = $request->title;
        $news->content = $request->content;
        $news->save();
        
        return back();
    }

    public function update($id){
        $news = News::find($id);

        return view('admin.news.update', compact('news'));
    }

    public function store_update(Request $request){
        // dd($request->all());
        // $news = News::update(['content' => ])
    }
}