<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class hotel extends Model
{
    protected $fillable = [
        'name', 'location','star','room', 'user_id'
    ];

    protected $hidden = [
        'password',
    ];

    public function hotel_books()
    {
        return $this->hasMany(Hotel_book::class);
    }
}
