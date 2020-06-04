@extends('layouts.master')

@section('title', __('main.titles.product_title'))

@section('content')
        <h1>{{ $skus->product->__('name') }}</h1>
        <h2>{{ $skus->product->category->__('name') }}</h2>
        <p>@lang('product.price'): <b>{{ $skus->price }} {{ $currencySymbol }}</b></p>

        @isset($skus->product->properties)
            @foreach($skus->propertyOptions as $propertyOption)
                <h4>{{ $propertyOption->property->__('name') }}: {{ $propertyOption->__('name') }}</h4>
            @endforeach
        @endisset

        <img src="{{ Storage::url($skus->product->image) }}">
        <p>{{ $skus->product->__('description') }}</p>
        @if($skus->isAvailable())
            <form action="{{ route('basket-add', $skus->product) }}" method="POST">
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
            <form method="POST" action="{{ route('subscription', $skus) }}">
                @csrf
                <input type="text" name="email" placeholder="email">
                <button type="submit">@lang('product.buttons.submit')</button>
            </form>
        @endif
@endsection
