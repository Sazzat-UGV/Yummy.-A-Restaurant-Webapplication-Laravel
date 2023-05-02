<?php

namespace App\Http\Controllers\backend;

use App\Models\chef;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\chefStoreRequest;
use App\Http\Requests\chefUpdateRequest;
use Brian2694\Toastr\Facades\Toastr;
use Image;

class chefController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chefs=chef::latest('id')->select('id','name','updated_at','slug','position','description','chef_image','is_active')->get();
        return view('backend.pages.chef.index',compact('chefs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.chef.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(chefStoreRequest $request)
    {
        $chef=chef::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'position'=>$request->position,
            'description'=>$request->description,
        ]);

        $this->image_upload($request,$chef->id);
        Toastr::success('Chef Added Successfully!');
        return redirect()->route('chef.index');
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
    public function edit(string $slug)
    {
        $chefs=chef::whereSlug($slug)->first();
        return view('backend.pages.chef.edit',compact('chefs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(chefUpdateRequest $request, string $slug)
    {
        $chef=chef::whereSlug($slug)->first();
        $chef->update([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'position'=>$request->position,
            'description'=>$request->description,
            'is_active'=>$request->filled('is_active')
        ]);
        $this->image_upload($request,$chef->id);
        Toastr::success('Chef Update Successfully!');
        return redirect()->route('chef.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $chef=chef::whereSlug($slug)->first();
        if($chef->chef_image != 'default-chef.jpg'){
            //delete old photo
            $photo_location='public/uploads/chef/';
            $old_photo_location=$photo_location .$chef->chef_image;
            unlink(base_path($old_photo_location));
        }
        $chef->delete();
        Toastr::success('Chef Delete Successfully!');
        return redirect()->route('chef.index');
    }

    public function image_upload($request, $chef_id){
        $chef=chef::findorFail($chef_id);

        if($request->hasFile('chef_image')){
            if($chef->chef_image != 'default-chef.jpg'){
                //delete old photo
                $photo_location='public/uploads/chef/';
                $old_photo_location=$photo_location .$chef->chef_image;
                unlink(base_path($old_photo_location));

            }
                $photo_loation='public/uploads/chef/';
                $uploaded_photo=$request->file('chef_image');
                $new_photo_name=$chef->id .'.'.$uploaded_photo->getClientOriginalExtension();
                $new_photo_location= $photo_loation. $new_photo_name;
                Image::make($uploaded_photo)->resize(600,600)->save(base_path($new_photo_location),40);
                $check=$chef->update([
                    'chef_image'=>$new_photo_name,
                ]);

        }
    }
}
