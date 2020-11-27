@extends('layouts.user')

<div id="parent_div">  
    @if (Auth::check())
    <div id="home_lbl">
        @lang('validation.welcome')
    </div>
    @else  
    <div id="home_lbl">
        @lang('validation.welcome')
    </div>
    @endif
</div>