<x-admin-layout>

    <div class="create-page">
        <h6 class="border-bottom mb-4 pb-3">
            <span>{{ hybrid_trans('Add Product') }}</span>
        </h6>

        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="text-muted">{{ __('Name') }}</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                <x-admin.error name="name" />
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Category') }}</label>
                <select class="select2 form-control" name="category_id">
                    <option value="">انتخاب کنید</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" @selected($cat->id == old('category_id'))>{{ $cat->name }}</option>
                    @endforeach
                </select>
                <x-admin.error name="category_id" />
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Content') }}</label>
                <textarea id="tinymce-editor" name="content">{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Image') }}</label>
                <x-admin.file-manager.input />
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Status') }}</label>
                <select class="form-control" name="status">
                    @foreach (\App\Models\Product::STATUS_TYPES as $status)
                        <option value="{{ $status }}" @selected($status == old('status'))>{{ __($status) }}</option>
                    @endforeach
                </select>
                <x-admin.error name="status" />
            </div>

            <x-admin.submit back />
        </form>
    </div>

    <x-slot name="script">
        <x-admin.tinymce-config />
        <x-admin.file-manager.script />
    </x-slot>

</x-admin-layout>
