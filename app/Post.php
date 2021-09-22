<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable= ['author', 'title', 'img_path'];

    public function category() {
        return $this->belongsTo(Category::class);
    }

}
