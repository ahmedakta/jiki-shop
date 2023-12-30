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
            $userCart = $user->cartProducts;
            $cart = [];
            foreach ($userCart as $key => $cartItem) {
                $cart[$cartItem->id] = $cartItem;
                $cart[$cartItem->id]['product_quantity'] = $cartItem->pivot->quantity;
                $cart[$cartItem->id]['total'] = ($cartItem->pivot->quantity) * ($cartItem->product_price);
            }
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
            // we should check first if product added before or not.
                // dd($user->cartProducts->where('id' , '=' , $productId));
            if($user->cartProducts->where('id' , '=' , $productId)->first()){
                // delete product from basket
                $user->cartProducts()->detach($productId);
                $status = 'deleted';
            }else{
                $user->cartProducts()->attach($productId, ['quantity' => $quantity]);
                $status = 'success';
            }
            $cart = $user->cartProducts;
        }else{ // If User not logged in we storing the product into Session
            $product = Product::find($productId);
            $cart = $request->session()->get('cart' , []);
            // Check if the product is already in the cart
            if (isset($product) && !isset($cart[$product->id])) {
                $cart[$product->id] =
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
                unset($cart[$product->id]);
            }
            $request->session()->put('cart', $cart);
        }
        return response()->json(['status' => $status , 'data' => $cart]);
    }
    public function update(Request $request)
    {
        // Set Main Variables
        $productId = $request->input('product_id');
        $quantityAction = $request->input('quantity_action'); // To know if function called for +1 on quantity or -1.
        $user = Auth::user();

        if ($user) {
            $product = $user->cartProducts->where('id' , '=' , $productId)->first();
            if (!$product) {
                return abort(404); // or redirect or handle accordingly
            }
            $newQuantity = $quantityAction ? $product->pivot->quantity + 1 : $product->pivot->quantity - 1;
            $status = 'success';
            if($newQuantity >= 1)
            {
                $user->cartProducts()->updateExistingPivot($productId, ['quantity' => $newQuantity]);
            }
            $cart = $user->cartProducts;

        }else{ // If User not logged in we storing the product into Session
            $status = 'success';
            $product = Product::find($productId);
            $cart = $request->session()->get('cart' , []);
            // Check if the product is already in the cart
            if (isset($product) && isset($cart[$product->id])) {
                $currentQuantity = $cart[$product->id]['product_quantity'];
                $productCartQuantity =  $quantityAction ? ($currentQuantity + 1) : ($currentQuantity - 1);
                $productCartPrice = $cart[$product->id]['product_price'];
                // Quantity conditios
                if($productCartQuantity < 1)
                {
                    return response()->json(['status' => $status , 'data' => $cart]);
                }
                $cart[$product->id] =
                 [
                    'id' => $product->id,
                    'product_title' => $product->product_title,
                    'product_price' => $product->product_price,
                    'product_photos' => $product->product_photos,
                    'product_quantity' => $productCartQuantity,
                    'total' => $productCartQuantity * $productCartPrice,
                ];
            }
            $request->session()->put('cart', $cart);
        }
        return response()->json(['status' => $status , 'data' => $cart]);
    }
}
