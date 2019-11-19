<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
//use Cviebrock\EloquentSluggable\Services\SlugService;
//use Cviebrock\EloquentSluggable\SluggableInterface;
//use Cviebrock\EloquentSluggable\SluggableTrait;


class Post extends Model //implements SluggableInterface
{
    //

    use Sluggable;

//    Protected $sluggableold = [
//        'source' => 'title',
//        'saveTo' => 'slug',
//        'onUpdate' => true,
//    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'onUpdate' => true,
            ]
        ];
    }

    protected $fillable = [

        'category_id',
        'photo_id',
        'title',
        'body'

    ];

    public function user(){

        return $this->belongsTo('App\User');

    }

    public function photo(){

        return $this->belongsTo('App\Photo');

    }

    public function category(){

        return $this->belongsTo('App\Category');

    }

    public function comments(){

        return $this->hasMany('App\Comment');

    }

}
