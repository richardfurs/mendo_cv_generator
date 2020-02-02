<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $fillable = ['edj_name', 'edj_from', 'edj_to', 'edj_spec'];

    protected $primaryKey = 'edj_id';

    protected $table = 'education';

    public function user() {
        return $this -> belongsTo('App\User');
    }
}
