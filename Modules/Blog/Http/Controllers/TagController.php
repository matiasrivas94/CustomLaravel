<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::all();
        return view('blog::tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors = [
            'red' => 'Color rojo',
            'yellow' => 'Color amarillo',
            'blue' => 'Color azul',
            'indigo' => 'Color indigo',
            'purple' => 'Color purpura',
            'pink' => 'Color rosado',
            'green' => 'Color verde'
        ];
        return view('blog::tags.create', compact($colors));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required'
        ]);

        $data = Tag::create($request->all());
       
        return redirect()->route('blg.tags.index',$data)
            ->with('success', 'Tag Creada Exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        return view('blog::tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tag)
    {
        $colors = [
            'red' => 'Color rojo',
            'yellow' => 'Color amarillo',
            'blue' => 'Color azul',
            'indigo' => 'Color indigo',
            'purple' => 'Color purpura',
            'pink' => 'Color rosado',
            'green' => 'Color verde'
        ];

        return view('blog::tags.edit', compact('tag','colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tag)
    {
        
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required'
        ]);

        $tag->update($request->all());
        return redirect()->route('blog::tags.show', $tag)
            ->with('success', 'Tag correctamente actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('blg::tags.index')
                ->with('success', 'Tag Eliminada.');;
    }
}
