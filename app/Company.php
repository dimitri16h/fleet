<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function users() {
        return $this->belongsToMany(User::class, 'company_user');
    }
}
