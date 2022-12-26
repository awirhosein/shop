<x-admin-layout>
    <x-admin.index-header title="Questions" />

    <div class="index-page">
        <table class="table-hover table">
            <x-admin.table-row :fields="$fields" />

            @foreach ($questions as $question)
                <tr>
                    <td class="font-weight-bold w-0">{{ $question->id }}</td>
                    <td>{{ $question->user?->name }}</td>
                    <td>{{ str()->limit($question->product?->name, 25) }}</td>
                    <td>{{ str()->limit($question->text, 50) }}</td>
                    <td>{{ __($question->type) }}</td>
                    <td>
                        @if ($question->is_approved())
                            <span class="badge badge-success">{{ __('Approved') }}</span>
                        @else
                            <span class="badge badge-danger">{{ __('Unapproved') }}</span>
                        @endif
                    </td>
                    <td class="text-left">
                        <x-admin.dropdown
                            :edit="route('admin.questions.edit', $question)"
                            :delete="route('admin.questions.destroy', $question)" 
                        />
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
