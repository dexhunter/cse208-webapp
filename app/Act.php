<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Act extends Model
{
    //
    protected $table = 'acts';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function creator()
    {
        return $this->belongsTo('App\User');
    }

    public function participants()
    {
        return $this->hasMany('App\User');
    }
}
