@extends('layouts.master')

@section('title', __('main.titles.product_title'))

@section('content')
        <h1>{{ $product->__('name') }}</h1>
        <h2>{{ $product->category->__('name') }}</h2>
        <p>@lang('product.price'): <b>{{ $product->price }} ₽</b></p>
        <img src="{{ Storage::url($product->image) }}">
        <p>{{ $product->__('description') }}</p>
        @if($product->isAvailable())
            <form action="{{ route('basket-add', $product) }}" method="POST">
                <button type="submit" class="btn btn-success" role="button">@lang('product.buttons.add_to_cart')</button>
                @csrf
            </form>
        @else
            <span>@lang('product.absent')</span>
            <br>
            <span>@lang('product.ask_to_inform')</span>
            <div class="warning">
                @if($errors->get('email'))
                    {!! $errors->get('email')[0] !!}
                @endif
            </div>
            <form method="POST" action="{{ route('subscription', $product) }}">
                @csrf
                <input type="text" name="email" placeholder="email">
                <button type="submit">@lang('product.buttons.submit')</button>
            </form>
        @endif
@endsection
