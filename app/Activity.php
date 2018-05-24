<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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

    /**
     * Retrieve records sorted by views count.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $direction
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOrderByViewsCount(Builder $query, string $direction = 'desc'): Builder
    {
        $viewable = $query->getModel();
        $viewModel = app(\CyrildeWit\PageViewCounter\Contracts\PageView::class);

        return $query->leftJoin($viewModel->getTable(), "{$viewModel->getTable()}.visitable_id", '=', "{$viewable->getTable()}.{$viewable->getKeyName()}")
            ->selectRaw("{$viewable->getTable()}.*, count('{$viewModel->getTable()}.visitable_id') as numOfViews")
            ->groupBy("{$viewable->getTable()}.{$viewable->getKeyName()}")
            ->orderBy('numOfViews', $direction);
    }

}
