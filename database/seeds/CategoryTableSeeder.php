<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #\App\Category::truncate();
        #factory(App\Category::class, 10)->create();
        Category::create(['cat_name'=>'NLP','cat_meta_data' =>'nlp']);
        Category::create(['cat_name'=>'Data Science','cat_meta_data' =>'data_science']);
        Category::create(['cat_name'=>'Big Data','cat_meta_data' =>'big_data']);
        Category::create(['cat_name'=>'Image Processing','cat_meta_data' =>'image_processing']);
        Category::create(['cat_name'=>'Networking','cat_meta_data' =>'networking']);
        Category::create(['cat_name'=>'Usable Security','cat_meta_data' =>'usable_security']);
        Category::create(['cat_name'=>'Machine Learning','cat_meta_data' =>'machine_learning']);
        Category::create(['cat_name'=>'Bioinformatics','cat_meta_data' =>'bioinformatics']);
        Category::create(['cat_name'=>'Crowdsourcing','cat_meta_data' =>'crowdsourcing']);
        Category::create(['cat_name'=>'Artificial Intelligence','cat_meta_data' =>'artificial_intelligence']);
    }
}
