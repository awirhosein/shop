<x-admin-layout>

    <div class="edit-page">
        <h6 class="border-bottom mb-4 pb-3">
            <span>{{ hybrid_trans('Edit Color') }}</span>
        </h6>

        <form action="{{ route('admin.colors.update', $color) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="text-muted">{{ __('Name') }}</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $color->name) }}">
                <x-admin.error name="name" />
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Color') }}</label>
                <input type="color" class="d-block" name="code" value="{{ old('code', $color->code) }}">
                <x-admin.error name="code" />
            </div>

            <x-admin.submit back />
        </form>
    </div>
 
</x-admin-layout>
