<?php

use Illuminate\Database\Seeder;

class PaperTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       # \App\Paper::truncate();
        factory(App\Paper::class, 50)->create();
    }
}
