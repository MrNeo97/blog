<?php

namespace App;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

	protected $guarded = []; //para deshabilitar la proteccion de asignacion masiva. Activar en caso de que de error de Mass AssignmentException

    protected $dates = ['published_at'];

    public function getRouteKeyName() {
        return 'url';
    }

    public function category() {	// para luego poder llamar asi a la categoría $post->category->name

    	return $this->belongsTo(Category::class);

    }

    public function tags() {

    	return $this->belongsToMany(Tag::class);	//belongstomany-> Pertenece a muchos | tag::class -> haciendo referencia a la clase tag
    }

    public function scopePublished($query) {

		$query->whereNotNull('published_at')
				->where('published_at', '<=', Carbon::now())
				->latest('published_at');
    }
}
