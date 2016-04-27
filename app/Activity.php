<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;

    /**
     * Related User
     */
    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Related Comments
     */
    public function comments()
    {
        return $this->HasMany('App\ActivityComment')->with('author');
    }

    /**
     * Related Attends
     */
    public function attends()
    {
        return $this->HasMany('App\ActivityAttend')->with('author');
    }
}
