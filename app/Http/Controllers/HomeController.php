<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\OrderProduct;
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
        $news = Product::take(2)->get();
        $latestProducts = Product::orderBy('id', 'DESC')->take(8)->get();

        //BESTSELLER
        $array = [];
        $orders = OrderProduct::all()->groupBy('product_id');
        
        foreach($orders as $order) {
            foreach($order as $product) {
                array_push($array, $product->product_id);
            }
        }       
        $bestsellers = Product::whereIn('id', $array)->take(8)->get();        
        
        return view('home', [
            'products' => $products,
            'news' => $news,
            'latestproducts' => $latestProducts,
            'bestsellers' => $bestsellers,
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
        $user = auth()->user();
        
        return view('orders', [
            'orders' => $user->order,               
        ]);
    }
}
