@lang('mail/subscription.accost_1') {{ $sku->name }} @lang('mail/subscription.accost_2')

<a href="{{ route('sku', [$sku->category->code, $sku->code]) }}">@lang('mail/subscription.to_product_page')</a>