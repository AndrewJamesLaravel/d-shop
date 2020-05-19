@lang('mail/subscription.accost_1') {{ $product->name }} @lang('mail/subscription.accost_2')

<a href="{{ route('product', [$product->category->code, $product->code]) }}">@lang('mail/subscription.to_product_page')</a>