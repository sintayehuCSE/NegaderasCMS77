<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class bus_route extends Model
{
    protected $fillable = [
        'start', 'end', 'date','buses_posts_id','money'
    ];

    public function bus_post()
    {
        return $this->belongsTo(Bus_post::class);
    }
}
