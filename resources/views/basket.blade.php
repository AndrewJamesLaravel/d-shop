@extends('layouts.master')

@section('title', __('main.titles.basket_title'))

@section('content')
        <h1>@lang('basket.h1_basket')</h1>
        <p>@lang('basket.checkout_1')</p>
        <div class="panel">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>@lang('basket.thead.prod-name')</th>
                    <th>@lang('basket.thead.prod-quantity')</th>
                    <th>@lang('basket.thead.prod-price')</th>
                    <th>@lang('basket.thead.prod-total')</th>
                </tr>
                </thead>
                <tbody>
                @foreach($order->products as $product)
                    <tr>
                        <td>
                            <a href="{{ route('product', [$product->category->code, $product->code]) }}">
                                <img height="56px" src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                                {{ $product->__('name') }}
                            </a>
                        </td>
                        <td><span class="badge">{{ $product->countInOrder }}</span>
                            <div class="btn-group form-inline">
                                <form action="{{ route('basket-remove', $product) }}" method="POST">
                                    <button type="submit" class="btn btn-danger" href=""><span
                                            class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                    @csrf
                                </form>
                                <form action="{{ route('basket-add', $product) }}" method="POST">
                                    <button type="submit" class="btn btn-success"
                                            href="{{ route('basket-add', $product) }}"><span
                                            class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                    @csrf
                                </form>
                            </div>
                        </td>
                        <td>{{ $product->price }} {{ $currencySymbol }}</td>
                        <td>{{ $product->price * $product->countInOrder }} {{ $currencySymbol }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="3">@lang('basket.thead.prod-total'):</td>
                    <td>{{ $order->getFullSum() }} {{ $currencySymbol }}</td>
                </tr>
                </tbody>
            </table>
            <br>
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-success" href="{{ route('basket-place') }}">@lang('basket.checkout_2')</a>
            </div>
        </div>
@endsection
