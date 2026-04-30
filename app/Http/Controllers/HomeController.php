<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
        public function my_home()
        {
            return view('home.index');
        }


  public function index()
{
    if (Auth::check())
    {
        $user = Auth::user();

        if ($user->usertype === 'user')
        {
            return view('home.index');
        }
        elseif ($user->usertype === 'admin')
        {
            return view('admin.index');
        }
    }

    return redirect()->route('login'); // fallback
}
   }