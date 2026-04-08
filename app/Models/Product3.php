<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product3 extends Model
{
     protected $fillable = [
        'name',
        'price',
        'description',
        'stock'
     ];

     public function orders(){
      return $this->hasMany(\App\Models\Orders::class);
     }
}
