<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #User::truncate();

        User::create([
            'name' => 'Nahid Mahadi Hasan',
            'first_name' => 'Nahid',
            'is_approved' =>'YES',
            'last_name' => 'Mahadi Hasan',
            'email' => 'nahid.cse@gmail.com',
            'password' => bcrypt('a'),
            'user_meta_data' => 'nahid123'
        ]);
        \App\Profile::create(['user_id' => 1, 'status' => 'FACULTY', 'is_admin'=>'YES', 'image'=>'/images/anonymous.png']);


        User::create([
            'name' => 'Zakia Ritu',
            'first_name' => 'Zakia',
            'last_name' => 'Ritu',
            'is_approved' =>'YES',
            'email' => 'zakiaritu.cse@gmail.com',
            'password' => bcrypt('a'),
            'user_meta_data' => 'zakia14051994'
        ]);
        \App\Profile::create(['user_id' => 2, 'status' => 'STUDENT', 'is_admin'=>'YES', 'image'=>'/images/anonymous.png']);



        factory(App\User::class, 50)->create()->each(function ($u) {
            $u->profile()->save(factory(App\Profile::class)->make());
        });


    }
}
