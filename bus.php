<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class bus extends Model
{
    protected $fillable = [
        'name', 'number','user_id'
    ];

    public function bus_posts()
    {
        return $this->hasMany(Bus_post::class);
    }
    
}
