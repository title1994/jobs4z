<?php

namespace Vanguard\Http\Controllers\Web\Products;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Products;

class UserProductsController extends Controller
{
    public function index(Request $request){
        if (auth()->check()) {
            if (auth()->user()->role_id == 1) {
                return redirect()->route('dashboard');
            }
            $products = Products::where('product_name_fr', 'LIKE', "%$request->search%")->paginate();
            return view('product.index', ['allproducts' => $products]);
        } else {
            return route::redirect('login');
        }
    }
}
