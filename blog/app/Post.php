<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $dates = ['published_at'];

    public function category() {	// para luego poder llamar asi a la categoría $post->category->name

    	return $this->belongsTo(Category::class);

    }

    public function tags() {

    	return $this->belongsToMany(Tag::class);	//belongstomany-> Pertenece a muchos | tag::class -> haciendo referencia a la clase tag
    }
}
