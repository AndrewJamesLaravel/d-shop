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
                @foreach($order->skus as $sku)
                    <tr>
                        <td>
                            <a href="{{ route('sku', [$sku->product->category->code, $sku->product->code, $sku]) }}">
                                <img height="56px" src="{{ Storage::url($sku->product->image) }}" alt="{{ $sku->product->name }}">
                                {{ $sku->product->__('name') }}
                            </a>
                        </td>
                        <td><span class="badge">{{ $sku->countInOrder }}</span>
                            <div class="btn-group form-inline">
                                <form action="{{ route('basket-remove', $sku) }}" method="POST">
                                    <button type="submit" class="btn btn-danger" href=""><span
                                            class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                    @csrf
                                </form>
                                <form action="{{ route('basket-add', $sku) }}" method="POST">
                                    <button type="submit" class="btn btn-success"
                                            href="{{ route('basket-add', $sku) }}"><span
                                            class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                    @csrf
                                </form>
                            </div>
                        </td>
                        <td>{{ $sku->price }} {{ $currencySymbol }}</td>
                        <td>{{ $sku->price * $sku->countInOrder }} {{ $currencySymbol }}</td>
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
