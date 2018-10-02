<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class PagesController extends Controller
{

	public function home() {

		$posts = Post::latest('published_at')->get();

	    return view('welcome', compact('posts')); //va a mandar un array asi ['posts' => $posts]

	}
}
