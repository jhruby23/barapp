<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function products()
    {
	    return $this->hasMany('App\Product');
    }
    
    public function scopeFood($query)
    {
	    $query->where('type', 'food');
    }
    
    public function scopeDrinks($query)
    {
	    $query->where('type', 'drinks');
    }
}
