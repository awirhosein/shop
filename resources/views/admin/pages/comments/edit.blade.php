<x-admin-layout>

    <div class="edit-page">
        <h6 class="border-bottom mb-4 pb-3">
            <span>{{ hybrid_trans('Edit Comment') }}</span>
        </h6>

        <form action="{{ route('admin.comments.update', $comment) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="text-muted">{{ __('User') }}</label>
                <input type="text" class="form-control" value="{{ $comment->user?->name }}" disabled>
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Product') }}</label>
                <input type="text" class="form-control" value="{{ $comment->commentable?->name }}" disabled>
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Text') }}</label>
                <textarea name="text" class="form-control" rows="5">{{ old('text', $comment->text) }}</textarea>
                <x-admin.error name="text" />
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Status') }}</label>
                @if ($comment->is_approved())
                    <input type="text" class="form-control" value="{{ __('Approved') }}" disabled>
                @else
                    <select name="status" class="form-control">
                        <option value="approved" @selected($comment->approved_at)>{{ __('Approved') }}</option>
                        <option value="unapproved" @selected(!$comment->approved_at)>{{ __('Unapproved') }}</option>
                    </select>
                @endif
            </div>

            <x-admin.submit back />
        </form>
    </div>

</x-admin-layout>
