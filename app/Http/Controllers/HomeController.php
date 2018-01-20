<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = Category::take(9)->get();
       return view('welcome',compact('user','categories'));
    }
}
