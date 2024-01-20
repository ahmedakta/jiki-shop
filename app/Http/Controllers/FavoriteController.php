<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    // store
    public function store(Request $request)
    {
           // Set Main Variables
           $productId = $request->input('product_id');
           $user = Auth::user();
   
           // Check if user registered or not
           if ($user) {
               // we should check first if product added before or not.
                   // dd($user->cartProducts->where('id' , '=' , $productId));
               if($user->favorites->where('product_id' , '=' , $productId)->first()){
                   // delete product from basket
                   $user->favorites()->detach($productId);
                   $status = 'deleted';
               }else{
                   $user->favorites()->attach($productId);
                   $status = 'success';
               }
               $cart = $user->cartProducts;
           }else{ // If User not logged in we storing the product into Session
               $product = Product::find($productId);
               $favorites = $request->session()->get('favorites' , []);
               // Check if the product is already in the cart
               if (isset($product) && !isset($favorites[$product->id])) {
                   $favorites[$product->id] =
                   [
                       'id' => $product->id,
                       'product_title' => $product->product_title,
                       'product_price' => $product->product_price,
                       'product_photos' => $product->product_photos,
                       'product_quantity' => $quantity,
                       'total' => ($quantity * $product->product_price),
                   ];
                   $status = 'success';
               }else{
                   $status = 'deleted';
                   unset($favorites[$product->id]);
               }
               $request->session()->put('favorites', $favorites);
           }
           return response()->json(['status' => $status , 'data' => $favorites]);
    }
}
