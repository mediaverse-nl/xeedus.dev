<?php

namespace Xeedus;

use Illuminate\Database\Eloquent\Model;

class Koppeltabelchat extends Model
{
    //
    public function chatbox()
    {
        return $this->belongsTo('Xeedus\Chatbox');
    }

    public function user()
    {
        return $this->belongsTo('Xeedus\User');
    }
}
