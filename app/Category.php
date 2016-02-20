<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	public $timestamps = false;
	
   public function products()
   {
		return $this->hasMany('App\Product');
	}
    
	public function scopeFood($query)
   {
		return $query->where('type', 'food');
   }
    
   public function scopeDrinks($query)
   {
		return $query->where('type', 'drinks');
   }
   
   public function scopeOther($query)
   {
	   return $query->where([
	   	['type', '!=', 'food'],
	   	['type', '!=', 'drinks']
	   ]);
   }
}
