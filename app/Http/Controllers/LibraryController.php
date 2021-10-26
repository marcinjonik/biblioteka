<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function user_panel(){
        return view('user.panel');
    }
    public function admin_panel(){
        return view('admin.panel');
    }
}
