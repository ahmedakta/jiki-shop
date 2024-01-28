<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $data = $request->all();
        $user = Auth::user();
        $order = Order::create([
            'user_id' => $user->id,
            'category_id' => 1,
            'payment_cards_id' => $request->order_payment,
            'order_shipping_address' => $request->order_address,
            'order_total_amount' => $request->order_total_amount,
            'status' => 0,
            'payment_status' => 0,
        ]);
        if(isset($data['orderd_products']) && count($data['orderd_products']))
        {
            foreach ($data['orderd_products'] as $key => $item) {
                $order->products()->attach($item['id']);
            }
        }
        // Empty User Shopping Cart
        $user->cartProducts()->detach();
        return response()->json(['success' => true ,'redirect' => '/checkout/confirmation']);
    }

    public function confirmation()
    {
        return view('frontend.confirmation')->with('success' , 'Success');
    }
}
