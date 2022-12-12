<x-admin-layout>

    <div class="edit-page">
        <h6 class="border-bottom mb-4 pb-3">
            <span>{{ __('Edit Product') }}</span>
        </h6>

        <form action="{{ route('admin.products.edit', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="text-muted">{{ __('Name') }}</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
                <x-admin.error name="name" />
            </div>

            <x-admin.submit back />
        </form>
    </div>

</x-admin-layout>
