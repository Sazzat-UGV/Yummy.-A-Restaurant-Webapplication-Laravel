<?php

namespace App\Http\Controllers\backend;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\categoryStoreRequest;
use App\Http\Requests\categoryUpdateRequest;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories=category::latest('id')->select(['id','title','slug','is_active','created_at'])->get();
        return view('backend.pages.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(categoryStoreRequest $request)
    {
        category::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title)
        ]);
        Toastr::success('Category Store Successfully!');
        return redirect()->route('category.index');
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
        $category=category::whereSlug($slug)->first();
        return view('backend.pages.category.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(categoryUpdateRequest $request, string $slug)
    {
        $category=category::whereSlug($slug)->first();
        $category->update([
            'title'=>$request->title,
            'slug'=>Str::slug($request->title),
            'is_active'=>$request->filled('is_active')
        ]);
        Toastr::success('Category Update Successfully!');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $category=category::whereSlug($slug)->first();
        $category->delete();

        Toastr::success('Category Delete Successfully!');
        return redirect()->route('category.index');
    }

}
