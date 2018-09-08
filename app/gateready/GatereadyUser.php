<?php

namespace App\gateready;

use Illuminate\Database\Eloquent\Model;
use App\gateready\Gender;
use App\gateready\Location;
use App\gateready\Address;

class GatereadyUser extends Model
{
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password','avatar', 'facebook_id','first_time','transaction_quantity',
        'invite_code', 'credit','profile_picture','location_id','contact_number','gender_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * *******    this user belong to a gender  ****
     */
    public function gender(){
        return $this->belongsTo('App\gateready\Gender');
    }

    /**
     * *******    this user belong to a location  ****
     */
    public function location(){
        return $this->belongsTo('App\gateready\Location');
    }

    /**
     * *******   get records for a user  ****
     */
    public function records(){
        return $this->hasMany('App\gateready\Record');
    }

    /**
     * *******   get address for a user  ****
     */
    public function address(){
        return $this->hasOne('App\gateready\Address');
    }
}
