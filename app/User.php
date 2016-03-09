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
	    return $this->belongsTo('App\Team');
    }
    
    public function customer()
    {
	    return $this->belongsTo('App\Customer');
    }
    
    public function orders()
    {
	    return $this->hasMany('App\Order');
    }
    
    public function isGuest()
    {
	    return is_null($this->pin);
    }
    
    public function isAdmin()
    {
	    return $this->is_admin;
    }
    
    public function setEmailAttribute($value)
    {
	    if($value == '')
	    	$this->attributes['email'] = NULL;
	    else
	    	$this->attributes['email'] = $value;
    }
}
