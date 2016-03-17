<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
	public function users()
	{
		return $this->hasMany(User::class);
	}
	
	public function orders()
	{
		return $this->hasManyThrough(Order::class, User::class);
	}
	
	public function unpaidOrders()
	{
		return $this->hasManyThrough(Order::class, User::class)->whereNull('invoice_nr');
	}
}
