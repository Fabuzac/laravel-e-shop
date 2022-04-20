<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class CartController extends Controller
{    

    public function index()
    {
        return view('cart');
    }

    public function store(Request $request)
    {
        \Cart::add($request->id, $request->name, $request->price, 1, array())->associate('App\Models\Product');

        return redirect()->route('cart.index')->with('success', 'Produit ajoute a votre panier');
    }

    public function delete($id)
    {
        \Cart::remove($id);

        return back()->with('success', 'Le produit a bien ete supprime du panier');
    }

    public function save($id)
    {
        $itemId = \Cart::get($id);
        
        \Cart::remove($id);
        
        session_name('wishlist');

        return redirect()->route('cart.index')->with('succes', 'Product saved for later');
    }
}
