<x-admin-layout>
    <x-admin.index-header title="Answers" :create="route('admin.questions.answers.create', $question)" />

    <div class="index-page">
        <table class="table-hover table">
            <x-admin.table-row :fields="$fields" />

            @foreach ($answers as $answer)
                <tr>
                    <td class="font-weight-bold w-0">{{ $answer->id }}</td>
                    <td>{{ $answer->user?->name }}</td>
                    <td>{{ str()->limit($answer->text, 50) }}</td>
                    <td>
                        <x-admin.date :date="$answer->created_at" ago />
                    </td>
                    <td class="w-0">
                        @if ($answer->is_approved())
                            <span class="badge badge-success">{{ __('Approved') }}</span>
                        @else
                            <span class="badge badge-danger">{{ __('Unapproved') }}</span>
                        @endif
                    </td>
                    <td class="text-left w-0">
                        <x-admin.dropdown
                            :edit="route('admin.questions.answers.edit', [$question, $answer])"
                            :delete="route('admin.questions.answers.destroy', [$question, $answer])" 
                        />
                    </td>
                </tr>
            @endforeach

            <x-admin.table-row :fields="$fields" class="border-top" />
        </table>
    </div>

    <div class="mt-3">
        {{ $answers->render() }}
    </div>
</x-admin-layout>
