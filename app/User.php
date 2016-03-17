<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'first_name',
    	'last_name',
    	'email',
    	'pin',
    	'status',
    	'rfid_nr',
    	'rfid_hex',
    	'team_id',
    	'dynamic_sort'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
        'pin'
    ];
    
    public function team()
    {
	    return $this->belongsTo(Team::class);
    }
    
    public function customer()
    {
	    return $this->belongsTo(Customer::class);
    }
    
    public function orders()
    {
	    return $this->hasMany(Order::class);
    }
    
    public function unpaidOrders()
    {
	    return $this->hasMany(Order::class)->whereNull('invoice_nr');
    }
    
    public function paidOrders()
    {
	    return $this->hasMany(Order::class)->whereNotNull('invoice_nr');
    }
    
    public function isGuest()
    {
	    return is_null($this->pin);
    }
    
    public function isMember()
    {
	    return !is_null($this->pin);
    }
    
    public function isAdmin()
    {
	    return $this->is_admin;
    }
    
    public function scopeActive($query)
    {
	    return $query->where('status', 'active');
    }
    
    public function setEmailAttribute($value)
    {
	    if($value == '')
	    	$this->attributes['email'] = NULL;
	    else
	    	$this->attributes['email'] = $value;
    }
}
