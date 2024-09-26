<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::all();
        return view('admin.brands.index', compact('brands'));
    }
   public function showProducts($id)
    {   
        $all_brands = Brand::all();
        $brand = Brand::find($id);
        $products = $brand->products; // Assuming a Category has many Products
        return view('front.product_brand', compact('brand', 'products','all_brands'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

        $brand = new Brand([
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

            // Move the file to the public/images/brands directory
            $file->move(public_path('images/brands'), $filename);

            // Save the filename in the database
            $brand->image = $filename;
        }

        // Save the updated brand to the database
        $brand->save();

        return redirect()->route('admin.brands.index')
            ->with('success', 'brand created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
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

        $brand = Brand::findOrFail($id);
        $brand->update([
            'name' => $request->name,
            'code' => $request->code,
            'desc' => $request->desc,
        ]);

        if ($request->hasFile('image')) {
            // Delete the old image
            if ($brand->image) {
                Storage::delete(public_path("images/brands/{$brand->image}"));
            }

            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path("images/brands"), $filename);
            $brand->image = $filename;
            $brand->save();
        }

        return redirect()->route('admin.brands.index')
            ->with('success', 'brand updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = brand::findOrFail($id);
        
        // Delete the image
        if ($brand->image) {
            Storage::delete(public_path("images/brands/{$brand->image}"));
        }

        $brand->delete();

        return redirect()->route('admin.brands.index')
            ->with('success', 'brand deleted successfully.');
    }
}
