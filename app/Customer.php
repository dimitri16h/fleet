<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function company() {
        return $this->belongsTo('App\Company');
    }

    public function loads() {
        return $this->hasMany('App\Load');
    }    
}
