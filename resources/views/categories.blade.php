@extends('layouts.master')

@section('title', __('main.titles.categories_title'))

@section('content')
        @foreach($categories as $category)
            <div class="panel">
                <a href="{{ route('category', $category->code) }}">
                    <img src="{{ Storage::url($category->image) }}" alt="img">
                    <h2>{{ $category->__('name') }}</h2>
                </a>
                <p>
                    {{ $category->__('description') }}
                </p>
            </div>
        @endforeach
@endsection
