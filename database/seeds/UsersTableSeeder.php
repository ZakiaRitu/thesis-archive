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
            'name' => 'Zakia Ritu',
            'email' => 'zakiaritu.cse@gmail.com',
            'password' => bcrypt('a'),
            'user_meta_data' => 'zakia14051993'
        ]);
        \App\Profile::create(['user_id' => 1, 'status' => 'STUDENT']);

        factory(App\User::class, 50)->create()->each(function ($u) {
            $u->profile()->save(factory(App\Profile::class)->make());
        });


    }
}
