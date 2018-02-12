<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable=[
      'name',
      'main_category_id',
      'status'
    ];

    public function getNameAttribute($value){
      return ucfirst($value);
    }
    public function parentcategory(){
      return $this->belongsTo('App\Category','main_category_id');
    }
    public function subcategories(){
      # code...
      return $this->hasMany('App\Category','main_category_id');
    }
    public function products($value='')
    {
      # code...
      return $this->hasMany('App\Product');
    }
}
