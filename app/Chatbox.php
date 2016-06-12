<?php

namespace Xeedus;

use Illuminate\Database\Eloquent\Model;

class Chatbox extends Model
{
    //


    public function chatmessage()
    {
        return $this->hasMany('Xeedus\Chatmessage');
    }

    public function koppeltabelchat()
    {
        return $this->hasMany('Xeedus\Koppeltabelchat');
    }
}
