<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CreditOrder extends Model
{
    //
    protected $table = 'creditorder';

    protected $primaryKey = 'id';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
