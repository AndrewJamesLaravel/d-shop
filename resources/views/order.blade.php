@extends('layouts.master')

@section('title', __('main.titles.order_title'))

@section('content')
        <h1>@lang('order.confirm_order'):</h1>
        <div class="container">
            <div class="row justify-content-center">
                <p>@lang('order.total_coast'): <b>{{ $order->calculateFullSum() }} {{ $currencySymbol }}</b></p>
                <form action="{{ route('basket-confirm') }}" method="POST">
                    <div>
                        <p>@lang('order.credentials_fill'):</p>

                        <div class="container">
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">@lang('order.input.name'): </label>
                                <div class="col-lg-4">
                                    <input type="text" name="name" id="name" value="" class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="phone" class="control-label col-lg-offset-3 col-lg-2">@lang('order.input.phone'): </label>
                                <div class="col-lg-4">
                                    <input type="text" name="phone" id="phone" value="" class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            @guest
                                <div class="form-group">
                                    <label for="name" class="control-label col-lg-offset-3 col-lg-2">@lang('order.input.email'): </label>
                                    <div class="col-lg-4">
                                        <input type="text" name="email" id="email" value="" class="form-control">
                                    </div>
                                </div>
                            @endguest
                        </div>
                        <br>
                        @csrf
                        <input type="submit" class="btn btn-success" value=@lang('order.confirm')>
                    </div>
                </form>
            </div>
        </div>
@endsection
