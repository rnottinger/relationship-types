<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PolymorphicComment extends Model {
    protected $fillable = ['body'];
    /**
     * Get the owning commentable model.
     */
    public function commentable() {
        return $this->morphTo();
    }
}
