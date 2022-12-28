<x-admin-layout>
    <x-admin.index-header title="Questions" />

    <div class="index-page">
        <table class="table-hover table">
            <x-admin.table-row :fields="$fields" />

            @foreach ($questions as $question)
                <tr>
                    <td class="font-weight-bold w-0">{{ $question->id }}</td>
                    <td>{{ $question->user?->name }}</td>
                    <td>{{ str()->limit($question->product?->name, 15) }}</td>
                    <td>{{ str()->limit($question->text, 40) }}</td>
                    <td>
                        <a href="{{ route('admin.questions.answers.index', $question) }}" class="text-dark">
                            <span>{{ $question->answers->count() }}</span>
                            <i class="fa-duotone fa-reply-all mr-1"></i>
                        </a>
                    </td>
                    <td>
                        <x-admin.date :date="$question->created_at" ago />
                    </td>
                    <td class="w-0">
                        @if ($question->is_approved())
                            <span class="badge badge-success">{{ __('Approved') }}</span>
                        @else
                            <span class="badge badge-danger">{{ __('Unapproved') }}</span>
                        @endif
                    </td>
                    <td class="w-0 text-left">
                        <x-admin.dropdown :edit="route('admin.questions.edit', $question)" :delete="route('admin.questions.destroy', $question)" />
                    </td>
                </tr>
            @endforeach

            <x-admin.table-row :fields="$fields" class="border-top" />
        </table>
    </div>

    <div class="mt-3">
        {{ $questions->render() }}
    </div>
</x-admin-layout>
