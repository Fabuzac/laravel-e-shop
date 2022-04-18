<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Order;

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

        $data = [            
            'order' => $order,
        ];
           
        $pdf = PDF::loadView('pdf', $data);
     
        return $pdf->download('mybill.pdf');  
    }
}