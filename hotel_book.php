<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class hotel_book extends Model
{
    protected $fillable = [
        'hotels_id', 'type', 'no', 'description', 'price', 'status'
    ];

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

}
