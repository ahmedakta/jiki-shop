<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index(Request $request)
    {
          // Check if the user is authenticated
          if (Auth::check()) {
            $cart = $request->session()->get('cart', []);
            // User is logged in
            $userId = Auth::id();
            // Retrieve user-specific cart items from the database or any other source
            $userCartItems = ShoppingCart::where('user_id', $userId)->pluck('product_id', 'quantity')->toArray();
            dd($userCartItems);
            return response()->json(['cart' => $userCart]);
        } else {
            // User is not logged in, retrieve cart items from the session
            $cart = $request->session()->get('cart', []);
            return response()->json(['cart' => $cart]);
        }
        return view('frontend.cart');
    }

    public function store(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        $product = Product::find($productId);

        $cart = $request->session()->get('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$productId])) {
            $cart[$productId] += $quantity;
        } else {
            $cart[$productId] = $quantity;
        }

        $request->session()->put('cart', $cart);

        return response()->json(['success' => true]);
    }
}
