<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Post;

use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function index(){

    	$posts = Post::all(); //Utilizamos el modelo Post de elocuent para obtener los posts de la bbdd

    	return view('admin.posts.index', compact('posts')); //compact es para pasar la variable posts a la vista.

    }
}
