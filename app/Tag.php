<?php

namespace Xeedus;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    public function video()
    {
        return $this->belongsTo('Xeedus\Video');
    }
}
