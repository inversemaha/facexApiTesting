<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::check()) {
                return Redirect::to('/login');
            } else {
                if (!Session::get('id')) {
                    return Redirect::to('/logout');
                }
            }
            return $next($request);
        });
    }

    public function adminHome()
    {
        return view('pages.home.index')
            ->with('unseen_notifications', null);

    }


}
