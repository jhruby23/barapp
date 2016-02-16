<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		Product::create([
    			'name' 			=> 'Pivo',
    			'description' 	=> 'Lorem ipsum pivo',
    			'quantity' 		=> 50,
    			'member_price' => 25,
    			'guest_price' 	=> 30,
    			'enabled' 		=> true,
    			'category_id' 	=> 5
    		]);
    		
    		Product::create([
    			'name' 			=> 'Müsli tyčinka',
    			'description' 	=> 'Lorem ipsum müsli tyčinka',
    			'quantity' 		=> 24,
    			'member_price' => 15,
    			'guest_price' 	=> 15,
    			'enabled' 		=> true,
    			'category_id' 	=> 14
    		]);
    }
}
