<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //

    public $uploads = '/images/';

    protected $fillable = ['file'];

    public function getFileAttribute($photo) {
        return $this->uploads . $photo;
    }

    public function user() {

        return $this->hasOne('App\User');

    }

    public function post() {

        return $this->hasOne('App\Post');

    }

}
