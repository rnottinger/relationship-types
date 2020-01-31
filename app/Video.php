<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {

    /**
     * Get all of the video's comments.
     *
     * used in the one-to-many polymorphic relation
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
