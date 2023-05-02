<?php

namespace App\Http\Controllers\backend;

use Image;
use App\Models\Event;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\eventStoreRequest;
use App\Http\Requests\eventUpdateRequest;
use Brian2694\Toastr\Facades\Toastr;

class eventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events=Event::latest('id')->select('id','event_name','slug','description','price','event_image','is_active','updated_at')->get();
        return view('backend.pages.event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(eventStoreRequest $request)
    {

        $event=Event::create([
            'event_name'=>$request->event_name,
            'slug'=>Str::slug($request->event_name),
            'description'=>$request->description,
            'price'=>$request->price,
        ]);

        $this->image_upload($request,$event->id);
        Toastr::success('Event Store Successfully!');
        return redirect()->route('event.index');
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
        $events=Event::whereSlug($slug)->first();
        return view('backend.pages.event.edit',compact('events'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(eventUpdateRequest $request, string $slug)
    {
        $event=Event::whereSlug($slug)->first();
        $event->update([
            'event_name'=>$request->event_name,
            'slug'=>Str::slug($request->event_name),
            'description'=>$request->description,
            'price'=>$request->price,
            'is_active'=>$request->filled('is_active'),
        ]);

        $this->image_upload($request,$event->id);
        Toastr::success('Event Update Successfully!');
        return redirect()->route('event.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $event=Event::whereSlug($slug)->first();
        if($event->event_image != 'default_event.jpg'){
            //delete old photo
            $photo_location='public/uploads/event_photo/';
            $old_photo_location=$photo_location .$event->event_image;
            unlink(base_path($old_photo_location));
        }
        $event->delete();
        Toastr::success('Event Delete Successfully!');
        return redirect()->route('event.index');
    }


    public function image_upload($request, $event_id){
        $event=Event::findorFail($event_id);

        if($request->hasFile('event_image')){
            if($event->event_image != 'default_event.jpg'){
                //delete old photo
                $photo_location='public/uploads/event_photo/';
                $old_photo_location=$photo_location .$event->event_image;
                unlink(base_path($old_photo_location));

            }
                $photo_loation='public/uploads/event_photo/';
                $uploaded_photo=$request->file('event_image');
                $new_photo_name=$event->id .'.'.$uploaded_photo->getClientOriginalExtension();
                $new_photo_location= $photo_loation. $new_photo_name;
                Image::make($uploaded_photo)->resize(1024,683)->save(base_path($new_photo_location),40);
                $check=$event->update([
                    'event_image'=>$new_photo_name,
                ]);

        }
    }
}
