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
		return $this->hasMany('App\OrderLine');
	}
	
	public function buyer()
	{
		return $this->belongsTo('App\User');
	}
	
	public function unpaid($query)
	{
		return $query->where('invoice_nr', '');
	}
	
	public function paid($query)
	{
		return $query->where('inovice_nr', '!=', '');
	}
}
