<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Truck extends Model
{
    public function company() {
        return $this->belongsTo('App\Company');
    }
}
