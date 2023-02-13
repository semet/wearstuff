<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function show($id)
    {
        $product = Product::find($id);

        return view('pages.product.show', [
            'product' => $product
        ]);
    }
}
