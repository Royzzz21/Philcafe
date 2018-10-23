<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\User;
use App\Comment;
use App\Philcafe;
use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$post = Post::all();
        //return $post = Post::where('title','Post Two')->get();
        //$posts = DB::select('SELECT * FROM posts');
        //$posts = Post::orderBy('title', 'desc')->take(1)->get();
        //$posts = Post::orderBy('title', 'desc')->get();

        return view('posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($nav_url)
    {
        $nav_id = DB::table('xe_modules')
            ->where('xe_modules.mid', $nav_url)->get();


        $nav_id = $nav_id['0']->module_srl;
        $url = $nav_url;

        return view('posts.create', compact('nav_id', 'url'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'file' => 'mimes:docx,doc,pdf,xls,xlsx,jpeg,png,jpg,gif|max:1024',
            'title' => 'required|min:2',
            'body' => 'required|min:2',
        ]);

        $post = new Post; // create an instance

        $current_date = date('Y-m-d H:i:s');
        $datenow = Carbon::now()->toDateTimeString();

        if ($request->hasFile('file')) {
            $file = $request->file('file');


            $file_ex = '';
            $destination_path = public_path('/upload'); //PATH

            $file_type = $file->getClientOriginalExtension(); //EXTENSION

                if ($file_type == 'png') {
                    $file_ex = 'image';

                }elseif($file_type == 'PNG'){
                    $file_ex = 'image';

                }elseif($file_type == 'jpg'){
                    $file_ex = 'image';

                }elseif($file_type == 'JPG'){
                    $file_ex = 'image';

                }elseif($file_type == 'jpeg'){
                    $file_ex = 'image';

                }elseif($file_type == 'JPEG'){
                    $file_ex = 'image';

                }elseif($file_type == 'gif'){
                    $file_ex = 'image';

                }elseif($file_type == 'GIF'){
                    $file_ex = 'image';

                }else{
                    $file_ex = $file_type;
                }
            $filename = time().'.'.$file_type;  // FILENAME
            $file->move($destination_path, $filename); // move to public/uploads the upload file

            $post->file_type = $file_ex;
            $post->file = $filename; //save the filename to a database
        }

        // Create Posts
        $post->title = $request->input('title');
        $post->content = $request->input('body');
        $post->module_srl = $request->input('category');
        $post->user_name = auth()->user()->username;
        $post->nick_name = auth()->user()->name;
        $post->email_address = auth()->user()->email;
        $post->member_srl = auth()->user()->id;

        $post->regdate = str_replace(["-", "–"," ", " ", ":", ":"], '',$datenow);
        $post->last_update = str_replace(["-", "–"," ", " ", ":", ":"], '',$datenow);

        $post->save();

        $nav_url = $request->category;

        $document_srl = $post->document_srl;
        return redirect()->to('/post/'. $document_srl);
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->action('PostsController@delete_comment', ['id' => $id]);
    }

    public function delete_comment($id)
    {
        $comment = Comment::where('document_srl', $id)->get()->each->delete();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {

        $current_date = Carbon::now()->format('Y-m-d');
        $user = User::where('username', $name)->firstOrFail();

        $user_posts = Post::where('member_srl', $user->id)
            ->orderBy('regdate', 'desc')->paginate(5);

        return view('posts.show', compact('user', 'user_posts', 'current_date', 'old_user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::find($id);
        return view('posts.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        // Handle File Upload
        if ($request->hasFile('cover_image')) {
            // Get filename with the extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }

        $datenow = Carbon::now()->toDateTimeString();
        // Update Posts
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('body');
        $post->module_srl = $request->input('category');
        $post->user_name = auth()->user()->username;
        $post->nick_name = auth()->user()->name;
        $post->email_address = auth()->user()->email;
        $post->member_srl = auth()->user()->id;
        $post->regdate = str_replace(["-", "–", " ", " ", ":", ":"], '', $datenow);
        $post->last_update = str_replace(["-", "–", " ", " ", ":", ":"], '', $datenow);
        $post->save();
        if ($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }

        return redirect('/post/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if (auth()->user()->id != $post->user_id) {
            return redirect()->route('notfound');
        }
        if ($post->cover_image != 'noimage.jpg') {
            // Delete Image
            Storage::delete('public/cover_images/' . $post->cover_image);
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post Removed');
    }

    //Page not found
    public function pagenotfound()
    {
        return view('errors.404');
    }
}
