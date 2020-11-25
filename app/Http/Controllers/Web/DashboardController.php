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

        return view('dashboard.index');
    }
}
