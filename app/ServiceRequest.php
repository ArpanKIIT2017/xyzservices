<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\ServiceRequest;

class ServiceRequest extends Model
{
    //
    public function customer()
    {
        return $this->belongsTo('App\User', 'customer_id');
    }

    public function service_pro()
    {
        return $this->belongsTo('App\User', 'service_pro_id');
    }

    public function status()
    {
        return $this->belongsTo('App\RequestStatus', 'status_id');
    }
}
