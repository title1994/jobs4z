<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Repositories\Role\RoleRepository;

use Illuminate\Http\Request;
use Vanguard\Products;

class DashboardController extends Controller
{
    /**
     * Displays the application dashboard.
     *
     * @return Factory|View
     */
    public function index(Request $request)
    {
        if (session()->has('verified')) {
            session()->flash('success', __('E-Mail verified successfully.'));
        }

        $user = auth()->user();
        if ($user->role_id == 1) {
            return view('dashboard.index');
        } elseif ($user->role_id == 2) {
            $products = Products::where('product_name_fr', 'LIKE', "%$request->search%")->paginate();
            return view('product.index', ['allproducts' => $products]);
        }
    }
}
