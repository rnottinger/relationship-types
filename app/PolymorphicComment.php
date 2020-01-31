<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PolymorphicComment extends Model {
    protected $fillable = ['body'];
    // or can turn mass assignment off
    // protected $guarded = [];
    //
    /**
     * Get the owning commentable model.
     *
     * used in the one-to-many polymorphic relation
     */
    public function commentable() {
        return $this->morphTo();
    }
}
