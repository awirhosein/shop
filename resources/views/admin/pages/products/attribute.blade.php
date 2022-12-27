<x-admin-layout>

    <div class="edit-page">
        <h6 class="border-bottom mb-4 pb-3">
            <span>{{ hybrid_trans('Edit ProductAttributes') }}</span>
        </h6>

        <form action="{{ route('admin.products.attributes.store', $product) }}" method="POST">
            @csrf

            @if ($attributes)
                @foreach ($attributes as $attribute)
                    <div class="form-group">
                        <label class="text-muted">{{ $attribute->name }}</label>
                        <input type="text" class="form-control" name="values[{{ $attribute->id }}]" value="{{ $attribute->products->where('id', $product->id)->first()?->pivot->value }}">
                    </div>
                @endforeach
            @endif

            <x-admin.submit back />
        </form>
    </div>

</x-admin-layout>
