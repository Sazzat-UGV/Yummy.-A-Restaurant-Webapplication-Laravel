<?php

namespace App\Http\Controllers\backend;

use Image;
use App\Models\Product;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products=Product::with('category')->latest('id')->select(['id','category_id','name','slug','updated_at','menu_item','price','product_image','is_active'])->get();
        return view('backend.pages.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=category::select(['id','title'])->get();
        return view('backend.pages.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        $product=Product::create([
            'category_id'=>$request->category_id,
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'menu_item'=>$request->menu_item,
            'price'=>$request->price,
        ]);
        $this->image_upload($request, $product->id);
        Toastr::success('Food Store Successfully!');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $products=Product::whereSlug($slug)->first();
        $categories=category::select(['id','title'])->get();
        return view('backend.pages.product.edit',compact('products','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductUpdateRequest $request, string $slug)
    {
       $product=Product::whereSlug($slug)->first();
       $product->update([
        'category_id'=>$request->category_id,
        'name'=>$request->name,
        'slug'=>Str::slug($request->name),
        'menu_item'=>$request->menu_item,
        'price'=>$request->price,
        'is_active'=>$request->filled('is_active'),
       ]);
       $this->image_upload($request, $product->id);
       Toastr::success('Food Update Successfully!');
       return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $product=Product::whereSlug($slug)->first();
        if($product->product_image !=  'default_product.png'){
            $photo_location='public/uploads/product_photo/';
                $old_photo_location=$photo_location .$product->product_image;
                unlink(base_path($old_photo_location));
        }
        $product->delete();
        Toastr::success('Food Delete Successfully!');
        return redirect()->route('product.index');
    }

    public function image_upload($request, $product_id){
        $product=Product::findorFail($product_id);

        if($request->hasFile('product_image')){
            if($product->product_image != 'default_product.png'){
                //delete old photo
                $photo_location='public/uploads/product_photo/';
                $old_photo_location=$photo_location .$product->product_image;
                unlink(base_path($old_photo_location));

            }
                $photo_loation='public/uploads/product_photo/';
                $uploaded_photo=$request->file('product_image');
                $new_photo_name=$product->id .'.'.$uploaded_photo->getClientOriginalExtension();
                $new_photo_location= $photo_loation. $new_photo_name;
                Image::make($uploaded_photo)->resize(610,610)->save(base_path($new_photo_location),40);
                $check=$product->update([
                    'product_image'=>$new_photo_name,
                ]);

        }
    }
}
