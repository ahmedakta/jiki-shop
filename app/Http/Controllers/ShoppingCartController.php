<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShoppingCart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ShoppingCartController extends Controller
{
    public function index(Request $request)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            $userId = Auth::id();
            $user = User::find($userId);
            $cart = $user->cartProducts;
        } else {
            $cart = $request->session()->get('cart');
        }
        $cart = convertJson($cart);
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
        $quantity = $request->input('quantity') ?? 1; // The default of quantity is 1
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
                    'product_quantity' => $quantity,
                    'total' => ($quantity * $product->product_price),
                ];
            }else{
                $status = 'deleted';
                unset($sessionCart[$product->id]);
            }
            $request->session()->put('cart', $sessionCart);
        }
        return response()->json(['status' => $status , 'data' => $sessionCart]);
    }
    public function update(Request $request)
    {
        // Set Main Variables
        $productId = $request->input('product_id');
        $quantityAction = $request->input('quantity_action'); // To know if function called for +1 on quantity or -1.
        $user = Auth::user();

        if ($user) {

            $product = ShoppingCart::where([
                'product_id'=> $productId , 
                'user_id' => $user->id
            ])->first();
            if (!$product) {
                return abort(404); // or redirect or handle accordingly
            }
            $newQuantity = $quantityAction ? $product->quantity + 1 : $product->quantity - 1;
            $user->cartProducts()->updateExistingPivot($productId, ['quantity' => $newQuantity]);
            $status = 'success';
            dd($user->cartProducts);
            $sessionCart = $user->cartProducts;
            // Check if the product exists

        }else{ // If User not logged in we storing the product into Session
            $status = 'success';
            $product = Product::find($productId);
            $sessionCart = $request->session()->get('cart' , []);
            // Check if the product is already in the cart
            if (isset($product) && isset($sessionCart[$product->id])) {
                $currentQuantity = $sessionCart[$product->id]['product_quantity'];
                $productCartQuantity =  $quantityAction ? ($currentQuantity + 1) : ($currentQuantity - 1);
                $productCartPrice = $sessionCart[$product->id]['product_price'];
                // Quantity conditios
                if($productCartQuantity < 1)
                {
                    return response()->json(['status' => $status , 'data' => $sessionCart]);
                }
                $sessionCart[$product->id] =
                 [
                    'id' => $product->id,
                    'product_title' => $product->product_title,
                    'product_price' => $product->product_price,
                    'product_photos' => $product->product_photos,
                    'product_quantity' => $productCartQuantity,
                    'total' => $productCartQuantity * $productCartPrice,
                ];
            }
            $request->session()->put('cart', $sessionCart);
        }
        return response()->json(['status' => $status , 'data' => $sessionCart]);
    }
}
