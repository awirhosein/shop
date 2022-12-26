<x-admin-layout>
    <x-admin.index-header title="Comments" />

    <div class="index-page">
        <table class="table-hover table">
            <x-admin.table-row :fields="$fields" />

            @foreach ($comments as $comment)
                <tr>
                    <td class="font-weight-bold w-0">{{ $comment->id }}</td>
                    <td>{{ $comment->user?->name }}</td>
                    <td>{{ str()->limit($comment->commentable->name, 25) }}</td>
                    <td>{{ str()->limit($comment->text, 70) }}</td>
                    <td>
                        @if ($comment->is_approved())
                            <span class="badge badge-success">{{ __('Approved') }}</span>
                        @else
                            <span class="badge badge-danger">{{ __('Unapproved') }}</span>
                        @endif
                    </td>
                    <td class="text-left">
                        <x-admin.dropdown
                            :edit="route('admin.comments.edit', $comment)"
                            :delete="route('admin.comments.destroy', $comment)" 
                        />
                    </td>
                </tr>
            @endforeach

            <x-admin.table-row :fields="$fields" class="border-top" />
        </table>
    </div>

    <div class="mt-3">
        {{ $comments->render() }}
    </div>
</x-admin-layout>
