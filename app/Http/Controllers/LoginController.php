<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
        if (Auth::check()) {
            return Redirect::to('/admin-home');
        } else {
            return Redirect::to('/login');
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {

        return view('login');
    }

    public function index()
    {

        return view('pages.home.index');
    }

    public function doLogin(Request $request)
    {
        $email = $request['email'];
        $password = $request['password'];
        $remember = true;

        // attempt to do the login
        if (Auth::attempt(['email' => $email, 'password' => $password], $remember)) {

            $user = User::where('email', $email)->first();
            Session::put('name', $user->name);
            Session::put('phone', $user->phone);
            Session::put('email', $user->email);
            Session::put('designation', $user->designation);
            Session::put('usertype', $user->usertype);
            Session::put('profile_pic', $user->profile_pic);
            Session::put('id', $user->id);

            return Redirect::to('/admin-home');
        } else {
            return back()->with('failed', "Username or password does not match");

        }
        //Auth::logout(); // log the user out of our application
    }

    public function doLogout()
    {
        Auth::logout(); // log the user out of our application
        return Redirect::to('/');
    }

    public function registration()
    {
        return view('register')->with('users', User::where('designation', 'DC/AC')->get());
    }

    public function confirmMail($id)
    {
        $id = $this->decrypt($id);
        try {
            User::where('id', $id)->update(['active_status' => 0]);
            return Redirect::to('/login')->with('success', "Email Confirmed");
        } catch (\Exception $exception) {
            return Redirect::to('/login')->with('failed', $exception->getMessage());
        }
    }


    public function mailConfirm($email, $id)
    {
        $id = $this->encrypt($id);
        $url = "benapole.pixonlab.com/user/confirm/" . $id;
        $msg = "Please click on given Link:  \n " . $url;

        //echo $this->decrypt($id);
        mail($email, "Mail From Leave APP ", $msg);

    }

    function encrypt($input)
    {
        return strtr(base64_encode($input), '+/=', '._-');
    }

    function decrypt($input)
    {
        return base64_decode(strtr($input, '._-', '+/='));
    }

    public function forgetPass()
    {

    }
}
