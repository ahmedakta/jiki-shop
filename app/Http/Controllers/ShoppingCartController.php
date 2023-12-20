<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
            return response()->json(['cart' => $userCartItems]);
        } else {
            // User is not logged in, retrieve cart items from the session
            $cart = $request->session()->get('cart', []);
            return response()->json(['cart' => $cart]);
        }
        return view('frontend.cart');
    }

    public function store(Request $request)
    {
        // Set Main Variables
        $productId = $request->input('product_id');
        $user = Auth::user();

        // Check if user registered or not
        if ($user) {
            ShoppingCart::create([
                'user_id' => $user->id,
                'product_id' => $productId,
            ]);
        }else{ // If User not logged in we storing the product into Session
            $product = Product::find($productId);
            $cart = $request->session()->get('cart', []);
            // Check if the product is already in the cart
            if (isset($product) && !isset($cart[$product->id])) {
                $cart[$productId] = $product->id;
            }else{
                unset($cart[$productId]);
            }
            $request->session()->put('cart', $cart);
        }
        $request->session()->flash('success', __('Product Added Successfully.'));
        return response()->json(['success' => true]);
    }
}
