<x-admin-layout>

    <div class="edit-page">
        <h6 class="border-bottom mb-4 pb-3">
            <span>{{ hybrid_trans('Edit Attribute') }}</span>
        </h6>

        <form action="{{ route('admin.attributes.update', $attribute->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="text-muted">{{ __('Name') }}</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $attribute->name) }}">
                <x-admin.error name="name" />
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Category') }}</label>
                <select id="select2" class="form-control" name="category_id">
                    <option value="">انتخاب کنید</option>
                    @foreach ($categories as $item)
                        <option value="{{ $item->id }}" {{ $attribute->category_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                    @endforeach
                </select>
                <x-admin.error name="category_id" />
            </div>

            <x-admin.submit back />
        </form>
    </div>
 
</x-admin-layout>
