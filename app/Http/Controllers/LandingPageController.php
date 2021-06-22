<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function index(){
       $data  =  Product::with('galleries')->get()->take(8);
       $suggestproduct  =  Product::with('galleries')->get()->random(3);
       return view('frontend.LandingPage',compact('data','suggestproduct'));
    }
    public function detail($id){
       $data =  Product::with('galleries')->findOrFail($id);
        return view('frontend.details',compact('data'));
    }

        public function add(Request $request,$id){
           $data = [
            'products_id' => $id,
            'users_id' => Auth::user()->id
        ];

        Cart::create($data);

        return redirect()->route('cart.index');
    }

        public function categories(){
         $data  =  Product::with('galleries')->get();
        return view('frontend.categories',compact('data'));

    }
}
