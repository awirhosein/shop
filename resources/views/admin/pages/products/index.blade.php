<x-admin-layout>

    <div class="d-flex">
        <div>
            <span class="font-weight-bold" style="font-size:22px">{{ __('Products') }}</span>
        </div>
        <div class="pr-2">
            <a href="{{ route('admin.products.create') }}" class="btn btn-sm btn-outline-info">
                <span style="font-size:12px">{{ __('Add') }}</span>
            </a>
        </div>
    </div>

    <div class="index-page">
        <table class="table-hover table">
            <tr>
                <th>#</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Status') }}</th>
                <th></th>
            </tr>

            @foreach ($products as $product)
                <tr>
                    <td class="font-weight-bold w-0">{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category?->name }}</td>
                    <td>{{ $product->status }}</td>
                    <td class="text-left">
                        <x-admin.dropdown :edit="route('admin.products.edit', $product->id)" :delete="route('admin.products.destroy', $product->id)" />
                    </td>
                </tr>
            @endforeach

            <tr class="border-top">
                <th>#</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Category') }}</th>
                <th>{{ __('Status') }}</th>
                <th></th>
            </tr>
        </table>
    </div>

    <div class="mt-3">
        {{ $products->render() }}
    </div>
</x-admin-layout>
