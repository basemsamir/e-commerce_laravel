<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable=[
      'product_name',
      'session_id',
      'product_id',
      'price',
      'qty'
    ];
}
