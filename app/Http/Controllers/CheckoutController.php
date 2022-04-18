<?php

namespace App\Http\Controllers;

use Stripe;
use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkout() 
    {
        if (count(\Cart::getContent()) > 0) {    
            return view('checkout');
        }
        
        return redirect()->route('home');
    }    

    public function success()
    {
        if(!session()->has('success')) {
            return redirect()->route('home');
        }

        $order = Order::latest()->first();
        $orderProduct = OrderProduct::where('order_id', $order->id)->get();

        // CLEAN CART
        session()->forget('4yTlTDKu3oJOfzD_cart_items');
        session()->forget('coupon');

        return view('confirmation', [
            'order' => $order,
            'products' => $orderProduct,            
        ]);
    }

    public function store(Request $request)
    {
        $total = \Cart::getTotal();

        // STRIPE CHARGE
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
        
        // SAVE ORDER DB
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

        // SAVE ORDER IN A PIVOT TABLE(ORDERPRODUCT)
        foreach(\Cart::getContent() as $product) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $product->quantity
            ]);
        };
           
        return redirect()
            ->route('checkout.success')
            ->with('success', 'Payment Successful !');
    }
}
