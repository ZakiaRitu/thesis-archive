<?php

namespace App\Http\Controllers;

use App\Category;
use App\Paper;
use App\PaperUser;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {

         $userIds = DB::table('paper_users')
            ->select('user_id', DB::raw('count(*) as total'))
            ->groupBy('user_id')
            ->orderBy('total','desc')
            ->take(6)
            ->pluck('user_id');
        $topUsers = User::whereIn('id',$userIds)->get();

        $recentPapers = Paper::orderBy('id','desc')->take(20)->get();

        $user = Auth::user();
        $categories = Category::take(20)->get();
        $categoryLists = Category::pluck( 'cat_name', 'id');
       return view('welcome',compact('user','categories','categoryLists','topUsers','recentPapers'));
    }
}
