<?php

use Illuminate\Database\Seeder;
use App\OrderItem;

class OrderItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    		OrderItem::create([
    			'order_id' => 1,
    			'product_id' => 2,
    			'quantity' => 1,
    			'subtotal_price' => 15
    		]);
    		
    		OrderItem::create([
    			'order_id' => 2,
    			'product_id' => 1,
    			'quantity' => 1,
    			'subtotal_price' => 25
    		]);
    		
    		OrderItem::create([
    			'order_id' => 2,
    			'product_id' => 2,
    			'quantity' => 1,
    			'subtotal_price' => 15
    		]);
    		
    		OrderItem::create([
    			'order_id' => 3,
    			'product_id' => 2,
    			'quantity' => 2,
    			'subtotal_price' => 30
    		]);
    		
    		OrderItem::create([
    			'order_id' => 4,
    			'product_id' => 3,
    			'quantity' => 1,
    			'subtotal_price' => 1000
    		]);
    		
    		OrderItem::create([
    			'order_id' => 5,
    			'product_id' => 1,
    			'quantity' => 2,
    			'subtotal_price' => 50
    		]);
    		
    		OrderItem::create([
    			'order_id' => 6,
    			'product_id' => 2,
    			'quantity' => 1,
    			'subtotal_price' => 15
    		]);
    		
    		OrderItem::create([
    			'order_id' => 7,
    			'product_id' => 2,
    			'quantity' => 2,
    			'subtotal_price' => 30
    		]);
    }
}
