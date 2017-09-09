<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    protected $fillable = ['title', 'completed','user_id'];

    public function getCompletedAttribute($value)
    {
        return (bool) $value;
    }
    public function user ()
    {

        return $this->belongsTo('App\User');
    }

    public function tasks ()
    {
        return $this->hasMany('App\Task');
    }
}
