<x-admin-layout>
    <x-admin.index-header title="Colors" :create="route('admin.products.colors.create', $product)" />

    <div class="index-page">
        <table class="table-hover table">
            <x-admin.table-row :fields="$fields" />

            @foreach ($colors as $color)
                <tr>
                    <td class="font-weight-bold w-0">{{ $color->pivot->id }}</td>
                    <td>{{ $color->name }}</td>
                    <td>{{ number_format($color->pivot->price) }}</td>
                    <td class="text-left">
                        <x-admin.dropdown-menu
                            :edit="route('admin.products.colors.edit', [$product, $color->pivot])"
                            :delete="route('admin.products.colors.destroy', [$product, $color->pivot])"
                        />
                    </td>
                </tr>
            @endforeach

            <x-admin.table-row :fields="$fields" class="border-top" />
        </table>
    </div>

    <div class="mt-3">
        {{ $colors->render() }}
    </div>
</x-admin-layout>
