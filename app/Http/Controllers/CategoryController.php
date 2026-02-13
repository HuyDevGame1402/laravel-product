<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('is_delete', 0)->get();
        return view('categories.index', compact('categories'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::where('is_delete', 0)->get();
        return view('categories.create', compact('categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'is_active' => $request->is_active ?? 1,
        ]);

        return redirect()->route('categories.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::where('id', '!=', $category->id)->get();
        return view('categories.edit', compact('category', 'categories'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        if ($request->parent_id == $category->id) {
            return back()->withErrors('Không thể chọn chính nó làm danh mục cha');
        }
        if ($this->isChild($request->parent_id, $category->id)) {
            return back()->withErrors('Không thể chọn danh mục con làm cha');
        }

        $category->update($request->all());

        return redirect()->route('categories.index');
    }

    private function isChild($parentId, $categoryId)
    {
        while ($parentId) {
            if ($parentId == $categoryId) return true;
            $parent = Category::find($parentId);
            $parentId = $parent?->parent_id;
        }
        return false;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->update(['is_delete' => 1]);
        return redirect()->route('categories.index');
    }

}
