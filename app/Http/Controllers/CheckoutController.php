<?php

namespace App\Http\Controllers;

use Stripe;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */    
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Gere le paiements
    public function checkout() 
    {
        return view('checkout');
    }

    // Sucess paiement
    public function success(Request $request)
    {
        if(!session()->has('success')) {
            return redirect()->route('home');
        }

        $order = Order::latest()->first();
        $orderProduct = OrderProduct::where('order_id', $order->id)->get();
        $coupon = Coupon::all();
                    
        //\Cart::remove();
        //session()->forget('coupon');

        return view('confirmation', [
            'order' => $order,
            'products' => $orderProduct,
            'coupon' => $coupon
        ]);
    }

    // public function getTotalWithDiscount($total)
    // {
    //     session()->has('coupon') 
    //     ? round($total - session()->get('coupon')['discount'], 2) * 100 
    //     : $total * 100;
    // }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $total = \Cart::getTotal();

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
            'amount' => session()->has('coupon') 
                        ? round($total - session()->get('coupon')['discount'], 2) * 100 
                        : $total * 100,
            'currency' => 'EUR',
            'source' => $request->stripeToken,
            'description' => 'This is test payment',
            'metadata' => [
                'owner' => $request->name,                   
                'products' => \Cart::getContent()->toJson(),                    
            ],                
        ]);        
        
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'paiement_firstname' => $request->firstname,
            'paiement_lastname' => $request->lastname,
            'paiement_phone' => $request->phone,
            'paiement_email' => $request->email,
            'paiement_address' => $request->address,
            //'paiement_address2' => $request->address2,
            //'paiement_country' => $request->country,
            'paiement_city' => $request->city,
            'paiement_postalcode' => $request->postalcode,
            'discount' => session()->get('coupon')['name'] ?? null,
            'paiement_total' => session()->has('coupon') 
                            ? round($total - session()->get('coupon')['discount'], 2) 
                            : $total,
        ]);

        foreach(\Cart::getContent() as $product) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $product->quantity
            ]);
        };
           
        return redirect()->route('checkout.success')->with('success', 'Payment Successful !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
