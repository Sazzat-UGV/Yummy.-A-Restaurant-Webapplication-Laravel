<?php

namespace App\Http\Controllers\frontend;

use App\Models\contact;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\contactStoreRequest;
use Brian2694\Toastr\Facades\Toastr;

class contactController extends Controller
{

    public function contactIndex()
    {
        $messages = contact::latest('id')->select('id', 'name', 'slug', 'email', 'subject', 'message', 'created_at')->get();
        return view('backend.pages.contact.index', compact('messages'));
    }


    public function contactCreate(contactStoreRequest $request)
    {
        contact::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        Toastr::success('Your Message Sent Successfully!');
        return redirect()->route('home');
    }

    public function contactDelete($slug)
    {
        $message=contact::whereSlug($slug)->first();
        $message->delete();


        Toastr::success('Message Delete Successfully!');
        return redirect()->route('user.contactIndex');

    }
}
