<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">
        </div>
        <img src="http://internet-shop.tmweb.ru/storage/products/htc_one_s.png" alt="HTC One S">
        <div class="caption">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->price }}</p>
            <p>
            <form action="{{ route('basket-add', $product) }}" method="POST">
                <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                <a href="{{ route('product', [$product->category->code, $product->code]) }}"
                   class="btn btn-default"
                   role="button">Подробнее</a>
                <input type="hidden" name="_token" value="Qu2sUNbR6ogZCqJ7mfQDlOA0uFsYFcP9P9DBvka1">
                @csrf
            </form>
            </p>
        </div>
    </div>
</div>
