<?php

use Illuminate\Database\Seeder;

class PaperUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #DB::table('paper_users')->truncate();
        $papers = \App\Paper::all();
        $userIDs = \App\User::pluck('id');
        foreach ($papers as $paper){
            $rand_keys = array_random($userIDs->toArray(),rand(2,5));
            $paper->users()->attach($rand_keys);
        }

    }
}
