<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class ActivityLike extends Model
{
    use SoftDeletes;

    /**
     * Related User
     */
    public function activity()
    {
        return $this->belongsTo('App\Activity', 'activity_id');
    }

    /**
     * Related User
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
