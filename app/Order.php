<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $table = 'order';
    //
    public function video()
    {
        return $this->belongsTo('App\Video', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }
}
