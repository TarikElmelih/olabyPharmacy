<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class UserProductController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('front.product_details', compact('product'));
    }
}
