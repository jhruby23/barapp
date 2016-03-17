<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $fillable = [
		'user_id',
		'total_price',
		'invoice_nr'
	];
	
	public function items()
	{
		return $this->hasMany(OrderItem::class);
	}
	
	public function buyer()
	{
		return $this->belongsTo(User::class);
	}
	
	public function scopeUnpaid($query)
	{
		return $query->whereNull('invoice_nr');
	}
	
	public function scopePaid($query)
	{
		return $query->whereNotNull('invoice_nr');
	}
}
