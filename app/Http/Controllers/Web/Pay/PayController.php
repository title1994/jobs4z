<?php

namespace Vanguard\Http\Controllers\web\Pay;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Illuminate\View\View;

use Vanguard\Products;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function show(Request $request, $id){
        $product = Products::find($id);
        return view('pay.index', ['product' => $product, 'level' => $request->level]);
    }
}
