<x-admin-layout>

    <div class="d-flex">
        <div>
            <span class="font-weight-bold" style="font-size:22px">{{ __('Attributes') }}</span>
        </div>
        <div class="pr-2">
            <a href="{{ route('admin.attributes.create') }}" class="btn btn-sm btn-outline-info">
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
                <th></th>
            </tr>

            @foreach ($attributes as $attribute)
                <tr>
                    <td class="font-weight-bold w-0">{{ $attribute->id }}</td>
                    <td>{{ $attribute->name }}</td>
                    <td>{{ $attribute->category?->name }}</td>
                    <td class="text-left">
                        <x-admin.dropdown :edit="route('admin.attributes.edit', $attribute->id)" :delete="route('admin.attributes.destroy', $attribute->id)" />
                    </td>
                </tr>
            @endforeach

            <tr class="border-top">
                <th>#</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Category') }}</th>
                <th></th>
            </tr>
        </table>
    </div>

    <div class="mt-3">
        {{ $attributes->render() }}
    </div>
</x-admin-layout>
