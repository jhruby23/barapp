<?php

use Illuminate\Database\Seeder;
use App\Order;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    		
    		Order::create([
    			'user_id' => 1,
    			'total_price' => 15,
    			'invoice_nr' => NULL,
    		]);
    		
    		Order::create([
    			'user_id' => 2,
    			'total_price' => 40,
    			'invoice_nr' => 12345,
    		]);
    		
    		Order::create([
    			'user_id' => 2,
    			'total_price' => 30,
    			'invoice_nr' => NULL,
    		]);
    		
    		Order::create([
    			'user_id' => 2,
    			'total_price' => 1000,
    			'invoice_nr' => NULL,
    		]);
    		
    		Order::create([
    			'user_id' => 3,
    			'total_price' => 50,
    			'invoice_nr' => 12345,
    		]);
    		
    		Order::create([
    			'user_id' => 3,
    			'total_price' => 15,
    			'invoice_nr' => 666,
    		]);
    		
    		Order::create([
    			'user_id' => 3,
    			'total_price' => 30,
    			'invoice_nr' => NULL,
    		]);
    }
}
