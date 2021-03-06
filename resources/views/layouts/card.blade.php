<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">
            @if($product->isNew())
                <span class="badge badge-success">@lang('card.labels.new')</span>
            @endif
            @if($product->isRecommend())
                <span class="badge badge-warning">@lang('card.labels.recommend')</span>
            @endif
            @if($product->isHit())
                <span class="badge badge-danger">@lang('card.labels.hit')</span>
            @endif
        </div>
        <img src="{{ Storage::url($product->image) }}" alt="{{ $product->__('name') }}">
        <div class="caption">
            <h3>{{ $product->__('name') }}</h3>
            <p>{{ $product->price }} {{ $currencySymbol }}</p>
            <p>
                <form action="{{ route('basket-add', $product) }}" method="POST">
                    @if($product->isAvailable())
                        <button type="submit" class="btn btn-primary" role="button">@lang('card.buttons.add_to_cart')</button>
                    @else
                        @lang('card.buttons.absent')
                    @endif
                    <a href="{{ route('product', [isset($category) ? $category->code : $product->category->code, $product->code]) }}"
                       class="btn btn-default"
                       role="button">@lang('card.buttons.more')</a>
                    @csrf
                </form>
        </div>
    </div>
</div>
