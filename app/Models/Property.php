<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Option ; 
use Illuminate\Support\Str ; 
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

    public function options(){
        return $this->belongsToMany(Option::class);
    }

    public function getSlug():string {
        return Str::slug($this->title);
    }
}
