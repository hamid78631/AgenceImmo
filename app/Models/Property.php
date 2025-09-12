<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'title' , 
        'description',
        'surface',
        'rooms' ,
        'bedrooms', 
        'floor',
        'city',
        'postal_code',
        'sold', 
        'price',
        'address'
    ];
}
