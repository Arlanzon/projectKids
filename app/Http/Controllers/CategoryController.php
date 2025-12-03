<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:categories.view')->only(['index', 'show']);
        $this->middleware('permission:categories.create')->only(['create', 'store']);
        $this->middleware('permission:categories.update')->only(['edit', 'update']);
        $this->middleware('permission:categories.delete')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all(); 
 
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categories.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        ]);

        Category::create([
        'name' => $request->name,
        ]);

          return redirect()->route('categories.index')->with('éxito', '¡Categoría creada exitosamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
      $category->update([
            'name' => $request->input('name'),
        ]);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
         $category->delete();

        return redirect()->route('categories.index');
    }

}
