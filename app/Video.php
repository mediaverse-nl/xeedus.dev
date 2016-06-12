<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';

    protected $fillable = [
        'name', 'created_at', 'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function order()
    {
        return $this->hasMany('App\Order');
    }

    public function view()
    {
        return $this->hasMany('App\View');
    }

    public function beoordeling()
    {
        return $this->hasMany('App\Beoordeling');
    }

    public function review()
    {
        return $this->hasMany('App\Review');
    }

    public function tag()
    {
        return $this->hasMany('App\Tag');
    }
}
