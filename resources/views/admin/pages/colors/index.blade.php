<x-admin-layout>

    <div class="d-flex">
        <div>
            <span class="font-weight-bold" style="font-size:22px">{{ __('Colors') }}</span>
        </div>
        <div class="pr-2">
            <a href="{{ route('admin.colors.create') }}" class="btn btn-sm btn-outline-info">
                <span style="font-size:12px">{{ __('Add') }}</span>
            </a>
        </div>
    </div>

    <div class="index-page">
        <table class="table-hover table">
            <tr>
                <th>#</th>
                <th></th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Code') }}</th>
                <th></th>
            </tr>

            @foreach ($colors as $color)
                <tr>
                    <td class="font-weight-bold w-0">{{ $color->id }}</td>
                    <td class="w-0">
                        <x-admin.color-icon :code="$color->code" />
                    </td>
                    <td>{{ $color->name }}</td>
                    <td dir="ltr">{{ $color->code }}</td>
                    <td class="text-left">
                        <x-admin.dropdown :edit="route('admin.colors.edit', $color->id)" :delete="route('admin.colors.destroy', $color->id)" />
                    </td>
                </tr>
            @endforeach

            <tr class="border-top">
                <th>#</th>
                <th></th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Code') }}</th>
                <th></th>
            </tr>
        </table>
    </div>

    <div class="mt-3">
        {{ $colors->render() }}
    </div>
</x-admin-layout>
