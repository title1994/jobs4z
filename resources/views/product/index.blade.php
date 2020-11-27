@extends('layouts.user')

@section('page-title', __('Product'))
@section('page-heading', __('Product'))

@section('content')
    @include('partials.messages')

<div class="row product_list">
    @foreach($allproducts as $product)
    <div class="col-md-4 col-sm-4 col-xs-6">
    
        <div class="card widget card_widget">
            <div class="card-header">
                @if(app()->getLocale() == "en")
                <h3>{{$product->product_name_en}}</h3>
                @else
                <h3>{{$product->product_name_fr}}</h3>
                @endif
            </div>
            <div class="card-body">
                <div class="product-detail">
                    @if(app()->getLocale() == "en")
                    <h3>{{$product->product_detail_en}}</h3>
                    @else
                    <h3>{{$product->product_detail_fr}}</h3>
                    @endif
                </div>
                <div class="product-amount">
                    <h3>{{$product->amount}} CHF</h3>
                </div>
            </div>
            <form method="POST" action="{{ route('pay.show', $product->id)}}">
            @csrf
                <div class="card-footer text-center">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <select class="form-control" name="level">
                                <option value='1'>@lang("Level") 1</option>
                                <option value='2'>@lang("Level") 2</option>
                                <option value='3'>@lang("Level") 3</option>
                                <option value='4'>@lang("Level") 4</option>
                                <option value='5'>@lang("Level") 5</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <button type="submit" class="btn btn-primary">Checkout</button>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    @endforeach
</div>

@stop