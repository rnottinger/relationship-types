<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    protected $fillable = ['title'];

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the post's image.
     */
    public function image() {
        return $this->morphOne('App\Image', 'imageable');
    }
}
