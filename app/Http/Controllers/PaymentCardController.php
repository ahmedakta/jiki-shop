<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentCardController extends Controller
{
    public function index()
    {

    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->all()['formData'];
        $user->paymentCards()->create([
            'card_number' => $data['card_number'],
            'card_holder_name' => $data['card_holder_name'],
            'card_expiration_date' => $data['card_expiration_date'],
            'card_cvv' => $data['card_cvv'],
            'isdefault' => 0,
            'status' => 1,
        ]);
        $data = $user->paymentCards();
        if($request->expectsJson()){
            return response()->json(['success' => true ,'data' => $data]);
        }
    }
}
