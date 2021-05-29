<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Image;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        return view('frontend.client.home');
    }
    public function showImages($id)
    {
        $imgs = Product::find($id);
        
        $imagez = $imgs->images;
        return view('frontend.client.single-product',['imgg'=>$imagez]);
    }
}
