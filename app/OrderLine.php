<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
	protected $fillable = [
		'order_id',
		'product_id',
		'quantity',
		'subtotal_price'
	];
	
	public function order()
	{
		return $this->belongsTo('App\Order'); 
	}
	
	public function product()
	{
		return $this->belongsTo('App\Product');
	}
}
