<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = ['id'];

    protected $fillable = [
        'naam', 'image', 'cate_id',
    ];

    public $timestamps = false;

    public function video()
    {
        return $this->hasMany('App\Video');
    }

    public function parent()
    {
        return $this->belongsTo('App\Category', 'cate_id');
    }
    
    public function children()
    {
        return $this->hasMany('App\Category', 'cate_id');
    }
}
