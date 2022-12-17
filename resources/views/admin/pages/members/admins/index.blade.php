<x-admin-layout>
    <x-admin.index-header title="Admins" />

    <div class="index-page">
        <table class="table-hover table">
            <x-admin.table-row :fields="$fields" />

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

            <x-admin.table-row :fields="$fields" class="border-top" />
        </table>
    </div>

    <div class="mt-3">
        {{ $admins->render() }}
    </div>
</x-admin-layout>
