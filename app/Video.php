<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Nicolaslopezj\Searchable\SearchableTrait;

class Video extends Model
{
    use SearchableTrait;

    protected $searchable = [
//        'columns' => [
//            'users.name' => 10,
//            'profiles.username' => 5,
//            'profiles.bio' => 3,
//            'profiles.country' => 2,
//            'profiles.city' => 1,
//        ],
//        'joins' => [
//            'profiles' => ['users.id','profiles.user_id'],
//        ],
    ];

    protected $table = 'videos';

    protected $fillable = [
        'name', 'created_at', 'updated_at',
    ];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function author()
    {
        return $this->belongsTo('App\Author');
    }

    public function review()
    {
        return $this->hasMany('App\Review');
    }

    public function order()
    {
        return $this->hasMany('App\Order');
    }

    public function view()
    {
        return $this->hasMany('App\View');
    }
    
    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    public function beoordeling()
    {
        return $this->hasMany('App\Beoordeling');
    }

    public function tag()
    {
        return $this->hasMany('App\Tag');
    }
}
