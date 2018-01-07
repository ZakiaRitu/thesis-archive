<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        return view('user.profile', compact('user'));
    }



    public function userProfile($user_meta_data)
    {
        $user = User::where('user_meta_data',$user_meta_data)->first();
        return view('user.profile', compact('user'));
    }



    /**
     * Teacher Photo Update
     * @return mixed
     */
    public function updatePhoto(){

        if (Input::hasFile('image_url'))
        {
            $file = Input::file('image_url');

            //deleting previous file
            $prev_avatar_url = Profile::where('user_id',Auth::user()->id)->first()->image;
            if($prev_avatar_url != null){
                if (\File::exists($prev_avatar_url)) {
                    \File::delete($prev_avatar_url);
                }
            }

            $destinationPath = public_path().'/uploads/profile/';
            if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }

            $profile = Profile::where('user_id',Auth::user()->id)->first();
            $destination = $destinationPath;
            $filename = time().'_'.$file->getClientOriginalName();
            $upload_result = $file->move($destination, $filename);
            $profile->image = '/uploads/profile/'.$filename;

            if($profile->save()){
                return redirect()->back()->with('success','Photo updated successfully');
            }else{
                return redirect()->back()->with('error','Something went wrong');
            }

        }else{
            return redirect()->back()->with(['error'=>'Image could not be uploaded']);
        }
    }




    public function updateInfo(Request $request){
            //return $request->all();
            $user = User::findOrFail(Auth::user()->id);
            $user->name = $request->name;
            if($user->save()){
                $profile = Profile::where('user_id',Auth::user()->id)->first();
                $profile->phone_num = $request->phone_num;
                $profile->interest = $request->interest;
                $profile->session_year = $request->session_year;
                $profile->reg_num = $request->reg_num;
                $profile->designation = $request->designation;
                $profile->bio = $request->bio;
                if($profile->save()){
                    return redirect()->back()->with('success','Profile Info updated successfully');
                }else{
                    return redirect()->back()->with('error','Something went wrong');
                }

            }
    }




}
