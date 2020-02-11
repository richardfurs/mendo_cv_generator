<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = ['name', 'year_from', 'year_to', 'speciality'];

    protected $table = 'education';

    public function user() {
        return $this -> belongsTo('App\User');
    }
}
