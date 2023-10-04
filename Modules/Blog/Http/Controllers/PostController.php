<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Category;
use Modules\Blog\Entities\Post;
use Modules\Blog\Entities\Tag;
use Modules\Blog\Http\Requests\PostRequest;

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

      /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::orderBy('name')->get();

        return view('blog::posts.create', [
            'categorias' => $category
        ]);

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(PostRequest $request)
    {
        $data = array_merge($request->validated());

        Post::create($data);
        return redirect()->route('blg.posts.index')
            ->with('success', 'Post Creado Exitosamente.');
    }


    public function category(Category $category){

        $posts = Post::where('category_id', $category->id)
                                    ->where('state',2)
                                    ->latest('id')
                                    ->paginate(6);
                                    
        return view ('blog::posts.category', compact('posts','category'));
    }

    public function tag(Tag $tag){

        $posts = $tag->post()->where('state',2)->latest('id')->paginate(4);
                
        return view ('blog::posts.tag', compact('posts','tag'));
    }

       /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::pluck('name','id');
        $tag = Tag::all();

        return view ('blog::post.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);

        $post->update($request->all());
        return redirect()->route('blog::posts.show', $post)
            ->with('success', 'POST correctamente actualizado.');
    }

}
