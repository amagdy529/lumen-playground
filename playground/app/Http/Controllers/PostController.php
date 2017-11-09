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


    public function create(Request $request){
        
        $errors_arr = array();
       
        if (!$request->has('title')) {
            return response()->json(['status' => "title isn't set!!"]);
        }
        if (!$request->has('body')) {
            return response()->json(['status' => "body isn't set!!"]);
        }

        if(empty($request->title)){
            $errors_arr [] = "empty title field" ;
        }
        if(empty($request->body)){
            $errors_arr [] = "empty body field" ;
        }

      
        if (sizeof($errors_arr) > 0) {
            $false_arr = array(
                "status" => false,
                "status_msg" => $errors_arr,
            );
            return $false_arr;
        }

        
        $post = new $this->post;
        if (!empty($request->title)) {
            $post->title = $request->title;
            $post->save();    
        }
        if (!empty($request->body)) {
            $post->body = $request->body;
            $post->save();    
        }
        $post_obj = array(
            'ID' => $post->id , 
            'title' => $post->title , 
            'body' => $post->body , 
            'body' => $post->body , 
            'updated_at' => $post->updated_at , 
            'created_at' => $post->created_at , 
        ); 
        if ($post->save()) {
            return response()->json(['status' => 'saved new post successfully' , 'post'=>$post_obj]);
        }else{
            return response()->json(['status' => 'Failed to save new post !!']);
        }

    }



    

    //
}
