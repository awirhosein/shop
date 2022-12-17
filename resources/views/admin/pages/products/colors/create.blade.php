<x-admin-layout>

    <div class="create-page">
        <h6 class="border-bottom mb-4 pb-3">
            <span>{{ hybrid_trans('Add Color Product') }}</span>
        </h6>

        <form action="{{ route('admin.products.colors.store', $product) }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="text-muted">{{ __('Color') }}</label>
                <select class="select2 form-control" name="color_id">
                    <option value="">{{ __('Select') }}</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}" {{ $color->id == old('color_id') ? 'selected' : '' }}>{{ $color->name }}</option>
                    @endforeach
                </select>
                <x-admin.error name="color_id" />
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Price') }}</label>
                <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                <x-admin.error name="price" />
            </div>

            <x-admin.submit back />
        </form>
    </div>
    
</x-admin-layout>
