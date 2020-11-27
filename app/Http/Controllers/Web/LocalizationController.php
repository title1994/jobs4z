<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;

class LocalizationController extends Controller
{
    public function index(Request $request,$locale) {
        //set’s application’s locale
        app()->setLocale($locale);
        session()->put('locale', $locale);

        // dd(trans('validation.welcome'));
        
        return redirect()->back();
     }
}
