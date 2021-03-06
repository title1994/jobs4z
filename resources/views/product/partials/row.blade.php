<tr>
    <td class="align-middle">
        @if(app()->getLocale() == "en")
        {{$product->product_name_en}}
        @else
        {{$product->product_name_fr}}
        @endif
    </td>
    <td class="align-middle">
        @if(app()->getLocale() == "en")
        {{ $product->product_detail_en }}
        @else
        {{ $product->product_detail_fr }}
        @endif
    </td>
    <td class="align-middle">{{ $product->amount }}</td>
    <td class="align-middle">{{ $product->created_at->format(config('app.date_format')) }}</td>
    <td class="text-center align-middle">
        <a href="{{ route('products_manage.edit', $product) }}"
           class="btn btn-icon edit"
           title="@lang('Edit Products')"
           data-toggle="tooltip" data-placement="top">
            <i class="fas fa-edit"></i>
        </a>

        <a href="{{ route('products_manage.destroy', $product) }}"
           class="btn btn-icon"
           title="@lang('Delete Product')"
           data-toggle="tooltip"
           data-placement="top"
           data-method="DELETE"
           data-confirm-title="@lang('Please Confirm')"
           data-confirm-text="@lang('Are you sure that you want to delete this product?')"
           data-confirm-delete="@lang('Yes, delete it!')">
            <i class="fas fa-trash"></i>
        </a>
    </td>
</tr>