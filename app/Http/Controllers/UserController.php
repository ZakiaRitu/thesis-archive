<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * ALl approved Users
     * @return $this
     */
    public function allUser(){
        $userIds = User::where('is_approved' , '=', 'YES')->pluck('id');
        $profiles  = Profile::whereIn('user_id',$userIds)->where('status','STUDENT')->paginate(30);
        return view('admin.user.allUser', compact('profiles'))
            ->with('title','Approved Users');
    }


    /**
     * All Pending Users
     * @return $this
     */
    public function pendingUsers(){
        $userIds = User::where('is_approved' , '=', 'NO')->pluck('id');
        $profiles  = Profile::whereIn('user_id',$userIds)->where('status','STUDENT')->paginate(30);
        return view('admin.user.pending', compact('profiles'))
            ->with('title','Pending Users');
    }


    /**
     * User Request Approved
     * @param $user_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function pendingApproved($user_id){
        $user = User::where('id', $user_id)->first();
        $user->is_approved = 'YES';
        if($user->save()){
            return redirect()->back()->with('success','User Approved Successfully');
        }else{
            return redirect()->back()->with('error','Something Went Wrong');
        }
    }


    public function deleteUser($id){
       $user = User::findOrFail($id);
       $user->delete();

       return redirect()->back()->with('success', 'Deleted Successfully');
    }
}
