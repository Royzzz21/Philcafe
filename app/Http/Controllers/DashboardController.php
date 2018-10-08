<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Post;
use Session;
use Carbon\Carbon;
use Image;
use Auth;
use DB;
use App\Comment;

use Intervention\Image\ImageManager;
class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_date = Carbon::now()->format('Y-m-d');

        // $current_date = date('Y-m-d h:i:s');

        $user_id = auth()->user()->id;
        $user = User::where('id', $user_id)->get();
        $users_posts = Post::where('member_srl', $user_id) ->orderBy('created_at', 'desc')->paginate(5);

        // dd($new->day - 1);
        // $tae = Post::new_post($new);
        // dd($tae);

        return view('dashboard', compact('users_posts', 'user', 'user_id', 'current_date'));
    }

    public function edit_dashboard_post(Request $request){
        $current_date = Carbon::now()->format('Y-m-d');
        $user_id = auth()->user()->id;
        $user = User::where('id', $user_id)->get();
        $users_posts = Post::where('member_srl', $user_id) ->orderBy('created_at', 'desc')->paginate(5);

        // dd($request->all());

        $return_post = Post::find($request->post_id);
        
        return view('dashboard', compact('users_posts', 'user', 'user_id', 'current_date','return_post'));
    }// Edit post on dashboard

    public function update_post(Request $request){
        
        $old_post_title = $request->title;
        
        $users_posts = Post::where('document_srl', $request->document_srl)
                       ->update(['module_srl' => $request->category, 'title' => $request->title, 'content' => $request->body ]);
        
        session::flash('updated', $old_post_title.' post was updated.');

        return redirect('profile');
        // dd($request->all());
    }

    public function edit($user_id){
        $user = User::find($user_id);

        return view('edit_dashboard_info', compact('user'));
    }

    public function delete($id){
        $post_title = Post::find($id)->title;
       
        $post = Post::find($id)->delete();
        
        $comment = Comment::where('document_srl', $id)->get()->each->delete();

        Session::flash('deleted', $post_title.' post was deleted');
        return redirect('profile');
    }

    public function store_edit(Request $request){
       

        $this->validate($request, [

            // 'photo' => 'required|image||mimes:jpeg,jpg,png,gif|max:2048',
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|string|email|max:255',
            'gender' => 'required|string|max:6',
            'phone' => 'required|min:11',
        ]);

        $user = Auth::user();

        if ($request->hasFile('photo')) {

            $file = $request->file('photo');
            $filename = time() . '.' . $request->photo->getClientOriginalName();

            \File::delete(public_path('/images/profile_pictures/'. $user->photo));
            Image::make($file)->save(public_path('/images/profile_pictures/'. $filename) );

            $user->photo = $filename;
            $user->save();
        }

        $year = $request->year;
        $month = $request->month;
        $day = $request->day;
        $birthdate = $year.'-'.$month.'-'.$day;
        $user_id = $request->user_id;

        $user_profile = User::find($user_id);

        $user_profile->name = $request->name;
        $user_profile->email = $request->email;
        $user_profile->gender = $request->gender;
        $user_profile->birthdate = $birthdate;
        $user_profile->phone = $request->phone;

        $user_profile->save();

        return redirect('profile');
    }

    public function store(Request $request){
        
        // $this->validate($request, [
        //     'file' => 'max:1024|mimes:doc,docx,jpeg,png,jpg',
        //     'title' => 'required',
        //     'body' => 'required',
        // ]);

        $post = new Post; // create an instance

        $current_date = date('Y-m-d H:i:s');
        $datenow = Carbon::now()->toDateTimeString();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $destination_path = public_path().'/upload'; //PATH
            $file_type = $file->getClientOriginalExtension(); //EXTENSION
            $filename = time().'.'.$file_type;  // FILENAME
            $file->move($destination_path, $filename); // move to public/uploads the upload file

            $post->file_type = $file_type;
            $post->file = $filename; //save the filename to a database
        }
      
        // Create Posts
        $post->title = $request->input('title');
        $post->content = $request->input('body');
        $post->module_srl = $request->input('category');
        $post->user_name = auth()->user()->name;
        $post->nick_name = auth()->user()->name;
        $post->email_address = auth()->user()->email;
        $post->member_srl = auth()->user()->id;
        $post->regdate = str_replace(["-", "–"," ", " ", ":", ":"], '',$datenow);
        $post->last_update = str_replace(["-", "–"," ", " ", ":", ":"], '',$datenow);
      
        $post->save();

        session::flash('new_post', 'New post created.');

        return back();
    }

    // ONEPAGE SUBMISSION FUNCTION

    public function category($module_srl, $post_module_srl){
        $selected = '';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($module_srl == $post_module_srl) {
                $selected = 'selected';
            }
        }
        return $selected;
    }
}
