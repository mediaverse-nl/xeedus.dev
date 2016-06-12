<?php

namespace Xeedus;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    //

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function video()
    {
        return $this->belongsTo('App\Video');
    }
}
