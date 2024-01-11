<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    // product comments 
    public function index(Request $request)
    {
        $productId = decrypt($request->id);
        $product = Product::find($productId);
        if(!$product)
        {
            return response()->json(['success' => false ,'data' => null]);
        }
        $comments  = Product::find($productId)->comments()->with(['user' , 'replies.user'])->get(); // todo select columngs from the user for security
        $comments = convertJson($comments);
        if($request->expectsJson()){
            return response()->json(['success' => true ,'data' => $comments]);
        }
    }

    // store comment of product & blogs
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        $productId = decrypt($data['productId']);
        $comment = $user->comments()->create([
            'category_id' => 1,
            'product_id' => $productId,
            'parent_id' => $data['replyedCommentId'] ?? Null,
            'comment_message' => $data['message'],
        ]);
        $comments  = Product::find($productId)->comments()->with(['user' , 'replies'])->get(); // todo select columns from the user for security
        if($request->expectsJson() && $comment){
            return response()->json(['success' => true ,'data' => $comments]);
        }
        return response()->json(['success' => false ,'data' => null]);
    }
}
