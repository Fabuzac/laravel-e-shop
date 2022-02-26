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

    public function product() 
    {
        return view('product');
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

    public function login() 
    {
        return view('login');
    }

    public function register() 
    {
        return view('register');
    }
}
