<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Post;

class PostController extends Controller
{

    public function __construct()
    {
        
        //$this->middleware('auth');
        //$this->middleware('can:blg.posts.index')->only('index');
    }

     /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $posts = Post::where('state',2)->paginate(10);
        return view ('blog::posts.index',[
            'posts' => $posts,
        ]);
    }
}
