<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function phone() {
        /**
         * hasOne
         *     1st parameter...related,
         *     2nd parameter...optional foreignKey
         *         column name automatically assumed to have user_id column
         *         specify this argument to override this convention
         *             in other words ... if you have a different name for the foreign key in the phone table
         *     3rd parameter..Eloquent assumes that the foreign key
         *         should have a value matching the id of the parent
         *         Eloquent will look for users->id = phone->users_id
         *         If you would like the relationship to use a value other than id
         *             you may pass a third argument
         *                 to the hasOne method
         *                     specifying your custom key
         *
         */
        return $this->hasOne('App\Phone');
    }

    public function roles() {
        return $this->belongsToMany('App\Role')->withTimestamps();
        // return $this->belongsToMany('App\Role')->withPivot('column1', 'column2'); if pivot table contains extra columns
    }

    public function history() {
        return $this->hasOne('App\History');
    }

    public function supplier() {
        return $this->belongsTo('App\Supplier');
    }

    public function country() {
        return $this->belongsTo('App\Country');
    }

    public function posts() {
        return $this->hasMany('App\Post');
    }

    /**
     * Get the user's image.
     */
    public function image() {
        return $this->morphOne('App\Image', 'imageable');
    }
}
