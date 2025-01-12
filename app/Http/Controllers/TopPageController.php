<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TopPageController extends Controller
{
    public function index()
{
    if (Auth::check()) {
        $user = DB::table('userpassword')
            ->where('email', Auth::user()->email)
            ->first();

        $name = $user ? $user->name : 'ゲスト';
    } else {
        $name = 'ゲスト';
    }

    return view('top')->with('name', $name);
}



}

