<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Category;
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

    /**
     * @return Renderable
     */
    public function show(Post $post)
    {
        $postsimilares = Post::where('category_id', $post->category_id)
                                    ->where('state',2)  //Post publicados
                                    ->latest('id')      //Ordenados descendente
                                    ->take(4)           //Cantidad solicitada
                                    ->get();
        return view ('blog::posts.show', compact('post','postsimilares'));
                                    
        // $post->loadMissing('category', 'tags', 'image');
        // return view('blog::posts.show', [
        //     'post'          =>  $post
        // ]);
    }

    public function category(Category $category){

        $posts = Post::where('category_id', $category->id)
                                    ->where('state',2)
                                    ->latest('id')
                                    ->paginate(6);
                                    
        return view ('blog::posts.category', compact('posts','category'));
    }

}
