<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Sub_Category;
use App\Models\Brand;
use App\Models\ScientificName;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all products from the database
        $products = Product::with(['category', 'brand'])->get();
        $scientific_names = ScientificName::all();
        // Pass the products to the view
        return view('admin.products.index', compact('products','scientific_names'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all(); // Assuming you have a Category model
        $sub_categories = Sub_Category::all(); // Assuming you have a Category model
        $brands = Brand::all(); // Assuming you have a Brand model
        $scientific_names = ScientificName::all();
    return view('admin.products.create', compact('categories', 'brands','sub_categories','scientific_names'));
    }

 public function searchProducts(Request $request)
    {
        $query = $request->input('query');

        $products = Product::where('name', 'LIKE', "%{$query}%")
                           ->orWhere('manufacturer', 'LIKE', "%{$query}%")
                           ->get();

        return response()->json($products);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       

        
        // Create a new product instance
        $product = new Product([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'brand_id' => $request->brand_id,
            'price' => $request->price,
            'discount_price' => $request->discount_price,
            'image' => $image ?? null,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'in_stock' => $request->in_stock,
            'offer' => $request->has('offer') ? 1 : 0,
            'featured' => $request->has('featured') ? 1 : 0,
            'scientific_name_id' => $request->scientific_name_id,
            'manufacturer' => $request->manufacturer,
        ]);
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('images/products'), $filename);
            $product->image = $filename;
        }
        // Save the product
        $product->save();

        // Return a response, typically a redirect or a JSON response
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Fetch the product from the database
        $product = Product::with(['category', 'brand'])->findOrFail($id);

        // Pass the product to the view
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       // Fetch the product from the database
    $product = Product::findOrFail($id);
    $scientific_names = ScientificName::all();
    // Fetch categories, subcategories, and brands
    $categories = Category::all();
    $sub_categories = Sub_Category::all();
    $brands = Brand::all();

        // Pass the product to the view
        return view('admin.products.edit', compact('product','brands','sub_categories','categories','scientific_names'));
        
    }
   public function update(Request $request, string $id)
{
    // Validate the incoming request data
    $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|integer',
        'brand_id' => 'required|integer',
        'price' => 'required|numeric',
        'discount_price' => 'nullable|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'short_description' => 'nullable|string',
        'long_description' => 'nullable|string',
        'in_stock' => 'required|integer',
        'offer' => 'sometimes|boolean',
        'featured' => 'sometimes|boolean',
        'scientific_name_id' => 'required|integer',
        'manufacturer' => 'nullable|string|max:255',
    ]);

    // Find the product by ID
    $product = Product::findOrFail($id);

    // Update the product attributes
    $product->name = $request->name;
    $product->category_id = $request->category_id;
    $product->brand_id = $request->brand_id;
    $product->price = $request->price;
    $product->discount_price = $request->discount_price;
    $product->short_description = $request->short_description;
    $product->long_description = $request->long_description;
    $product->in_stock = $request->in_stock;
    $product->offer = $request->has('offer') ? 1 : 0;
    $product->featured = $request->has('featured') ? 1 : 0;
    $product->scientific_name_id = $request->scientific_name_id;
    $product->manufacturer = $request->manufacturer;

    // Check if an image is uploaded
    if ($request->hasFile('image')) {
        // Get the uploaded file
        $file = $request->file('image');

        // Generate a unique filename
        $filename = time() . '-' . $file->getClientOriginalName();

        // Move the file to the public/images/products directory
        $file->move(public_path('images/products'), $filename);

        // Save the filename in the database
        $product->image = $filename;
    }

    // Save the updated product to the database
    $product->save();

    return redirect()->route('admin.products.index')
        ->with('success', 'Product updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the product by ID and delete it
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }

   
}


