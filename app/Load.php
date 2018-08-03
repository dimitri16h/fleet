<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
	public function company() {
        return $this->belongsTo('App\Company');
    }

    public function customer() {
        return $this->belongsTo('App\Customer');
    }
}
