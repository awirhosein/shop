<x-admin-layout>

    <div class="edit-page">
        <h6 class="border-bottom mb-4 pb-3">
            <span>{{ hybrid_trans("Edit Answer") }}</span>
        </h6>

        <form action="{{ route('admin.questions.answers.update', [$question, $answer] ) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="text-muted">{{ __('Question') }}</label>
                <div>{{ $question->text }}</div>
            </div>

            <div class="form-group">
                <label class="text-muted">{{ __('Text') }}</label>
                <textarea name="text" class="form-control" rows="5">{{ old('text', $answer->text) }}</textarea>
                <x-admin.error name="text" />
            </div>

            <x-admin.submit back />
        </form>
    </div>

</x-admin-layout>
