<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function activations()
    {
        
        return $this->hasOne(\App\UserActivation::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','registration_id','validation_status','active',
    ];




    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function orgs()
    {
        return $this->belongsToMany(Org::class, 'org_user');
    }

    public function acts()
    {
        return $this->hasMany(Act::class, 'user_id');
    }

    public function addActivationsData($token)
    {   
        if ($this->activations) {
            $this->activations()->update(['token'=>$token]);
        } else {
            $this->activations()->save(new \App\UserActivation([
                'token' => $token
            ]));
        }
    }
}
