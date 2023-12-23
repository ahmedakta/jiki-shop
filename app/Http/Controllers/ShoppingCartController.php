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
            $userId = Auth::id();
            $cart = ShoppingCart::where('user_id', $userId)->pluck('product_id', 'quantity')->toArray();
        } else {
            $cart = $request->session()->get('cart');
        }
        // Check requset
        if($request->expectsJson()){
            return response()->json(['success' => true ,'data' => $cart]);
        }
        return view('frontend.cart' , compact('cart'));
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
            $status = 'success';
            $product = Product::find($productId);
            $sessionCart = $request->session()->get('cart' , []);
            // Check if the product is already in the cart
            if (isset($product) && !isset($sessionCart[$product->id])) {
                $sessionCart[$product->id] =
                 [
                    'id' => $product->id,
                    'product_title' => $product->product_title,
                    'product_price' => $product->product_price,
                    'product_photos' => $product->product_photos,
                ];
            }else{
                $status = 'deleted';
                unset($sessionCart[$product->id]);
            }
            $request->session()->put('cart', $sessionCart);
        }
        return response()->json(['status' => $status , 'data' => $sessionCart]);
    }
}
