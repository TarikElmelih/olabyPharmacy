<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function showProducts($id)
    {   
        $all_categories = Category::all();
        $category = Category::find($id);
        $products = $category->products()->paginate(9);
        $subcategories = $category->subCategories; // Add this line to fetch subcategories
        return view('front.product_cate', compact('category', 'products', 'all_categories', 'subcategories'));
    }

    public function showAllCategories()
    {
        $categories = Category::all();
        return view('front.showAllCategories', compact('categories'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

        $category = new Category([
            'name' => $request->name,
            'code' => $request->code,
            'image' => $request->image,
            'created_by' => Auth::user()->id,
            'desc' => $request->desc
        ]);

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            // Get the uploaded file
            $file = $request->file('image');

            // Generate a unique filename
            $filename = time() . '-' . $file->getClientOriginalName();

            // Move the file to the public/images/categorys directory
            $file->move(public_path('images/categories'), $filename);

            // Save the filename in the database
            $category->image = $filename;
        }

        // Save the updated category to the database
        $category->save();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'desc' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'code' => $request->code,
            'desc' => $request->desc,
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image
            if ($category->image) {
                Storage::delete(public_path("images/categories/{$category->image}"));
            }

            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path("images/categories"), $filename);
            $category->image = $filename;
            $category->save();
        }

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        
        // Delete the image
        if ($category->image) {
            Storage::delete(public_path("images/categories/{$category->image}"));
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
