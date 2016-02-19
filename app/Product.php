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
	    $query->where('enabled', true);
    }
    
    public function category()
    {
	    return $this->belongsTo('App\Category');
    }
}
