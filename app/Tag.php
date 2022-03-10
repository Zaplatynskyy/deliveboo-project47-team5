<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function foods()
    {
        return $this->belongsToMany("App\Food");
    }
}
