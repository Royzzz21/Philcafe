<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Comment;
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
            'title' => 'required',
            'body' => 'required',
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
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $datenow = Carbon::now()->toDateTimeString();

        // Create Posts
        $post = new Post;
        $post->title = $request->input('title');
        $post->content = $request->input('body');
        $post->module_srl = $request->input('category');
        $post->user_name = auth()->user()->name;
        $post->nick_name = auth()->user()->name;
        $post->email_address = auth()->user()->email;
        $post->member_srl = auth()->user()->id;
        $post->regdate = str_replace(["-", "–", " ", " ", ":", ":"], '', $datenow);
        $post->last_update = str_replace(["-", "–", " ", " ", ":", ":"], '', $datenow);
        $post->save();

        $nav_url = $request->input('url');
        $last_id = $post->document_srl;

        return redirect()->to('/content/' . $nav_url . '/' . $last_id);
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
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
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

        $nav_id = DB::table('xe_modules')
            ->where('xe_modules.module_srl',$posts->module_srl )->get();

        $nav_url = $nav_id['0']->mid;
        //Check for correct user
//        if (!$post) {
//            return redirect()->route('notfound');
//        }
//
//        if (auth()->user()->id != $post->user_id) {
//            return redirect('/posts')->with('error', 'Unauthorized Page');
//        }

        return view('posts.edit', compact('posts', 'nav_url'));
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
        $post->user_name = auth()->user()->name;
        $post->nick_name = auth()->user()->name;
        $post->email_address = auth()->user()->email;
        $post->member_srl = auth()->user()->id;
        $post->regdate = str_replace(["-", "–", " ", " ", ":", ":"], '', $datenow);
        $post->last_update = str_replace(["-", "–", " ", " ", ":", ":"], '', $datenow);
        $post->save();
        if ($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }
        //$post->save();
        $nav_url = $request->input('url');

        return redirect('/content/'.$nav_url.'/'.$id);
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
