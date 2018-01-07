<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function allUser(){
        $profiles  = Profile::paginate(30);
        return view('admin.user.allUser', compact('profiles'))
            ->with('title','All User');
    }



    public function deleteUser($id){
       $user = User::findOrFail($id);
       $user->delete();

       return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
