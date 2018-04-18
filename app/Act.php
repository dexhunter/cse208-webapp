<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Act extends Model
{
    //
    protected $table = 'acts';

    public $primaryKey = 'id';

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
