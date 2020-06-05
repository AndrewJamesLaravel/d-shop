<p>@lang('mail/order_created.accost') {{ $name }}</p>

<p>@lang('mail/order_created.your_order') {{ $fullSum }} @lang('mail/order_created.your_order_created')</p>

<table>
    <tbody>
        @foreach($order->skus as $sku)
            <tr>
                <td>
                    <a href="{{ route('sku', [$sku->product->category->code, $sku->product->code, $sku]) }}">
                        <img height="56px" src="{{ Storage::url($sku->product->image) }}" alt="img">
                        {{ $sku->product->__('name') }}
                    </a>
                </td>
                <td><span class="badge">{{ $sku->countInOrder }}</span>
                    <div class="btn-group form-inline">
                        {!! $sku->product->__('description') !!}
                    </div>
                </td>
                <td>{{ $sku->price }} {{ $currencySymbol }}</td>
                <td>{{ $sku->getPriceForCount() }} {{ $currencySymbol }}</td>
            </tr>
        @endforeach
    </tbody>
</table>