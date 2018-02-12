<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotProduct extends Model
{
    //

    public function product()
    {
      # code...
      return $this->belongsTo('App\Product');
    }
}
