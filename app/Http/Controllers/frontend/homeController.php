<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\chef;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class homeController extends Controller
{
    public function home(){
        $categories=category::where('is_active',1)->with('product')->latest('id')->select('id','title','slug')->limit(4)->get();

        $allproduct=Product::where('is_active',1)->latest('id')->select(['id','name','slug','menu_item','price','product_image'])->paginate(9);

        $testimonials=Testimonial::where('is_active',1)->latest('id')->select('id','client_name','client_designation','client_message','rating','client_image')->limit(4)->get();

        $events=Event::where('is_active',1)->latest('id')->select('id','event_name','description','price','event_image')->limit(5)->get();

        $chefs=chef::where('is_active',1)->latest('id')->select('id','name','position','description','chef_image')->limit(3)->get();

        $galleries=Gallery::where('is_active',1)->latest('id')->select('id','image')->limit(8)->get();

        return view('frontend.pages.home',compact(
            'categories',
            'allproduct',
            'testimonials',
            'events',
            'chefs',
            'galleries'
        ));
    }
}
