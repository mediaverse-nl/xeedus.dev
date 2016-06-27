<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    //
    public function video()
    {
        return $this->belongsTo('App\Video', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Comment', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Comment', 'parent_id');
    }
    
}
