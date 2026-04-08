<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class Authlogout extends Controller
{
    public function logouts(){
        Auth::logout();
        return redirect('login');
    }
}
