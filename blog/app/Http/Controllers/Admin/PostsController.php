<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Post;

use App\Category;

use App\Tag;

use Carbon\Carbon;

use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index(){

    	$posts = Post::all(); //Utilizamos el modelo Post de elocuent para obtener los posts de la bbdd

    	return view('admin.posts.index', compact('posts')); //compact es para pasar la variable posts a la vista.

    }

    // public function create() {

    // 	$categories = Category::all();

    // 	$tags = Tag::all();

    // 	return view ('admin.posts.create', compact('categories', 'tags'));
    // }

    public function store(Request $request) {

        $this->validate($request, ['title' => 'required']);

         $post = Post::create([
            'title' => $request->get('title'),
            'url' => str_slug($request->get('title'))
            ]); //creamos

        return redirect()->route('admin.posts.edit', $post); // y redireccionamos
    }

    public function edit(Post $post) {


        $categories = Category::all();

        $tags = Tag::all();

        return view ('admin.posts.edit', compact('categories', 'tags', 'post'));
    }

    public function update(Post $post, Request $request) {

        //dd($request->has('published_at'));

    	$this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'required',
            'excerpt' => 'required'
        ]);

    	// return create($request->all();

    	// $post = new Post;
        $post->title = $request->get('title');
        //$post->url = str_slug($request->get('title'));
    	$post->body = $request->get('body');
    	$post->excerpt = $request->get('excerpt');
    	$post->published_at = $request->has('published_at') ? Carbon::parse($request->get('published_at')) : null; // carbon para dar un formato que laravel pueda leer
    	$post->category_id = $request->get('category');
    	$post->save();

    	$post->tags()->sync($request->get('tags'));	// tags() es una funcion ya definida (si revisamos el model Post, ahi la vemos), luego le adjuntamos (attach()) el valor recibido.

    	return back()->with('flash', 'Tu publicación ha sido guardada');	// para retornar a la página anterior. le pasamos un mensaje de sesión con la llave flash
    }
}
