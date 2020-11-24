<?php

namespace Vanguard\Http\Controllers\Web\Products;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Products;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Products::where('product_name_fr', 'LIKE', "%$request->search%")->paginate();
        return view('product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.add-edit', ['edit' => false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        Products::create(array(
            'product_name_en' => $request->product_name_en,
            'product_name_fr' => $request->product_name_fr,
            'amount' => $request->amount,
            ));

        return redirect()->route('products.index')
            ->withSuccess(__('Product created successfully.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \Vanguard\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Vanguard\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Products::find($id);
        return view('product.add-edit', ['edit' => true, 'product' => $products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Vanguard\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        Products::whereId($id)->update(array(
            'product_name_en' => $request->product_name_en,
            'product_name_fr' => $request->product_name_fr,
            'amount' => $request->amount,
            ));

        return redirect()->route('products.index')
            ->withSuccess(__('products updated successfully.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Vanguard\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();

        return redirect()->route('products.index')
            ->withSuccess(__('Product deleted successfully.'));
    }
}
