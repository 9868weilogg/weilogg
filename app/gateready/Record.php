<?php

namespace App\gateready;

use Illuminate\Database\Eloquent\Model;
use App\gateready\GatereadyUser;
use App\gateready\Status;
use App\gateready\Courier;
use App\gateready\TimeRange;
use App\gateready\Package;
use App\gateready\Receipt;

class Record extends Model
{
    protected $primaryKey = 'reference_number';
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference_number', 'user_id', 'tracking_number', 'courier_id', 'package_id',
        'order_date', 'schedule_date','schedule_time_id','status_id',
    ];

    /**
     * ***  this record belongs to a user
     */
    public function user(){
    	return $this->belongsTo('App\gateready\GatereadyUser');
    }

    /**
     * ***  this record belongs to a status
     */
    public function status(){
    	return $this->belongsTo('App\gateready\Status');
    }

    /**
     * ***  this record belongs to a courier
     */
    public function courier(){
    	return $this->belongsTo('App\gateready\Courier');
    }

    /**
     * ***  this record belongs to a time range
     */
    public function time_range(){
    	return $this->belongsTo('App\gateready\TimeRange');
    }

    /**
     * ***  this record belongs to a package
     */
    public function package(){
    	return $this->belongsTo('App\gateready\Package');
    }

    /**
     * ***  this record belongs to a receipt
     */
    public function receipt(){
        return $this->belongsTo('App\gateready\Receipt');
    }
}
