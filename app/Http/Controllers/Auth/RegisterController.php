<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $year = 1905;
        $day_and_month = 1;

        return Validator::make($data, [
            'username' => 'required|alpha_dash|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'gender' => 'required|string|max:6',
            'phone' => 'required|min:11',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $year = $data['year'];
        $month = $data['month'];
        $day = $data['day'];
        $birthdate = $year.'-'.$month.'-'.$day;

        // dd($filename);
        return User::create([
            // 'profile_picture' => $data['profile_picture'],
            'username' => $data['username'],
            'name' => $data['name'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'birthdate' => $birthdate,
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'role_id' => 2,
        ]);
    }
}
