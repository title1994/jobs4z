@extends('layouts.user')

<div id="parent_div">  
    @if (Auth::check())
    <div id="home_lbl">
        Welcome
    </div>
    @else  
    <div id="home_lbl">
        Welcome
    </div>
    @endif
</div>