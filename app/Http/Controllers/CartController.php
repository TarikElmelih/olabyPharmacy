<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{




    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = session()->get('cart', []);
        
       
        return view('front.cart', compact('cart'));
    }

    public function getItemCount()
    {
        $cart = session()->get('cart', []);
        $itemCount = array_sum(array_column($cart, 'quantity'));
        return response()->json(['itemCount' => $itemCount]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);

        if(!$product) {
            return redirect()->back()->with('error', 'لم يتم ايجاد المنتج');
        }

        $cart = session()->get('cart', []);

        if(!$cart) {
            $cart[$product->id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" =>  number_format($product->adjusted_discount_price, 2),
                "image" => $product->image
            ];
        } else {
            if(isset($cart[$product->id])) {
                $cart[$product->id]['quantity']++;
            } else {
                $cart[$product->id] = [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" =>  number_format($product->adjusted_discount_price, 2) ,
                    "image" => $product->image
                ];
            }
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'تمت اضافة المنتج بنجاح!');
    }
    /**
     * Display the specified resource.
     */
    public function show(cr $cr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cr $cr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $cart = session()->get('cart', []);

        foreach ($request->items as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity;
            }
        }

        session()->put('cart', $cart);
        return response()->json(['success' => true, 'cart' => $cart]);
    }


  public function destroy($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function clear()
    {
        session()->forget('cart');
        return response()->json(['success' => true]);
    }


}


