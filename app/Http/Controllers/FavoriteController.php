<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Favrorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class FavoriteController extends Controller
{
   
    public function index(Request $request)
    {
        // get favories
        // Check if the user is authenticated
         if (Auth::check()) {
            $userId = Auth::id();
            $user = User::find($userId);
            $favorites = [];
            foreach ($user->favoritedProducts as $key => $product) {
                $favorites[$product->id] = $product;
            }
        } else {
            $favorites = $request->session()->get('favorites');
        }
        $favorites = convertJson($favorites);
        // Check requset
        if($request->expectsJson()){
            return response()->json(['success' => true ,'favorites' => $favorites]);
        }
        return view('frontend.favorites');
    }
    // store
    public function store(Request $request)
    {
           // Set Main Variables
           $productId = $request->all()[0];
           $user = Auth::user();
   
           // Check if user registered or not
           if ($user) {
               // we should check first if product added before or not.
                   // dd($user->cartProducts->where('id' , '=' , $productId));
               if($user->favorites->where('product_id' , '=' , $productId)->first()){
                   // delete product from basket
                   $user->favorites->where('product_id' , '=' , $productId)->first()->delete();
                   $status = 'deleted';
               }else{
                   $user->favorites()->create(['product_id' => $productId]);
                   $status = 'success';
               }
                //  TODO review this shit + review the angular js favorites & cart array****** IMPORTANT
               $user->load('favorites');
               $favorites = [];
                foreach ($user->favoritedProducts as $key => $favorite) {
                    $favorites[$favorite->id] = $favorite;
                }
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
                   ];
                   $status = 'success';
               }else{
                   $status = 'deleted';
                   unset($favorites[$product->id]);
               }
               $request->session()->put('favorites', $favorites);
           }
           return response()->json(['status' => $status , 'favorites' => $favorites]);
    }
}
