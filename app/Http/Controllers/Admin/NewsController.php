<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use DB;
use Auth;
use File;
class NewsController extends Controller
{
    public function index(){
        
        $news = News::all();
        
        return view('admin.news.index', compact('news'));
    }

    public function add_news(){

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
        $news->country = $request->country;
        $news->save();
        
        return back();
    }

    public function update($id){
        $news = News::find($id);

        return view('admin.news.update', compact('news'));
    }

    public function store_update(Request $request){
        $news = News::find($request->id);

            if ($request->file != '') {
                $file = $request->file;
                $filename = time().'-'.$file->getClientOriginalName(); 
                $destination_path = public_path().'/upload/news/';
                File::delete($destination_path.$news->image); // Delete old image

                $file->move($destination_path, $filename); // move image to public/upload/new/ FOLDER
                
                $news->image = $filename; //set the old img from datebase to new upload image
                $news->save(); //save the image
            }
        
        $update = $news->update(['title'=>$request->title, 'content'=>$request->content]);
       
        return back();
        // dd($request->all());
    }

    public function delete_news($id){
        $news = News::find($id);
        // dd($news->image);
        File::delete(public_path().'/upload/news/'.$news->image);
        $news = News::where('id', $id)->delete();

        return back();
    }

    public function delete_image($img_name){
        File::delete(public_path().'/upload/news/'.$img_name);

        return back();

    }
}