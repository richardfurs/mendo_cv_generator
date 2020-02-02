<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['lang_name', 'lang_speech', 'lang_read', 'lang_write'];

    protected $primaryKey = 'lang_id';

    public function user() {
        return $this -> belongsTo('App\User');
    }
}
