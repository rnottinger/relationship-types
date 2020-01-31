<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
    protected $fillable = ['post_id'];
    // or can turn mass assignment off
    // protected $guarded = [];

    public function post() {
        return $this->belongsTo('App\Post');
    }
}
