<?php

namespace App;

use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        if (Auth::user()->role == 'admin')
        {
            return true;
        }
        return false;
    }

    public function isAuthor()
    {
        if (Auth::user()->role == 'author')
        {
            return true;
        }
        return false;
    }

    protected $primaryKey = 'id';

    public $timestamps = false;


    public function author()
    {
        return $this->hasOne('App\Author');
    }

    public function creditorder()
    {
        return $this->hasMany('App\CreditOrder');
    }

    public function koppeltabelchat()
    {
        return $this->hasMany('App\Koppeltabelchat');
    }

    public function chatmessage()
    {
        return $this->hasMany('App\Chatmessage');
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

}
