<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\CloudinaryService;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::withCount('products')->get();

        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'categoryName' => 'required',
            'thumbnail' => ['required', File::types(['jpg', 'png'])
                ->max(12 * 1024)],
        ]);

        $image = $request->file('thumbnail');

        $category = new Category();
        $category->name =  $request->categoryName;
        $category->slug = Str::slug($request->categoryName);
        //process file upload to cloudinary
        $result = CloudinaryService::upload(
            image: $image->getRealPath(),
            filename: $image->getClientOriginalName(),
            directory: 'categories'
        );
        //
        $category->thumbnail = $result->getSecurePath();
        $category->_public_id = $result->getPublicId();
        $category->save();

        return back();
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
    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
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
        $request->validate([
            'categoryName' => 'required',
            'thumbnail' => ['required', File::types(['jpg', 'png'])
                ->max(12 * 1024)],
        ]);

        $image = $request->file('thumbnail');

        // $url = Storage::disk('cloudinary')->fileExists($category->_public_id);
        $category = Category::find($id);
        $category->name = $request->categoryName;
        $category->slug = Str::slug($request->categoryName);
        $result = CloudinaryService::replace(
            public_id: $category->_public_id,
            image: $image->getRealPath(),
            filename: $image->getClientOriginalName(),
            directory: 'categories'
        );
        $category->thumbnail = $result->getSecurePath();
        $category->_public_id = $result->getPublicId();
        $category->save();

        return redirect()->route('admin.category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        CloudinaryService::delete($category->_public_id);
        $category->delete();

        return back();
    }
}
