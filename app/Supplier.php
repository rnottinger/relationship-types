<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model {
    /**
     * Get the user's history
     */
    public function userHistory() {
        return $this->hasOneThrough(
            'App\History',
            'App\User',
        );

        // return $this->hasOneThrough(
        //     'App\final_model_we_wish_to_access,
        //     'App\the_name_of_the_intermediate_model',
        //     'supplier_id', // Foreign key on users table...
        //     'user_id', // Foreign key on history table...
        //     'id', // Local key on suppliers table...
        //     'id' // Local key on users table...
        // );
    }

    public function user() {
        return $this->hasOne('App\User');
    }
}
