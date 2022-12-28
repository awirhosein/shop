<x-admin-layout>

    <div class="create-page">
        <h6 class="border-bottom mb-4 pb-3">
            <span>{{ hybrid_trans("Add Answer") }}</span>
        </h6>

        <form action="{{ route('admin.questions.answers.store', $question) }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="text-muted">{{ __('Question') }}</label>
                <div>{{ $question->text }}</div>
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Text') }}</label>
                <textarea name="text" class="form-control" rows="5">{{ old('text') }}</textarea>
                <x-admin.error name="text" />
            </div>

            <x-admin.submit back />
        </form>
    </div>

</x-admin-layout>
