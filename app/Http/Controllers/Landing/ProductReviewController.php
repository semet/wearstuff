<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\ProductReview;
use Exception;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    public function store(Request $request, $id)
    {
        try {
            $request->validate(['message' => 'required']);
            ProductReview::create([
                'user_id' => auth()->id(),
                'product_id' => $id,
                'body' => $request->message
            ]);
            return redirect()->route('product.show', [$id, 'tab' => 'review']);
        } catch (Exception $e) {
            info($e->getMessage());
        }
    }
}
