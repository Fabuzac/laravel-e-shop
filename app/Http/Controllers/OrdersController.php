<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use PDF;
use App\Models\Order;
use App\Models\OrderProduct;

class OrdersController extends Controller
{
    /**
     * 
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        
        return view('orders', [
            'orders' => $user->order,               
        ]);
    }

    public function createPdf($id)
    {
        $order = Order::where('id', $id)->firstOrfail();        
        // $couponValue = Order::where('orders', $orders->discount)->get();
    
        $data = [            
            'order' => $order,
        ];
           
        $pdf = PDF::loadView('pdf', $data);
     
        return $pdf->download('mybill.pdf');  
    }
}