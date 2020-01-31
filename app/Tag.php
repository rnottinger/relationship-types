<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    /**
     * Get all of the posts that are assigned this tag.
     *
     * used in the many-to-many polymorphic relation
     */
    public function posts() {
        return $this->morphedByMany('App\Post', 'taggable');
    }

    /**
     * Get all of the videos that are assigned this tag.
     *
     * used in the many-to-many polymorphic relation
     */
    public function videos() {
        return $this->morphedByMany('App\Video', 'taggable');
    }
}
