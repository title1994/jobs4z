<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;

use Illuminate\View\View;
use Vanguard\Http\Controllers\Controller;

use Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $user = auth()->user();
        if (!$user) {
            return view('welcome.index');
        }
        
        if ($user->role_id == 1) {
            return redirect()->route('dashboard');
        } elseif ($user->role_id == 2) {
            return view('welcome.index');
        }
    }
}
