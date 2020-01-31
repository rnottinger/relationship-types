<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {
    /**
     * Get the owning imageable model.
     *
     * used in the one-to-one polymorphic relation
     */
    public function imageable() {
        return $this->morphTo();
    }
}
