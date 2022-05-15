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
        $discount = Coupon::where('code', $order->discount)->firstOrFail();

        if ($discount) {
            $subtotal = $order->paiement_total + strval($discount->value);
            $subtotal = number_format($subtotal, 2);
        }

        $data = [            
            'order' => $order,
            'discount' => $discount,            
            'subtotal' => $subtotal,            
        ];
        
        $pdf = PDF::loadView('pdf', $data);
     
        return $pdf->download('mybill.pdf');  
    }
}