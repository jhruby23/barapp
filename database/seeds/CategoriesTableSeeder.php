<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['name' => 'Sodas', 'type' => 'drinks']);
        Category::create(['name' => 'Soft drinks', 'type' => 'drinks']);
        Category::create(['name' => 'Cider', 'type' => 'drinks']);
        Category::create(['name' => 'Non-alcoholic', 'type' => 'drinks']);
        Category::create(['name' => 'Beer', 'type' => 'drinks']);
        Category::create(['name' => 'Wine', 'type' => 'drinks']);
        Category::create(['name' => 'Hot beverages', 'type' => 'drinks']);
        Category::create(['name' => 'Tea', 'type' => 'drinks']);
        Category::create(['name' => 'Juice', 'type' => 'drinks']);
        Category::create(['name' => 'Cocktails', 'type' => 'drinks']);
        Category::create(['name' => 'Shots', 'type' => 'drinks']);
        
        Category::create(['name' => 'Soups', 'type' => 'food']);
        Category::create(['name' => 'Meals', 'type' => 'food']);
        Category::create(['name' => 'Snacks', 'type' => 'food']);
        Category::create(['name' => 'Other products', 'type' => 'food']);
        
    }
}
