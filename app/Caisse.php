<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caisse extends Model
{
    public function guichet()
    {
        return $this->belongsTo('App\Guichet');
    } 
}
