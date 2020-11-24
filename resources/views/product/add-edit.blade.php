@extends('layouts.app')

@section('page-title', __('Products'))
@section('page-heading', $edit ? __('Edit Products') : __('Create New Product'))

@section('breadcrumbs')
    <li class="breadcrumb-item">
        <a href="{{ route('products.index') }}">@lang('Products')</a>
    </li>
    <li class="breadcrumb-item active">
        {{ __($edit ? 'Edit' : 'Create') }}
    </li>
@stop

@section('content')
@include('partials.messages')
@if ($edit)
    {!! Form::open(['route' => ['products.update', $product], 'method' => 'PUT', 'id' => 'product-form']) !!}
@else
    {!! Form::open(['route' => 'products.store', 'id' => 'product-form']) !!}
@endif
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <h5 class="card-title">
                    @lang('Product Details')
                </h5>
                <p class="text-muted font-weight-light">
                    @lang('A general Product information.')
                </p>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label for="product_name_en">@lang('Product name (English)')</label>
                    <input type="text"
                           class="form-control input-solid"
                           id="product_name_en"
                           name="product_name_en"
                           placeholder="@lang('Product name')"
                           value="{{ $edit ? $product->product_name_en : old('product_name_en') }}">
                </div>
                <div class="form-group">
                    <label for="product_name_fr">@lang('Product name (French)')</label>
                    <input type="text"
                           class="form-control input-solid"
                           id="product_name_fr"
                           name="product_name_fr"
                           placeholder="@lang('Product name')"
                           value="{{ $edit ? $product->product_name_fr : old('product_name_fr') }}">
                </div>
                <div class="form-group">
                    <label for="amount">@lang('Amount')</label>
                    <input name="amount"
                              id="amount"
                              class="form-control input-solid" 
                              value="{{ $edit ? $product->amount : old('amount') }}">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <button type="submit" class="btn btn-primary">
            {{ __($edit ? "Update Product" : "Create Product") }}
        </button>
    </div>
</div>

@stop
