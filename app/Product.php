<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //


    public function getDiscountPriceAttribute($value)
    {
      # code...
      return number_format($value,2);
    }
    public function getOriginalPriceAttribute($value)
    {
      # code...
      return number_format($value,2);
    }

    // Search based on name //
    public function scopeSearch_Title($query,$title)
    {
      # code...
      return $query->where('title','like',"%$title%");
    }
    /* Category relationship */
    public function category()
    {
      # code...
      return $this->belongsTo('App\Category');
    }
    public function hot_products()
    {
      # code...
      return $this->hasMany('App\HotProduct');
    }
}
