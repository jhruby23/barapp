<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name',
    	'description',
    	'logo_url',
    	'quantity',
    	'member_price',
    	'guest_price'
    ];
    
    public function scopeEnabled($query)
    {
	    return $query->where('enabled', true);
    }
    
    public function category()
    {
	    return $this->belongsTo(Category::class);
    }

    public function orderlines()
    {
	    return $this->hasMany(OrderLine::class);
    }
}
