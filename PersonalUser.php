<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class PersonalUser extends Model
{
    protected $fillable = [
        'name','fname',
    ];
}
