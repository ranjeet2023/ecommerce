<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function cart(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $products = Product::whereIn('id', $cart)->get();
        return view('cart', compact('products'));
    }

    public function AddCart(Request $request,$id)
    {
      $product = Product::find($id);
      if (!$product) {
          return response()->json(['status' => 'error', 'message' => 'Product not found.']);
      }
      $cart = $request->session()->get('cart', []);
      if (in_array($id, $cart)) {
          return response()->json(['status' => 'error', 'message' => 'Product is already in the cart.']);
      }
      $cart[] = $id;
      $request->session()->put('cart', $cart);
      return response()->json(['status' => 'success', 'message' => 'Product "' . $product->name . '" added to cart.']);
    }

    public function getCartCount(Request $request)
    {
        $cartCount = count($request->session()->get('cart', []));
        return response()->json(['count' => $cartCount]);
    }

    public function removeFromCart(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);
        $index = array_search($id, $cart);
        if ($index !== false) {
            unset($cart[$index]);
            $request->session()->put('cart', $cart);
        }
        return response()->json(['status' => 'success', 'message' => 'Product removed from cart.']);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function checkOut( $id)
    {
        $product = Product::find($id);
        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Product not found.']);
        }
        return view('sms-login')->with('product', $product);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
