<x-admin-layout>
    <x-admin.index-header title="Categories" :create="route('admin.categories.create')" />

    <div class="index-page">
        <table class="table-hover table">
            <x-admin.table-row :fields="$fields" />

            @foreach ($categories as $category)
                <tr>
                    <td class="font-weight-bold w-0">{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->parent?->name }}</td>
                    <td class="text-left">
                        <x-admin.dropdown
                            :edit="route('admin.categories.edit', $category)"
                            :delete="route('admin.categories.destroy', $category)" 
                        />
                    </td>
                </tr>
            @endforeach

            <x-admin.table-row :fields="$fields" class="border-top" />
        </table>
    </div>

    <div class="mt-3">
        {{ $categories->render() }}
    </div>
</x-admin-layout>
