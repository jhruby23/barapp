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
    	'team_id'
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
    
    public function orders()
    {
	    return $this->hasMany('App\Order');
    }
}
