<?php

namespace App\gateready;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'invitor_id', 'code', 'invitee_id', 'reward',
        ];

    /**
     * ******   
     */
}
