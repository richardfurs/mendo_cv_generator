<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function education()
    {
        return $this->hasMany('App\Education');
    }

    public function languages()
    {
        return $this->hasMany('App\Language');
    }
}
