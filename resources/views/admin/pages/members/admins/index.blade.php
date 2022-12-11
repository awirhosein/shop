<x-admin-layout>
    <div>
        <span class="font-weight-bold" style="font-size:22px">{{ __('admins') }}</span>
    </div>

    <div class="index-main">
        <table class="table-hover table">
            <tr>
                <th>#</th>
                <th>{{ __('name') }}</th>
                <th>{{ __('email') }}</th>
                <th>{{ __('registration_date') }}</th>
                <th></th>
            </tr>

            @foreach ($admins as $admin)
                <tr>
                    <td class="font-weight-bold w-0">{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>{{ $admin->created_at }}</td>
                    <td class="text-left">
                        {{-- <livewire:components.dropdown :edit="route('dashboard.users.edit', $admin->id)" :delete="$admin->id" :key="$admin->id" /> --}}
                    </td>
                </tr>
            @endforeach

            <tr class="border-top">
                <th>#</th>
                <th>{{ __('name') }}</th>
                <th>{{ __('email') }}</th>
                <th>{{ __('registration_date') }}</th>
                <th></th>
            </tr>
        </table>
    </div>

    <div class="mt-3">
        {{ $admins->render() }}
    </div>
</x-admin-layout>
