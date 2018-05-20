<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use CyrildeWit\PageViewCounter\Traits\HasPageViewCounter;
use Actuallymab\LaravelComment\Commentable;
use App\User;



class Activity extends Model
{
    use HasPageViewCounter;
    use Commentable;

    protected $canBeRated = true;
    protected $appends = ['page_views'];

    protected $category = [
        'lecture',
        'charity',
        'career',
        'outdoors',
        'competition',
        'exhibition',
        'other'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'activity_user', 'activity_id', 'user_id');
    }

    public function creator($id)
    {
        return User::find($id);
    }

    public function getPageViewsAttribute()
    {
        return $this->getPageViews();
    }

}
