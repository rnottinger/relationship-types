<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {

    /**
     * Get all of the video's comments.
     */
    public function polymorphicComments() {
        return $this->morphMany('App\PolymorphicComment', 'commentable');
    }
}
