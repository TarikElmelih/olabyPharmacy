<?php

namespace App\Http\Controllers;

use App\Models\Sub_Category;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
       // Display a listing of the subcategories
       public function index()
       {
           $subcategories = Sub_Category::all();
           return view('admin.subcategories.index', compact('subcategories'));
       }
   
       // Show the form for creating a new Sub_Category
       public function create()
       {
           $categories = Category::all(); // Get all categories for the dropdown
           return view('admin.subcategories.create', compact('categories'));
       }
   
       // Store a newly created Sub_Category in the database
       public function store(Request $request)
       {
           $request->validate([
               'name' => 'required|string|max:255',
               'category_id' => 'required|exists:categories,id',
           ]);
   
           Sub_Category::create($request->all());
   
           return redirect()->route('admin.subcategories.index')
                            ->with('success', 'Sub_Category created successfully.');
       }
   
       // Display the specified Sub_Category
       public function show(Sub_Category $Sub_Category)
       {
           return view('admin.subcategories.show', compact('Sub_Category'));
       }
   
       // Show the form for editing the specified Sub_Category
       public function edit(Sub_Category $Sub_Category)
       {
           $categories = Category::all(); // Get all categories for the dropdown
           return view('admin.subcategories.edit', compact('Sub_Category', 'categories'));
       }
   
       // Update the specified Sub_Category in the database
       public function update(Request $request, Sub_Category $Sub_Category)
       {
           $request->validate([
               'name' => 'required|string|max:255',
               'category_id' => 'required|exists:categories,id',
           ]);
   
           $Sub_Category->update($request->all());
   
           return redirect()->route('admin.subcategories.index')
                            ->with('success', 'Sub_Category updated successfully.');
       }
   
       // Remove the specified Sub_Category from the database
       public function destroy(Sub_Category $Sub_Category)
       {
           $Sub_Category->delete();
   
           return redirect()->route('admin.subcategories.index')
                            ->with('success', 'Sub_Category deleted successfully.');
       }

       public function showProducts($id)
       {   
        $subcategory = Sub_Category::findOrFail($id);
        $products = $subcategory->products()->paginate(9); // Change this line
        $all_categories = Category::all(); // Fetch all categories for the sidebar

        return view('front.test', compact('subcategory', 'products', 'all_categories'));
       }
}
