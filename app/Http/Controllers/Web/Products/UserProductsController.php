<?php

namespace Vanguard\Http\Controllers\Web\Products;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Products;
use Vanguard\TransactionHistory;

class UserProductsController extends Controller
{
    public function index(Request $request){
        if (auth()->check()) {
            if (auth()->user()->role_id == 1) {
                return redirect()->route('dashboard');
            }
            $products = Products::where('product_name_fr', 'LIKE', "%$request->search%")->paginate();

            $email = auth()->user()->email;

            $level = TransactionHistory::select('level')->where('user_email', '=', $email)->orderBy('id', 'desc')->limit(1)->get();

            $preLevel = 1;
            if (!$level->isEmpty()){
                $preLevel = $level[0]->level;
            }

            return view('product.index', ['allproducts' => $products, 'level' => $preLevel]);
        } else {
            return route::redirect('login');
        }
    }
}
