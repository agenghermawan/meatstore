<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function ctigasapi(){
        return view('frontend.categories.ctigasapi');
    }
    public function cthas(){
       return view('frontend.categories.ctdaginghas');
    }
    public function ctayam(){
        return view('frontend.categories.ctdagingayam');
   }
}
