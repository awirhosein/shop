<x-admin-layout>
    <x-admin.index-header title="Colors" :create="route('admin.colors.create')" />

    <div class="index-page">
        <table class="table-hover table">
            <x-admin.table-row :fields="$fields" />

            @foreach ($colors as $color)
                <tr>
                    <td class="font-weight-bold w-0">{{ $color->id }}</td>
                    <td class="w-0">
                        <x-admin.color-icon :code="$color->code" />
                    </td>
                    <td>{{ $color->name }}</td>
                    <td dir="ltr">{{ $color->code }}</td>
                    <td class="text-left">
                        <x-admin.dropdown
                            :edit="route('admin.colors.edit', $color->id)"
                            :delete="route('admin.colors.destroy', $color->id)"
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
