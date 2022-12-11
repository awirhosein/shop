<x-admin-layout>

    <div class="d-flex">
        <div>
            <span class="font-weight-bold" style="font-size:22px">{{ __('Users') }}</span>
        </div>
        <div class="pr-2">
            <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-outline-info">
                <span style="font-size:12px">{{ __('Add') }}</span>
            </a>
        </div>
    </div>

    <div class="index-page">
        <table class="table-hover table">
            <tr>
                <th>#</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Registration Date') }}</th>
                <th></th>
            </tr>

            @foreach ($users as $user)
                <tr>
                    <td class="font-weight-bold w-0">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td class="text-left">
                        <x-admin.dropdown :edit="route('admin.users.edit', $user->id)" />
                    </td>
                </tr>
            @endforeach

            <tr class="border-top">
                <th>#</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Email') }}</th>
                <th>{{ __('Registration Date') }}</th>
                <th></th>
            </tr>
        </table>
    </div>

    <div class="mt-3">
        {{ $users->render() }}
    </div>
</x-admin-layout>
