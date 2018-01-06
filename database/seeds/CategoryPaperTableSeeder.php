<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class CategoryPaperTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #DB::table('category_papers')->truncate();

        $papers = \App\Paper::all();
        $categoryIDs = \App\Category::pluck('id');
        foreach ($papers as $paper){
            $rand_keys = array_random($categoryIDs->toArray(),rand(2,5));
            $paper->categories()->attach($rand_keys);
        }
    }
}
