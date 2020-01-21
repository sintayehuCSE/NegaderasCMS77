<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class bus_post extends Model
{
    protected $fillable = [
        'buses_id','no','plate'
    ];

    public function bus()
    {
        return $this->belongsTo(Bus::class);
    }

    public function bus_route()
    {
        return $this->hasOne(Bus_route::class);
    }
}
