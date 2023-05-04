<?php

namespace App\Http\Controllers\backend;

use App\Models\chef;
use App\Models\contact;
use App\Models\Product;
use App\Models\category;
use App\Models\bookTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class dashboardController extends Controller
{
    public function dashboard(){

        $total_category=category::count();
        $total_food_item=Product::count();
        $total_chefs=chef::count();
        $reservation_confirm=bookTable::where('status',1)->count();
        $reservations=bookTable::latest('id')->select('id','name','phone','date','status')->limit(4)->get();

        return view('backend.pages.dashboard',compact(
            'total_category',
            'total_food_item',
            'total_chefs',
            'reservation_confirm',
            'reservations',
        ));
    }
}
