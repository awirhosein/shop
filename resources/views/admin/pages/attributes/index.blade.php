<x-admin-layout>
    <x-admin.index-header title="Attributes" :create="route('admin.attributes.create')" />

    <div class="index-page">
        <table class="table-hover table">
            <x-admin.table-row :fields="$fields" />

            @foreach ($attributes as $attribute)
                <tr>
                    <td class="font-weight-bold w-0">{{ $attribute->id }}</td>
                    <td>{{ $attribute->name }}</td>
                    <td>{{ $attribute->category?->name }}</td>
                    <td class="text-left">
                        <x-admin.dropdown
                            :edit="route('admin.attributes.edit', $attribute->id)"
                            :delete="route('admin.attributes.destroy', $attribute->id)"
                        />
                    </td>
                </tr>
            @endforeach

            <x-admin.table-row :fields="$fields" class="border-top" />
        </table>
    </div>

    <div class="mt-3">
        {{ $attributes->render() }}
    </div>
</x-admin-layout>
