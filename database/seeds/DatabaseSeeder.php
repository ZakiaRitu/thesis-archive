<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ($this->command->confirm('Do you want seed your Database?')) {
            $this->call(UsersTableSeeder::class);
            $this->call(CategoryTableSeeder::class);
            $this->call(PaperTableSeeder::class);
            $this->call(CategoryPaperTableSeeder::class);
            $this->call(PaperUserTableSeeder::class);
            $this->command->info("Hurrah! Database has been seeded.");
        }

    }
}
