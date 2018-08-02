<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function users() {
        return $this->belongsToMany('App\User');
    }

    public function trucks() {
        return $this->hasMany('App\Truck');
    }

    public function customers() {
        return $this->hasMany('App\Customer');
    }
}
