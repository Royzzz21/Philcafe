<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use Carbon\Carbon;
use Image;
use Auth;

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

        $user_id = auth()->user()->id;
        $user = User::where('id', $user_id)->get();

        $users_post = Post::where('member_srl', $user_id)->orderBy('regdate', 'desc')->get();

        return view('dashboard', compact('users_post', 'user', 'user_id'));
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);

        return view('edit_dashboard_info', compact('user'));
    }


    public function store_edit(Request $request)
    {

        if ($request->hasFile('photo')) {
            $user = Auth::user();

            $file = $request->file('photo');
            $filename = time() . '.' . $request->photo->getClientOriginalName();

            $this->validate($request, [
                'photo' => 'required|image||mimes:jpeg,png,bmp gif,svg|max:2048',
                'name' => 'required|string|max:255|min:2',
                'email' => 'required|string|email|max:255',
                'gender' => 'required|string|max:6',
                'phone' => 'required|min:11',
            ]);


            \File::delete(public_path('/images/profile_pictures/' . $user->photo));
            Image::make($file)->save(public_path('/images/profile_pictures/' . $filename));

            $user->photo = $filename;
            $user->save();
        }

        $year = $request->year;
        $month = $request->month;
        $day = $request->day;
        $birthdate = $year . '-' . $month . '-' . $day;
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
}
