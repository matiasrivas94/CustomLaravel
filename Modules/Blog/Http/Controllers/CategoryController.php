<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Blog\Entities\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view ('blog::categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('blog::categories.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
        
        Category::create($request->all());
       
        return redirect()->route('blg::categories.index')
            ->with('success', 'Categoria Creada Exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view ('blog::categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view ('blog::categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);

        $category->update($request->all());
        return redirect()->route('blog::categories.show', $category)
            ->with('success', 'Categoria correctamente actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('blg::categories.index');
    }
}
