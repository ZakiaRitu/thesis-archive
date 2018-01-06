<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class MembersController extends Controller
{


    public function facultyMembers()
    {
         $profiles = Profile::where('status','FACULTY')->paginate(12);
        return view('members.show', compact('profiles'));
    }




    public function otherMembers()
    {
        $profiles = Profile::where('status','STUDENT')->paginate(12);
        return view('members.show', compact('profiles'));
    }
}
