<?php

use App\Post;
use App\Category;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	Post::truncate();
    	Category::truncate();
        Tag::truncate();

        $tag = new Tag;
        $tag->name = "Etiqueta 1";
        $tag->save();

        $tag = new Tag;
        $tag->name = "Etiqueta 2";
        $tag->save();

    	$category = new Category;
    	$category->name = "Categoría 1";
    	$category->save();

    	$category = new Category;
    	$category->name = "Categoría 2";
    	$category->save();

        $post = new Post;
        $post->title = "Mi primer post";
        $post->excerpt = "Extracto de mi primer post";
        $post->body = "<p>Contenido de mi primer post</p>";
        $post->published_at = Carbon::now()->subDays(4); // para decirle que fue hecho hace 4 dias
        $post->category_id = 1; // para que no de error, y tome ese valor por defecto
        $post->save(); // Para que lo guarde en la bbdd


        $post = new Post;
        $post->title = "Mi segundo post";
        $post->excerpt = "Extracto de mi segundo post";
        $post->body = "<p>Contenido de mi segundo post</p>";
        $post->published_at = Carbon::now()->subDays(3);
        $post->category_id = 1;
        $post->save();

        $post = new Post;
        $post->title = "Mi tercer post";
        $post->excerpt = "Extracto de mi tercer post";
        $post->body = "<p>Contenido de mi tercer post</p>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->category_id = 2;
        $post->save();

        $post = new Post;
        $post->title = "Mi cuarto post";
        $post->excerpt = "Extracto de mi cuarto post";
        $post->body = "<p>Contenido de mi cuarto post</p>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->category_id = 2;
        $post->save();

    }
}
