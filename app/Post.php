<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Post
 *
 * @property-write mixed $title 
 */
class Post extends Model
{
    protected $dates = ['published_at'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (!$this->exists)
        {
            $this->attributes['slug'] = str_slug($value);
        }
    }
}
