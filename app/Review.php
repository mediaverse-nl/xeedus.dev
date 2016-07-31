<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $primaryKey = 'id';

    public $timestamps = false;
    //
    public function author()
    {
        return $this->belongsTo('App\Author', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public function video()
    {
        return $this->belongsTo('App\Video', 'id');
    }
}
