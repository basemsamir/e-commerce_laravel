<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Events extends Model
{
    //
    protected $fillable=[
      'title',
      'image',
      'event_datetime',
      'description',
      'user_id'
    ];

    public function getEventDatetimeAttribute($datetime)
    {
      # code...
        return Carbon::parse($datetime);
    }
}
