<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class TeacherController extends Controller
{

    public function create()
    {
        $teachers = Profile::where('status','FACULTY')->get();
        return view('teacher.create', compact('teachers'))->with('title','New Faculty Member');

    }



    protected function store(Request $request)
    {

        $rules = array
        (
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        );

        $data = $request->all();
        $validation = Validator::make($data, $rules);


        if ($validation->fails())
        {

            return redirect()->route('login')
                ->withInput()
                ->withErrors($validation);
        } else{
            $user = new User();
            $user->first_name = $data['first_name'];
            $user->last_name = $data['last_name'];
            $user->name = $data['first_name'].' '.$data['last_name'];
            $user->is_approved ='YES';
            $user->email = $data['email'];
            $user->password = bcrypt('123456');
            $user->user_meta_data = strtolower(str_slug($data['first_name'].$data['last_name']).rand(10000,100000));
            if($user->save()){
                $profile = new Profile();
                $profile->user_id = $user->id;
                $profile->status = 'FACULTY';
                $profile->image =  '/images/anonymous.png';
                $profile->save();
            }
            return redirect()->back()->with('success', 'Faculty Member Created Successfully');
        }
    }



    public function makeAdmin($user_id){
        $profile = Profile::where('user_id',$user_id)->first();
        if($profile->is_admin == 'NO'){
            $profile->is_admin = 'YES';
        }else{
            $profile->is_admin = 'NO';
        }
        if($profile->save()){
            return redirect()->back()->with('success', 'Change Admin Status for ['.$profile->user->name.'] Successfully' );
        }
    }



}
