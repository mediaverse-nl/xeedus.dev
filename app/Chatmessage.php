<?php

namespace Xeedus;

use Illuminate\Database\Eloquent\Model;

class Chatmessage extends Model
{
    //
    public function user()
    {
        return $this->belongsTo('Xeedus\User');
    }
    public function chatbox()
    {
        return $this->belongsTo('Xeedus\Chatbox');
    }
}
