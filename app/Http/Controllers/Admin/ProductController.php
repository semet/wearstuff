<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCreateRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\CloudinaryService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories  = Category::all();
        return view('admin.product.index', [
            'categories' => $categories
        ]);
    }
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function getProducts(Request $request)
    {
        if ($request->ajax()) {
            if (!$request->category_id) {
                $products = collect();
            } else {
                $products = Product::where('category_id', $request->category_id)->get();
            }
            return DataTables::of($products)
                ->addColumn('sku', fn (Product $product) => $product->sku)
                ->addColumn('name', fn (Product $product) => $product->name)
                ->addColumn('price', fn (Product $product) => $product->price)
                ->addColumn('final_price', fn (Product $product) => $product->finalPrice())
                ->addColumn('weight', fn (Product $product) => $product->weight . ' Grams')
                ->addColumn('quantity', fn (Product $product) => $product->quantity . ' Pcs')
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductCreateRequest $request)
    {
        $product = new Product();
        $product->category_id  = $request->category_id;
        $product->sku  = $request->sku;
        $product->name  = $request->name;
        $product->price  = $request->price;
        $product->weight  = $request->weight;
        $product->quantity  = $request->quantity;
        $product->size  = $request->size;
        $product->gender  = $request->gender;
        $product->overview  = $request->overview;
        $product->description  = $request->description;
        $product->additional_info  = $request->additionalInfo;
        $product->ingredients  = $request->ingredients;
        $product->save();

        return redirect()->route('admin.product.upload-image', $product);
    }
    /**
     * image Upload view
     *
     * @return \Illuminate\Http\Response
     */
    public function imagUploadView(Product $product)
    {
        return view('admin.product.upload-image', [
            'product' => $product
        ]);
    }
    /**
     * Store image to cloudinary
     *
     * @param Request $request
     * @param Product $product
     * @return void
     */
    public function storeImage(Request $request, Product $product)
    {
        $imageFile = $request->file('file');
        $result = CloudinaryService::upload(
            image: $imageFile->getRealPath(),
            filename: $imageFile->getClientOriginalName(),
            directory: 'products'
        );
        $create = $product->images()->create([
            'url' => $result->getSecurePath(),
            '_public_id' => $result->getPublicId()
        ]);

        if ($create) {
            return response()->json([
                'message' => 'Upload successful'
            ]);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
