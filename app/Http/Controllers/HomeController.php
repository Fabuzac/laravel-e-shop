<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() 
    {
        $products = Product::inRandomOrder()->take(8)->get();
        
        return view('home', [
            'products' => $products,
        ]);
    }

    public function contact() 
    {
        return view('contact');
    }

    public function blog() 
    {
        return view('blog');
    }

    public function category() 
    {
        return view('category');
    }

    public function confirmation() 
    {
        return view('confirmation');
    }   

    public function thanks() 
    {
        return view('thanks');
    }

    public function tracking() 
    {
        return view('tracking');
    }

    public function elements() 
    {
        return view('elements');
    }

    public function singleBlog() 
    {
        return view('single-blog');
    }    
    
    public function orders() 
    {
        return view('orders');
    }
}
