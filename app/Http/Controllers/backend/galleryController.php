<?php

namespace App\Http\Controllers\backend;

use Image;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\galleryStoreRequest;
use App\Http\Requests\galleryUpdateRequest;
use Brian2694\Toastr\Facades\Toastr;

class galleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries=Gallery::latest('id')->select('id','image','is_active','updated_at','created_at')->get();
        return view('backend.pages.gallery.index',compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(galleryStoreRequest $request)
    {

        $images=Gallery::create([

        ]);
        $this->image_upload($request, $images->id);
        Toastr::success('Image Store Successfully!');
        return redirect()->route('gallery.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $gallery=Gallery::whereId($id)->first();
        return view('backend.pages.gallery.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(galleryUpdateRequest $request, string $id)
    {
        $images=Gallery::whereId($id)->first();
        $images->update([
            'is_active'=>$request->filled('is_active'),
        ]);
        $this->image_upload($request, $images->id);
        Toastr::success('Image Update Successfully!');
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $image=Gallery::whereId($id)->first();
        if($image->image != 'default_gallery.jpg'){
            //delete old photo
            $photo_location='public/uploads/gallery/';
            $old_photo_location=$photo_location .$image->image;
            unlink(base_path($old_photo_location));
        }
        $image->delete();
        Toastr::success('Image Delete Successfully!');
        return redirect()->route('gallery.index');
    }


    public function image_upload($request, $image_id){
        $image=Gallery::findorFail($image_id);

        if($request->hasFile('image')){
            if($image->image != 'default_gallery.jpg'){
                //delete old photo
                $photo_location='public/uploads/gallery/';
                $old_photo_location=$photo_location .$image->image;
                unlink(base_path($old_photo_location));

            }
                $photo_loation='public/uploads/gallery/';
                $uploaded_photo=$request->file('image');
                $new_photo_name=$image->id .'.'.$uploaded_photo->getClientOriginalExtension();
                $new_photo_location= $photo_loation. $new_photo_name;
                Image::make($uploaded_photo)->resize(800,600)->save(base_path($new_photo_location),40);
                $check=$image->update([
                    'image'=>$new_photo_name,
                ]);

        }
    }
}
