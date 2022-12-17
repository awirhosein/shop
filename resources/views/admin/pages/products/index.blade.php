<x-admin-layout>
    <x-admin.index-header title="Products" :create="route('admin.products.create')" />

    <div class="index-page">
        <table class="table-hover table">
            <x-admin.table-row :fields="$fields" />

            @foreach ($products as $product)
                <tr>
                    <td class="font-weight-bold w-0">{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category?->name }}</td>
                    <td>{{ __($product->status) }}</td>
                    <td class="text-left">
                        <x-admin.dropdown
                            :color="route('admin.products.colors.index', $product)"
                            :attribute="route('admin.products.attributes.edit', $product)"
                            :edit="route('admin.products.edit', $product)"
                            :delete="route('admin.products.destroy', $product)"
                        />
                    </td>
                </tr>
            @endforeach

            <x-admin.table-row :fields="$fields" class="border-top" />
        </table>
    </div>

    <div class="mt-3">
        {{ $products->render() }}
    </div>
</x-admin-layout>
