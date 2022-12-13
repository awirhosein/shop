<x-admin-layout>

    <div class="edit-page">
        <h6 class="border-bottom mb-4 pb-3">
            <span>{{ hybrid_trans('Edit User') }}</span>
        </h6>

        <form action="{{ route('admin.users.edit', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="text-muted">{{ __('Name') }}</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                <x-admin.error name="name" />
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Email') }}</label>
                <input type="email" class="form-control" name="email" value="{{ old('email', $user->email) }}" disabled>
            </div>

            <x-admin.submit back />
        </form>
    </div>

</x-admin-layout>
