<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
    protected $fillable = ['title'];
    // or can turn mass assignment off
    // protected $guarded = [];

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the post's image.
     *
     * used in the one-to-one polymorphic relation
     */
    public function image() {
        return $this->morphOne('App\Image', 'imageable');
    }

    /**
     * Get all of the post's comments.
     *
     * use in the one-to-many polymorphic relation
     *
     * normally you would just want to name this method comments()
     * but since I'm already demonstrating one-to-many using the comments table
     * I just created a new table named polymorphic_comments
     * so I named this method to correspond with the table
     * I also did the same thing in the Video model
     */
    public function polymorphicComments() {
        return $this->morphMany('App\PolymorphicComment', 'commentable');
    }

    /**
     * Get all of the tags for the post.
     *
     * used in the many-to-many polymorphic relation
     */
    public function tags() {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
