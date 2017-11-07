<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\User;
use Validator;


class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    public function index() {

        // dd(Post::get());
        $posts = post::All();
        // return response()->json(['test' => 'inside index', 'state' => 'CA']);

        // $posts = $this->post->query()->get();
        // $posts = Post::get();//->paginate(5);
	    // return response()->json($posts);
        // return "test";
        // return $posts ;
        return response()->json(['test' => 'inside index', 'posts' => $posts]);
        // return view('post.index', ['posts' => $posts]);
    }

    

    

    //
}
