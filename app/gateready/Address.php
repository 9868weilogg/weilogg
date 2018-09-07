<?php

namespace App\gateready;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'address_line_1', 'address_line_2', 'location_id',
    ];
}
