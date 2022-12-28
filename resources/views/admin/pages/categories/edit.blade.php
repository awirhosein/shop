<x-admin-layout>

    <div class="edit-page">
        <h6 class="border-bottom mb-4 pb-3">
            <span>{{ hybrid_trans('Edit Category') }}</span>
            <small>({{ $category->slug }})</small>
        </h6>

        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="text-muted">{{ __('Name') }}</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
                <x-admin.error name="name" />
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Parent Category') }}</label>
                <select id="select2" class="form-control" name="parent_id">
                    <option value="">انتخاب کنید</option>
                    @foreach ($parents as $item)
                        <option value="{{ $item->id }}" @selected($item->id == old('parent_id', $category->parent_id))>{{ $item->name }}</option>
                    @endforeach
                </select>
                <x-admin.error name="parent_id" />
            </div>

            <x-admin.submit back />
        </form>
    </div>

</x-admin-layout>
