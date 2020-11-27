@extends('layouts.user')

@section('page-title', __('Pay'))
@section('page-heading', __('Pay'))

@section('content')
    @include('partials.messages')


<div class="container" id="payment">
    
    <form method="POST" action="">
        @csrf
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="name">@lang('Product')</label>
                    <input type="text"
                           class="form-control input-solid"
                           id="name"
                           name="name"
                           placeholder="@lang('Product Name')"
                           value="{{$product->product_name_en}}" readonly>
                </div>
                <div class="form-group">
                    <label for="Level">@lang('Level')</label>
                    <input type="text"
                           class="form-control input-solid"
                           id="Level"
                           name="Level"
                           placeholder="@lang('Level')"
                           value="{{$level}}" readonly>
                </div>
                <div class="form-group">
                    <label for="Amount">@lang('Amount')</label>
                    <input type="text"
                           class="form-control input-solid"
                           id="Amount"
                           name="Amount"
                           placeholder="@lang('Amount')"
                           value="{{$product->amount}} CHF" readonly>
                </div>
                <!-- <div class="form-group">
                    <label for="Method">@lang('Method')</label>
                    <select class="form-control" name="Method" id="payment_method">
                        <option value='1'>@lang('Paypal')</option>
                        <option value='2'>@lang('CreditCard')</option>
                    </select>
                </div> -->

                <div class="form-group button-part">
                    <div id="paypal-button-container"></div>
                </div>
            </div>
        </div>        
    </form>
</div>
@stop   

@section('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=AWqX4G68cctSt5kPVczTdYqEHsgYLS8Mya7lLA7ZFCIm9ZkXrDH3De9Sd3Ribyy5K5-qAsulp0kZgZ-J&currency=CHF"></script>
    <script src="{{ url('assets/js/paypal.js') }}"></script>
@stop
