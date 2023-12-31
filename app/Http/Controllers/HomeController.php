<?php

namespace App\Http\Controllers;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::Check() && Auth::user()->level == 'Admin')
            return redirect('admin-home');
        elseif (Auth::Check() && Auth::user()->level == 'Verifikator')
            return redirect('verif-home');
        elseif (Auth::Check() && Auth::user()->level == 'Sekretaris')
            return redirect('sekre-home');
        elseif (Auth::Check() && Auth::user()->level == 'Kesehatan')
            return redirect('user-kesehatan');
        elseif (Auth::Check() && Auth::user()->level == 'Peserta')
            return redirect('peserta-home');
        else {
            return view('/auth/login');
        }
    }
}