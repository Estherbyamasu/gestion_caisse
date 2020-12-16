<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guichet extends Model
{
    public function caisses()
    {
        return $this->hasMany('App\Caisse');
    } 
}
