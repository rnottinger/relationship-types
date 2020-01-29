<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {
    /**
     * Get all of the posts for the country
     */
    public function posts() {
        return $this->hasManyThrough('App\Post', 'App\User');

        // return $this->hasManyThrough(
        //     'App\final_model_we_wish_to_access,
        //     'App\the_name_of_the_intermediate_model',
        //     'supplier_id',     // 3rd argument is the name of the  Foreign key on intermediate model...
        //     'user_id',         // 4th argument is the name of the Foreign key on final model...
        //     'id', // Local key...
        //     'id' // Local key on intermediate model...
        // );
    }

    public function user() {
        return $this->hasOne('App\User');
    }
}
