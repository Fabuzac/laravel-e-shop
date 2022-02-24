<?php

namespace App\Http\Controllers;

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
        return view('home');
    }

    public function contact() 
    {
        return view('contact');
    }

    public function shop() 
    {
        return view('shop');
    }

    public function shopShow() 
    {
        return view('product');
    }

    public function checkout() 
    {
        return view('checkout');
    }
    
    public function cart() 
    {
        return view('cart');
    }

    public function orders() 
    {
        return view('orders');
    }
}
