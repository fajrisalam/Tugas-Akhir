<?php

namespace App\Http\Controllers;

use App\User;
Use App\File;
use App\Log;
use App\sharing;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        $data['active'] = 1;
        if(!Auth::check()) return route('login'); 

        if(Auth::user()->id == 1){
            $data['user'] = User::count();
            $data['log'] = Log::count();
            $data['share'] = sharing::count();
            $data['file'] = File::count();
        }
        else{
            // $public = File::where('privasi', 1)->where('id_user', '!=', Auth::user()->id)->count();
            // dd($public);
            // $share = sharing::where('id_shared', Auth::user()->id)->count();
            $data['share'] = sharing::where('id_shared', Auth::user()->id)->count();
            $data['file'] = File::where('id_user', Auth::user()->id)->count();
        }

        return view('testing.testo', $data);
    }
}
