<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paginate = 9;

        if (request()->category) {
            $category = Category::where('label', request()->category)->firstOrFail();
            $products = Product::where('category_id', $category->id);   
        }
        else {
            $products = Product::take(9);
        }

        // if (request()->sort === 'asc') {
        //     $products = $products->orderBy('price')->paginate($paginate);
        // }
        // else if (request()->sort === 'desc') {
        //     $products = $products->orderBy('price', 'DESC')->paginate($paginate);
        // }
        // else {
        //     $products = $products->paginate($paginate);
        // }

        $products = $products->paginate($paginate);        
        $categories = Category::all();

        return view('shop', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $products = Product::inRandomOrder()->take(6)->get();
        $category = Category::where('id', $product->category_id)->firstOrFail();

        return view('product', [
            'product' => $product,
            'products' => $products,
            'category' => $category,
        ]);
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
