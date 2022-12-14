<x-admin-layout>

    <div class="d-flex">
        <div>
            <span class="font-weight-bold" style="font-size:22px">{{ __('Categories') }}</span>
        </div>
        <div class="pr-2">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-info">
                <span style="font-size:12px">{{ __('Add') }}</span>
            </a>
        </div>
    </div>

    <div class="index-page">
        <table class="table-hover table">
            <tr>
                <th>#</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Slug') }}</th>
                <th>{{ __('Parent Category') }}</th>
                <th></th>
            </tr>

            @foreach ($categories as $category)
                <tr>
                    <td class="font-weight-bold w-0">{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->parent?->name }}</td>
                    <td class="text-left">
                        <x-admin.dropdown :edit="route('admin.categories.edit', $category->id)" :delete="route('admin.categories.destroy', $category->id)" />
                    </td>
                </tr>
            @endforeach

            <tr class="border-top">
                <th>#</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Slug') }}</th>
                <th>{{ __('Parent Category') }}</th>
                <th></th>
            </tr>
        </table>
    </div>

    <div class="mt-3">
        {{ $categories->render() }}
    </div>
</x-admin-layout>
