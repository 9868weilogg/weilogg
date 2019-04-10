<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\gateready\Gender;
use App\gateready\Location;
use App\gateready\Address;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
    // public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','avatar', 'facebook_id','first_time','transaction_quantity',
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
