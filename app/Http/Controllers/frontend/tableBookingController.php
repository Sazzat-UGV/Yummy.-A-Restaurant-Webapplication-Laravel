<?php

namespace App\Http\Controllers\frontend;

use App\Models\bookTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\tableBookingRequest;
use App\Mail\reservationConfirmMail;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;

class tableBookingController extends Controller
{
    public function bookTable(tableBookingRequest $request)
    {
        bookTable::create([
            "name" => $request->name,
            "email" =>  $request->email,
            "phone" => $request->phone,
            "date" => $request->date,
            "time" =>  $request->time,
            "no_of_people" =>  $request->no_of_people,
            "message" =>  $request->message,
        ]);
        Toastr::success('We will call back or send an Email to confirm your reservation. Thank you!', 'Your booking request was sent.');
        return redirect()->route('home');
    }


    public function showReservation()
    {
        $reservations=bookTable::latest('id')->select('id','name','email','phone','date','time','no_of_people','message','status','created_at')->get();
        return view('backend.pages.reservation.index',compact('reservations'));
    }

    public function deleteReservation($id)
    {
       $reservation=bookTable::whereId($id)->first();
       $reservation->delete();
       Toastr::success('Reservation Delete Successfully!');
       return redirect()->route('user.reservationIndex');
    }

    public function changeStatus($id ,$status)
    {

       $reservation=bookTable::whereId($id)->select('id','status')->first();
       if($status==1){
         $value=1;
       }
        elseif($status==2){
            $value=2;
        };
       $reservation->update([
        'status'=>$value
       ]);

       Toastr::success('Status Update Successfully!');
       return redirect()->route('user.reservationIndex');
    }
}

