<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'foods';

    public function user()
    {
        return $this->belongsTo("App\User");
    }

    public function type()
    {
        return $this->belongsTo("App\Type");
    }

    public function tags()
    {
        return $this->belongsToMany("App\Tag");
    }

    public function orders()
    {
        return $this->belongsToMany("App\Order");
    }
}
