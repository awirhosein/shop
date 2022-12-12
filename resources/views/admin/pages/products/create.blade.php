<x-admin-layout>

    <div class="create-page">
        <h6 class="border-bottom mb-4 pb-3">
            <span>{{ __('Add Product') }}</span>
        </h6>

        <form action="{{ route('admin.products.create') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="text-muted">{{ __('Name') }}</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                <x-admin.error name="name" />
            </div>

            <x-admin.submit back />
        </form>
    </div>

</x-admin-layout>
