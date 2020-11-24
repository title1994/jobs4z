@extends('layouts.user')

@section('page-title', __('Product'))
@section('page-heading', __('Product'))

@section('content')
    @include('partials.messages')

<div class="row">
    @foreach($allproducts as $product)
    <div class="col-md-3 col-sm-4 col-xs-6">
    
        <div class="card widget">
            <div class="card-header">
                <h3>{{$product->product_name_en}}</h3>
            </div>
            <div class="card-body">
                <div class="product-detail">
                    <p>Product detail here</p>
                </div>
            </div>
            <form method="POST" action="{{ route('pay.show', $product->id)}}">
            @csrf
                <div class="card-footer text-center">
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <select class="form-control" name="level">
                                <option value='1'>Level 1</option>
                                <option value='2'>Level 2</option>
                                <option value='3'>Level 3</option>
                                <option value='4'>Level 4</option>
                                <option value='5'>Level 5</option>
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